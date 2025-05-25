<div x-data="{
    currentImage: '{{ $currentImage ?? '' }}',
    images: {{ $images ?? [] }},
    scrollContainer: null,
    scrollStep: 120,
    fullscreen: false,
    init() {
        this.scrollContainer = this.$refs.scrollContainer;
    },
    scrollLeft() {
        this.scrollContainer.scrollBy({ left: -this.scrollStep, behavior: 'smooth' });
    },
    scrollRight() {
        this.scrollContainer.scrollBy({ left: this.scrollStep, behavior: 'smooth' });
    }
}" class="flex flex-col">

    <img :src="currentImage" @click="fullscreen = true" alt="product"
        class="w-full h-[440px] object-scale-down bg-gray-100 p-2 rounded-lg shadow-md transition-all duration-300">

    <div class="relative bg-gray-100 p-4 rounded-lg shadow-md mt-4">
        <!-- Carousel Container -->
        <div x-ref="scrollContainer"
            class="flex items-center gap-4 overflow-x-hidden scrollbar-hide snap-x snap-mandatory">
            <template x-for="image in images">
                <img :src="image" @click="currentImage = image" alt="thumbnail"
                    class="h-[90px] w-[90px]
                    object-scale-down cursor-pointer rounded-md snap-center flex-shrink-0
                    transition-all duration-300 ease-in-out transform hover:scale-105"
                    :class="{
                        'border-4 border-primary': currentImage === image,
                        'border-2 border-gray-200': currentImage !== image
                    }">
            </template>
        </div>

        <!-- Navigation Buttons -->
        <button @click="scrollLeft"
            class="absolute left-2 top-1/2 -translate-y-1/2 bg-primary text-white p-2 rounded-full hover:bg-primary-dark transition opacity-75 hover:opacity-100"
            aria-label="Previous image">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button @click="scrollRight"
            class="absolute right-2 top-1/2 -translate-y-1/2 bg-primary text-white p-2 rounded-full hover:bg-primary-dark transition opacity-75 hover:opacity-100"
            aria-label="Next image">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    <!-- Fullscreen viewer -->
    <div x-show="fullscreen" x-transition class="fixed inset-0 bg-black/80 flex items-center justify-center z-50"
        @click.away="fullscreen = false">
        <img :src="currentImage" class="max-w-full max-h-screen rounded shadow-xl">
        <button @click="fullscreen = false"
            class="absolute top-5 right-5 text-white text-3xl font-bold hover:text-red-400">&times;</button>
    </div>

</div>

<style>
    /* Hide scrollbar for a cleaner look */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
