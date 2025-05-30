@extends('admin.layouts.dashboard')

@section('title', 'Create Books')

@section('x-data')
    { page: 'createBooks', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }
@endsection


@section('content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Add a New Book
                </h3>
            </div>
            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <form action="{{ route('admin.store.books') }}" method="POST" enctype="multipart/form-data"
                    id="book-create-form">
                    @csrf
                    <div x-data="{ 'name': '', 'slug': '' }" class="-mx-2.5 flex flex-wrap gap-y-5">
                        <div class="w-full px-2.5 xl:w-1/2">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Name
                            </label>
                            <input type="text" placeholder="Enter book name" name="name" x-model="name"
                                value="{{ old('name') }}" value="{{ old('name') }}"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            @error('name')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-full px-2.5 xl:w-1/2">

                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Slug
                            </label>
                            <input type="text" placeholder="Enter book slug" name="slug" x-model="slug"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">

                            <button type="button" x-show="name.length > 0"
                                x-transition:enter="transition ease-out duration-300"
                                @click="slug = name.toLowerCase()
                                                    .trim()
                                                    .replace(/[^a-z0-9]+/g, '-')
                                                    .replace(/(^-|-$)+/g, '')"
                                class="flex items-center justify-center w-1/2 gap-2 p-3 mt-4 text-sm font-medium text-gray-800 transition-colors rounded-lg bg-gray-400 hover:bg-gray-200">
                                Generate
                            </button>
                            @error('slug')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full h-max  text-gray-700 dark:text-white px-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Description
                            </label>
                            <div class="min-h[200px]" id="editor-book-description">
                            </div>
                            <textarea name="description" hidden></textarea>
                            @error('description')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div class="w-full px-2.5 xl:w-1/2">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Select Category
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="category_id"
                                    class="dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected ? '' :
                                        'text-gray-500 dark:text-gray-400'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        None
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span
                                    class="absolute z-30 text-gray-500 -translate-y-1/2 right-4 top-1/2 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                            @error('category_id')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full px-2.5 xl:w-1/2">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                SKU
                            </label>
                            <input type="text" placeholder="Enter unique SKU" name="sku" value="{{ old('sku') }}"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            @error('sku')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="w-full px-2.5 xl:w-1/3">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Author
                            </label>
                            <input type="text" placeholder="Enter author name" name="author"
                                value="{{ old('author') }}"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            @error('author')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-full px-2.5 xl:w-1/3">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Edition
                            </label>
                            <input type="text" placeholder="Enter edition" name="edition" value="{{ old('edition') }}"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            @error('edition')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-full px-2.5 xl:w-1/3">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Stock
                            </label>
                            <input type="number" placeholder="Enter stock" name="stock" value="{{ old('stock') }}"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            @error('stock')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Price Section -->
                        <div x-data="{
                            numOfPriceTypes: 0,
                            priceTypes: [],
                            prices: {}
                        }" class="w-full">
                            <div class="w-full px-2.5 xl:w-1/2">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Select Number of Price types
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-50 bg-transparent">
                                    <select id="numOfPriceTypes" x-model="numOfPriceTypes"
                                        class="dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                        :class="isOptionSelected ? '' :
                                            'text-gray-500 dark:text-gray-400'"
                                        @change="isOptionSelected = true" :disabled='isOptionSelected'>
                                        <option value="0" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                            Select...
                                        </option>
                                        <option value="1" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">1
                                        </option>
                                        <option value="2" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">2
                                        </option>
                                        <option value="3" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">3
                                        </option>
                                        <option value="4" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">4
                                        </option>
                                        <option value="5" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">5
                                        </option>

                                    </select>
                                    <span
                                        class="absolute z-30 text-gray-500 -translate-y-1/2 right-4 top-1/2 dark:text-gray-400">
                                        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <template x-for="index in parseInt(numOfPriceTypes)" :key="index">
                                <div class="w-full px-2.5 flex gap-4 mb-2">
                                    <div class="w-1/2">
                                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Price Type
                                        </label>
                                        <input type="text" placeholder="Enter price type" :id="'priceType' + index"
                                            x-model="priceTypes[index - 1]" required
                                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                    </div>
                                    <div x-show="priceTypes[index - 1]" class="w-1/2">
                                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Price
                                        </label>
                                        <input type="number" placeholder="Enter price" :id="'price' + index"
                                            x-model="prices[priceTypes[index - 1]]" required
                                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                    </div>
                                </div>
                            </template>
                            <input type="hidden" name="prices" :value="JSON.stringify(prices)">
                            @error('prices')
                                <p class="text-theme-xs text-error-500 mt-1.5">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div
                            class="w-full mb-4 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                            <div class="px-5 py-2 sm:px-6 sm:py-5">
                                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                                    Book Images
                                </h3>
                            </div>
                            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                                <div class="dropzone hover:border-brand-500! dark:hover:border-brand-500! rounded-xl border border-dashed! border-gray-300! bg-gray-50 p-7 lg:p-10 dark:border-gray-700! dark:bg-gray-900"
                                    id="book-image-upload">

                                    <div class="dz-message m-0! text-center">
                                        <div class="mb-[22px] flex justify-center">
                                            <div
                                                class="flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                                <svg class="fill-current" width="29" height="28"
                                                    viewBox="0 0 29 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z"
                                                        fill="" />
                                                </svg>
                                            </div>
                                        </div>

                                        <h4 class="text-theme-xl mb-3 font-semibold text-gray-800 dark:text-white/90">
                                            Drop File Here
                                        </h4>
                                        <span
                                            class="mx-auto mb-5 block w-full max-w-[290px] text-sm text-gray-700 dark:text-gray-400">
                                            Drag and drop your PNG, JPG, WebP, SVG images here or
                                            browse
                                        </span>

                                        <span class="text-theme-sm text-brand-500 font-medium underline">
                                            Browse File
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full text-center px-2.5">
                        <button type="submit"
                            class="flex items-center justify-center w-full gap-2 p-3 text-sm font-medium text-white transition-colors rounded-lg bg-brand-500 hover:bg-brand-600">
                            Add Book
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                showAlert({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    position: 'top-end',
                    timer: 2500
                });
            });
        </script>
    @elseif (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                showAlert({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    position: 'top-end',
                    timer: 2500
                });
            });
        </script>
    @endif

@endsection
