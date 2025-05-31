import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import Swal from "sweetalert2";
import Dropzone from "dropzone";
import Quill from "quill";

Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();

// Alert function
window.showAlert = (options = {}) => {
    if (typeof Swal === "undefined") {
        console.error(
            "SweetAlert2 is not loaded. Ensure the library is included."
        );
        return;
    }

    const defaults = {
        position: "top-end",
        icon: "success",
        title: "Action completed!",
        showConfirmButton: false,
        timer: 1500,
        toast: true,
        timerProgressBar: true,
        topLayer: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    };

    const config = { ...defaults, ...options };

    Swal.fire(config);
};

// Quill configs for text editors
document.addEventListener("DOMContentLoaded", () => {
    const routeName = document.body.id;

    if (routeName === "admin.show.create.books") {
        const quill = new Quill("#editor-book-description", {
            theme: "snow",
        });

        // Book Form description
        const form = document.querySelector("#book-create-form");
        form.onsubmit = function () {
            const description = document.querySelector(
                "textarea[name=description]"
            );
            description.value = quill.root.innerHTML;
        };
    }
    if (routeName === "admin.show.update.books") {
        const quill = new Quill("#editor-book-description-edit", {
            theme: "snow",
        });

        // Set initial value from the textarea to the editor
        const textarea = document.querySelector("textarea[name=description]");
        quill.root.innerHTML = textarea.value;

        const form = document.querySelector("#book-update-form");
        form.onsubmit = function () {
            textarea.value = quill.root.innerHTML;
        };
    }
});

