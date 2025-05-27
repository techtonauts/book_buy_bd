import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import Swal from "sweetalert2";


Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();

window.showAlert = (options = {}) => {
    if (typeof Swal === 'undefined') {
        console.error('SweetAlert2 is not loaded. Ensure the library is included.');
        return;
    }

    const defaults = {
        position: 'top-end',
        icon: 'success',
        title: 'Action completed!',
        showConfirmButton: false,
        timer: 1500,
        toast: true,
        timerProgressBar: true,
        topLayer: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    };

    const config = { ...defaults, ...options };

    Swal.fire(config);
};

// Image upload

