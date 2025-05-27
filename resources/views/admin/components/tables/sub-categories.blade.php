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
                                Main Category
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
                @foreach ($subCategories as $category)
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
                                    {{ $category->parent->name }}
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
                            <div class="flex items-center space-x-4">
                                <x-ui.modal title="Update Category"
                                    triggerClass="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    <x-slot name="trigger">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </x-slot>
                                    @include('admin.categories.edit', [
                                        'category' => $category,
                                        'mainCategories' => $mainCategories,
                                    ])
                                </x-ui.modal>
                                @if (auth()->user()->user_type === 'superadmin' || auth()->user()->user_type === 'admin')
                                    <x-ui.modal title="Delete Category" hasFooter="true"
                                        triggerClass="font-medium text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
                                        <x-slot name="trigger">
                                            <i class="fa-solid fa-trash"></i>
                                        </x-slot>
                                        <div class="flex flex-col px-6 items-center justify-center space-y-6">
                                            <p class="font-semibold text-gray-500 dark:text-gray-400">
                                                Are you sure you want to delete this category?
                                                All the products under this category will also be deleted
                                            </p>
                                            <p class="text-red-500">This action cannot be undone.</p>
                                        </div>
                                        <x-slot name="confirmButton">
                                            <form action="{{ route('admin.delete.category', ['id' => $category->id]) }}"
                                                method="POST" class="ml-4">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-red-500 px-4 py-2 border rounded-lg font-medium text-white hover:text-red-700 hover:bg-transparent dark:text-red-400 dark:hover:text-red-300">
                                                    Confirm Delete
                                                </button>
                                            </form>
                                        </x-slot>
                                    </x-ui.modal>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
