@extends('admin.layouts.dashboard')

@section('x-data')
    { page: 'main_categories', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }
@endsection

@section('content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="space-y-5 sm:space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex justify-between items-center px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Main Categories
                    </h3>
                    <a href="{{ route('admin.show.create.category') }}"
                        class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                        <i class="fa-solid fa-plus"></i> New Category
                    </a>
                </div>
                <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    <!-- ====== Table Six Start -->
                    @include('admin.components.tables.main_categories', [
                        'mainCategories' => $mainCategories,
                    ])
                    <!-- ====== Table Six End -->
                </div>
            </div>
        </div>
    </div>
@endsection
