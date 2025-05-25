@extends('admin.layouts.dashboard')
@section('x-data')
    { page: 'createCategory', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }
@endsection


@section('content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Create a New Category
                </h3>
            </div>
            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <form action="{{ route('admin.store.category') }}" method="POST">
                    @csrf
                    <div x-data="{ 'name': '', 'slug': '' }" class="-mx-2.5 flex flex-wrap gap-y-5">
                        <div class="w-full px-2.5 xl:w-1/2">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Name
                            </label>
                            <input type="text" placeholder="Enter category name" name="name" x-model="name"
                                class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>
                        @error('name')
                            <p class="text-theme-xs text-error-500 mt-1.5">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="w-full px-2.5 xl:w-1/2">

                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Slug
                            </label>
                            <input type="text" placeholder="Enter category name" name="slug" x-model="slug"
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
                        </div>

                        @error('slug')
                            <p class="text-theme-xs text-error-500 mt-1.5">
                                {{ $message }}
                            </p>
                        @enderror

                        <div class="w-full px-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Select Parent Category
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="parent_id"
                                    class="dark:bg-dark-900 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                    :class="isOptionSelected ? '' :
                                        'text-gray-500 dark:text-gray-400'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                        None
                                    </option>
                                    @foreach ($mainCategories as $category)
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
                        </div>
                        @error('name')
                            <p class="text-theme-xs text-error-500 mt-1.5">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="w-full text-center px-2.5">
                            <button type="submit"
                                class="flex items-center justify-center w-full gap-2 p-3 text-sm font-medium text-white transition-colors rounded-lg bg-brand-500 hover:bg-brand-600">
                                Create Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @session('success')
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ $value }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endsession
@endsection
