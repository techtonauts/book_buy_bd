{{-- resources/views/components/category-nav.blade.php --}}
<div class="relative" x-data="{ showCategories: false }" @click.away="showCategories = false">
    {{-- All Categories Button --}}
    <button @click="showCategories = !showCategories" @mouseenter="showCategories = true"
        class="bg-primary text-white py-3 px-4 flex items-center focus:outline-none">
        <span class="mr-2">
            <i class="fas fa-bars"></i>
        </span>
        <span>All Categories</span>
    </button>

    {{-- Category Menu Dropdown --}}
    <div x-data="{ activeCategory: null }" class="absolute left-0 right-0 bg-white shadow-lg z-50"
        style="width: calc(100vw - 1rem); max-width: 1200px;" x-show="showCategories"
        @mouseenter="showCategories = true" @mouseleave="showCategories = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4">

        {{-- Two-column layout --}}
        <div class="flex">
            {{-- Main Categories column --}}
            <div class="w-1/4 bg-blue-300 py-1 px-1">
                @foreach ($categories as $category)
                    <div @mouseenter="activeCategory = {{ $category['id'] }}"
                        :class="{ 'bg-gray-200 border border-gray-400 rounded-md': activeCategory === {{ $category['id'] }} }">
                        <a href="#"
                            class="block px-4 py-2 text-gray-700 font-semibold hover:bg-gray-200 hover:border hover:border-gray-400 hover:rounded-md transition">
                            {{ $category['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Subcategories column --}}
            <div class="w-3/4 bg-blue-100 py-2">
                @foreach ($categories as $category)
                    <div class="container px-6 py-2" x-show="activeCategory === {{ $category['id'] }}"
                        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100">

                        <h3 class="font-semibold border-b text-gray-800 mb-2 py-2">{{ $category['name'] }}</h3>

                        <div class="grid grid-cols-3 gap-2">
                            @foreach ($category['subcategories'] as $subcategory)
                                <a href="#"
                                    class="block bg-accent py-1 px-2 border border-white rounded-md text-gray-700 hover:bg-transparent hover:border-gray-400 hover:rounded-md transition">
                                    {{ $subcategory['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