// Image upload
document.addEventListener("DOMContentLoaded", () => {
    const routeName = document.body.id;

    if (routeName === "admin.show.create.books") {
        const dropzoneElement = document.querySelector("#book-image-upload");
        if (dropzoneElement && typeof Dropzone !== "undefined") {
            Dropzone.autoDiscover = false;
            const myDropzone = new Dropzone("#book-image-upload", {
                autoProcessQueue: true, // Queue files until form submission
                url: "/admin/book-images/upload-temp", // Your upload URL
                paramName: "images", // Sends as images[]
                maxFiles: 5,
                maxFilesize: 10, // MB
                acceptedFiles: "image/jpeg,image/png,image/webp,image/gif",
                addRemoveLinks: true,
                dictRemoveFile: "Remove",
                uploadMultiple: true,
                parallelUploads: 5,
                init: function () {
                    const dropzoneInstance = this;
                    const form = dropzoneElement.closest("form");

                    const uploadedPaths = []; // store uploaded file paths
                    const uploadedFiles = new Set();

                    this.on("sending", function (file, xhr, formData) {
                        const token = document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content");
                        formData.append("_token", token);
                    });

                    this.on("addedfile", function (file) {
                        // check for duplicate images
                        const fileKey = `${file.name}-${file.size}`;
                        if (uploadedFiles.has(fileKey)) {
                            this.removeFile(file);
                            showAlert({
                                icon: "warning",
                                title: "Duplicate image detected",
                                position: "top-end",
                                timer: 2000,
                            });
                        } else {
                            uploadedFiles.add(fileKey);
                        }

                        // Validate max files
                        const totalFiles =
                            dropzoneInstance.getAcceptedFiles().length;
                        if (totalFiles > dropzoneInstance.options.maxFiles) {
                            dropzoneInstance.removeFile(file);
                            showAlert({
                                icon: "error",
                                title: "Maximum 5 images allowed",
                                position: "top-end",
                                timer: 2000,
                            });
                        }
                    });

                    this.on("successmultiple", function (files, response) {
                        if (response.paths && Array.isArray(response.paths)) {
                            response.paths.forEach((path, index) => {
                                uploadedPaths.push(path);
                                const file = files[index];
                                file.uploadPath = path;
                                // Append hidden input to form
                                const input = document.createElement("input");
                                input.type = "hidden";
                                input.name = "bookImages[]";
                                input.value = path;
                                form.appendChild(input);
                            });
                        }
                    });

                    this.on("error", function (file, message) {
                        showAlert({
                            icon: "error",
                            title:
                                typeof message === "string"
                                    ? message
                                    : "File upload failed",
                            position: "top-end",
                            timer: 2000,
                        });
                        dropzoneInstance.removeFile(file);
                    });

                    this.on("removedfile", function (file) {
                        const fileKey = `${file.name}-${file.size}`;
                        // Find the corresponding hidden input and remove it from the form
                        const form = dropzoneElement.closest("form");

                        // You must save the uploaded path to file.uploadPath when uploading
                        const uploadedPath = file.uploadPath;

                        if (uploadedPath) {
                            // Remove matching hidden input from the form
                            const input = form.querySelector(
                                `input[type="hidden"][value="${uploadedPath}"]`
                            );
                            if (input) input.remove();

                            // Send delete request to server
                            fetch("/admin/book-images/delete-temp", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": document
                                        .querySelector(
                                            'meta[name="csrf-token"]'
                                        )
                                        .getAttribute("content"),
                                },
                                body: JSON.stringify({ path: uploadedPath }),
                            })
                                .then((res) => res.json())
                                .then((data) => {
                                    if (!data.success) {
                                        showAlert({
                                            icon: "error",
                                            title: "Failed to delete image",
                                            position: "top-end",
                                            timer: 1500,
                                        });
                                    }
                                    if (data.success) {
                                        uploadedFiles.delete(fileKey);
                                    }
                                })
                                .catch((err) => {
                                    console.error(err);
                                    showAlert({
                                        icon: "error",
                                        title: "Error deleting image",
                                        position: "top-end",
                                        timer: 1500,
                                    });
                                });
                        }
                    });
                },
            });
        } else {
            if (!dropzoneElement) {
                console.error("Dropzone element #book-image-upload not found.");
            } else {
                console.error("Dropzone.js is not loaded.");
            }
        }
    }

    if (routeName === "admin.show.update.books") {
        const dropzoneElement = document.querySelector("#book-image-upload");

        if (dropzoneElement && typeof Dropzone !== "undefined") {
            Dropzone.autoDiscover = false;

            const existingImages = JSON.parse(
                dropzoneElement.dataset.existingImages || "[]"
            );

            const myDropzone = new Dropzone("#book-image-upload", {
                url: "/admin/book-images/upload-temp",
                paramName: "images",
                maxFiles: 5,
                maxFilesize: 10,
                acceptedFiles: "image/jpeg,image/png,image/webp,image/gif",
                addRemoveLinks: true,
                uploadMultiple: true,
                parallelUploads: 5,
                init: function () {
                    const dropzoneInstance = this;
                    const form = dropzoneElement.closest("form");

                    const uploadedFiles = new Set();

                    // Load existing images
                    existingImages.forEach(({ name, url }) => {
                        const mockFile = {
                            name: name,
                            size: 123456, // optional: fake size
                            accepted: true,
                            status: Dropzone.SUCCESS,
                            uploadPath: url, // useful for tracking
                            isExisting: true,
                        };
                        dropzoneInstance.emit("addedfile", mockFile);
                        dropzoneInstance.emit("thumbnail", mockFile, url);
                        dropzoneInstance.emit("complete", mockFile);

                        // Add to form
                        const input = document.createElement("input");
                        input.type = "hidden";
                        input.name = "bookImages[]";
                        input.value = url;
                        form.appendChild(input);
                    });

                    this.on("sending", function (file, xhr, formData) {
                        const token = document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content");
                        formData.append("_token", token);
                    });

                    this.on("addedfile", function (file) {
                        // check for duplicate images
                        const fileKey = `${file.name}-${file.size}`;
                        file._deleted = false;
                        if (uploadedFiles.has(fileKey)) {
                            this.removeFile(file);
                            showAlert({
                                icon: "warning",
                                title: "Duplicate image detected, deleting!",
                                position: "top-end",
                                timer: 2000,
                            });
                        } else {
                            uploadedFiles.add(fileKey);
                        }

                        // Validate max files
                        const totalFiles =
                            dropzoneInstance.getAcceptedFiles().length;
                        if (totalFiles > dropzoneInstance.options.maxFiles) {
                            dropzoneInstance.removeFile(file);
                            showAlert({
                                icon: "error",
                                title: "Maximum 5 images allowed",
                                position: "top-end",
                                timer: 2000,
                            });
                        }
                    });

                    this.on("successmultiple", function (files, response) {
                        if (response.paths) {
                            response.paths.forEach((path, index) => {
                                const file = files[index];
                                file.uploadPath = path;
                                const input = document.createElement("input");
                                input.type = "hidden";
                                input.name = "bookImages[]";
                                input.value = path;
                                form.appendChild(input);
                            });
                        }
                    });

                    this.on("removedfile", function (file) {
                        // Prevent multiple calls for same file
                        if (file._deleted || !file.uploadPath) return; // avoid double deletion

                        const fileKey = `${file.name}-${file.size}`;

                        const input = form.querySelector(
                            `input[type="hidden"][value="${file.uploadPath}"]`
                        );

                        const isExisting = file.isExisting;

                        const url = isExisting
                            ? "/admin/book-images/delete-existing"
                            : "/admin/book-images/delete-temp";

                        fetch(url, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                            },
                            body: JSON.stringify({ path: file.uploadPath }),
                        })
                            .then((res) => res.json())
                            .then((data) => {
                                if (!data.success) {
                                    showAlert({
                                        icon: "error",
                                        title: "Failed to delete image",
                                        position: "top-end",
                                        timer: 1500,
                                    });
                                }
                                if (data.success) {
                                    uploadedFiles.delete(fileKey);
                                    file._deleted = true;
                                    if (input) input.remove();
                                }
                            })
                            .catch((err) => {
                                showAlert({
                                    icon: "error",
                                    title: "Error deleting image",
                                    position: "top-end",
                                    timer: 1500,
                                });
                            });
                    });
                },
            });
        }
    }
});
