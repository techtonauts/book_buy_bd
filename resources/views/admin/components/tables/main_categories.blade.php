<div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
            <!-- table header start -->
            <thead>
                <tr class="border-b border-gray-100 dark:border-gray-800">
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Name
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Slug
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                No. of Subcategories
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                No. of Products
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Actions
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->
            <!-- table body start -->
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @foreach ($mainCategories as $category)
                    <tr>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <h3 class="text-gray-500  dark:text-gray-400">{{ $category->name }}</h3>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    {{ $category->slug }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p
                                    class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500">
                                    {{ $category->children_count }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p
                                    class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500">
                                    {{ $category->products_count }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <x-ui.modal title="Update Category" cancelText="Cancel" confirmText="Update"
                                    triggerClass="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    <x-slot name="trigger">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </x-slot>
                                    @include('admin.categories.edit', [
                                        'category' => $category,
                                        'mainCategories' => $mainCategories,
                                    ])
                                </x-ui.modal>

                                <form action="#" method="POST" class="ml-4">
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
