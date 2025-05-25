@extends('layouts.app')

@section('showOffer', '{open:false}')

@section('content')
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Product</p>
    </div>
    <!-- ./breadcrumb -->
    <!-- product-detail -->
    <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-10 lg:relative gap-6">
        <!-- Product Images -->
        <div class="sm:col-span-1 lg:col-span-3 lg:max-h-[600px]">
            <x-ui.product-images currentImage="{{ asset('images/book1/Cover.jpg') }}"
                images="[
                '{{ asset('images/book1/Cover.jpg') }}',
                '{{ asset('images/book1/Printing-Sample1.jpg') }}',
                '{{ asset('images/book1/Printing-Sample2.jpg') }}',
                '{{ asset('images/book1/Printing-Sample2.jpg') }}',
                '{{ asset('images/book1/Printing-Sample2.jpg') }}'
            ]" />
        </div>

        <!-- Product Details -->
        <div class="px-1 sm:col-span-1 lg:col-span-4 lg:max-h-[600px]">
            <h2 class="text-2xl font-medium uppercase mb-2">ANDREWS' DISEASES OF THE SKIN CLINICAL DERMATOLOGY [PART 1]</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Availability: </span>
                    <span class="text-green-600">In Stock</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Author: </span>
                    <span class="text-gray-600">WILLIAM D. JAMES, DIRK M. ELSTON, JAMES R. TREAT, MISHA A. ROSENBECH, ISSAC
                        M. NEUHAUS</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Edition: </span>
                    <span class="text-gray-600">14TH</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">SKU: </span>
                    <span class="text-gray-600">BE45VGRT</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">News Print: </span>
                    <span class="text-xl text-primary font-semibold">
                        ৳45.00
                        <span class="text-base text-gray-400 line-through">৳55.00</span>
                    </span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Color Print: </span>
                    <span class="text-xl text-primary font-semibold">
                        ৳85.00
                        <span class="text-base text-gray-400 line-through">৳105.00</span>
                    </span>
                </p>
            </div>
            <div class="flex flex-col spacye-y-2 mt-4 lg:line-clamp-10">
                <p class="text-gray-800 font-semibold">Description:</p>
                <ul class="list-disc list-outside pl-5 space-y-2 text-gray-600 text-sm">
                    <li>
                        <span class="text-gray-700 font-semibold">Authoritative Reference: </span>
                        <span class="text-gray-600">A gold-standard dermatology textbook trusted by clinicians
                            worldwide.</span>
                    </li>
                    <li>
                        <span class="text-gray-800 font-semibold">Comprehensive Coverage: </span>
                        <span class="text-gray-600">Detailed discussion of skin diseases, including etiology, diagnosis, and
                            treatment.</span>
                    </li>
                    <li>
                        <span class="text-gray-800 font-semibold">Clinical Focus: </span>
                        <span class="text-gray-600">Emphasizes real-world dermatologic practice with practical,
                            patient-centered guidance.</span>
                    </li>
                    <li>
                        <span class="text-gray-800 font-semibold">Rich Visual Content: </span>
                        <span class="text-gray-600">Features hundreds of high-quality clinical images and illustrations for
                            accurate diagnosis.</span>
                    </li>
                    <li>
                        <span class="text-gray-800 font-semibold">Evidence-Based: </span>
                        <span class="text-gray-600">Reflects the latest research, guidelines, and therapeutic advances in
                            dermatology.</span>
                    </li>
                    <li>
                        <span class="text-gray-800 font-semibold">Clear Organization: </span>
                        <span class="text-gray-600">Systematically arranged by disease categories for easy reference and
                            study.</span>
                    </li>
                    <li>
                        <span class="text-gray-800 font-semibold">Ideal for All Levels: </span>
                        <span class="text-gray-600">Suitable for dermatology residents, medical students, and practicing
                            physicians.</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Shipping & Returns -->
        <div class="m-4 sm:col-span-2 lg:col-span-3">
            <div class="bg-white shadow rounded">
                <div class="p-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-800 border-b border-gray-400 py-2">Shipping & Returns</h3>
                    <div class="flex flex-col space-y-2 mt-4">
                        <div class="px-2 flex justify-between items-center">
                            <p class="text-gray-800">Inside Dhaka (1-3) days: </p>
                            <p class="text-gray-600 font-bold">৳70</p>
                        </div>
                        <div class="px-2 flex justify-between items-center">
                            <p class="text-gray-800">Outside Dhaka (3-5) days: </p>
                            <p class="text-gray-600 font-bold">৳100</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center mt-4 p-4 space-y-4">

                    <x-ui.counter title="News Print:" inputName="newsPrintQty" itemname="newsTotalPrice" price="45" />

                    <x-ui.counter title="Color Print:" inputName="colorPrintQty" itemname="colorTotalPrice"
                        price="85" />

                </div>

                <div class="mt-6 flex justify-center items-center gap-3 border-b border-gray-200 pb-5 pt-5">
                    <a href="#"
                        class="bg-primary border border-primary text-white px-4 py-2 rounded flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                        <i class="fa-solid fa-bag-shopping"></i> Add to cart
                    </a>
                    <a href="#"
                        class="border border-gray-300 text-gray-600 px-4 py-2 rounded flex items-center gap-2 hover:text-primary transition">
                        <i class="fa-solid fa-heart"></i> Wishlist
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ./product-detail -->

    <!-- Reviews section -->
    <div class="container py-16">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Customer Reviews Display -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Customer Reviews</h2>

                <!-- Individual Review Component -->
                <div class="space-y-4">
                    <!-- Review 1 -->
                    <div class="border-b pb-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 mr-2">
                                <!-- Star Rating -->
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </div>
                            <span class="text-gray-600 text-sm">4/5</span>
                        </div>
                        <h3 class="font-semibold text-gray-800">Amazing Book!</h3>
                        <p class="text-gray-600 text-sm mb-2">By Sarah Johnson</p>
                        <p class="text-gray-700">A captivating read that kept me engaged from start to finish. The
                            character development is exceptional, and the plot twists are truly unexpected.</p>
                    </div>

                    <!-- Review 2 -->
                    <div class="border-b pb-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 mr-2">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </div>
                            <span class="text-gray-600 text-sm">5/5</span>
                        </div>
                        <h3 class="font-semibold text-gray-800">Highly Recommended!</h3>
                        <p class="text-gray-600 text-sm mb-2">By Michael Roberts</p>
                        <p class="text-gray-700">An insightful and thought-provoking book. The author's writing style is
                            both elegant and engaging.</p>
                    </div>

                    <!-- More reviews can be added here -->
                </div>
            </div>

            <!-- Write a Review Section -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Write a Review</h2>
                <form class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Rating</label>
                        <div class="flex items-center">
                            <!-- Interactive Star Rating -->
                            <div class="flex space-x-1">
                                <button type="button" class="text-gray-300 hover:text-yellow-400">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                    </svg>
                                </button>
                                <!-- Repeat similar buttons for other stars -->
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Your Review</label>
                        <textarea class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            rows="4" placeholder="Share your thoughts about the book"></textarea>
                    </div>

                    <button type="submit"
                        class="bg-primary border border-primary text-white px-4 py-2 rounded flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                        <i class="fa-solid fa-plus"></i> Post Review
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- related product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">You may also like</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                            Chair</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product4.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Bed
                            King Size</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product2.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Couple Sofa</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product3.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Mattrass X</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-8">
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                            Chair</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product4.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Bed
                            King Size</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product2.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Couple Sofa</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product3.jpg" alt="product 1" class="w-full">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Mattrass X</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
        </div>
    </div>
    <!-- ./related product -->
@endsection
