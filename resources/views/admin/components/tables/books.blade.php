<div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
            <!-- table header start -->
            <thead>
                <tr class="border-b border-gray-100 dark:border-gray-800">
                    <th class="px-3 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Book
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
                                Category
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-center text-gray-500 text-theme-xs dark:text-gray-400">
                                Stock
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center justify-center">
                            <p class="font-medium text-center text-gray-500 text-theme-xs dark:text-gray-400">
                                Prices
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
                @foreach ($books as $book)
                    <tr>
                        <td class="px-3 py-4 sm:px-6">
                            <div class="flex items-center">
                                <div class="flex items-center gap-3">
                                    <div class="overflow-hidden">
                                        <img class="w-16 h-12 object-scale-down rounded-md"
                                            src="{{ count($book->images) > 0 ? asset('storage/' . $book->images[0]->url) : asset('images/product_placeholder.png') }}"
                                            alt="brand" />
                                    </div>

                                    <div>
                                        <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                            {{ $book->name }}
                                        </span>
                                        <span class="block text-gray-500 text-theme-xs dark:text-gray-400">
                                            {{ $book->edition ?? '' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    {{ substr($book->slug, 0, 10) . '...' }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p
                                    class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500">
                                    {{ $book->category->name }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p
                                    class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500">
                                    {{ $book->stock }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex flex-col justify-center items-center space-y-2">
                                @foreach ($book->prices as $price)
                                    <p
                                        class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500">
                                        {{ $price->print_type }}
                                        <span>: {{ $price->price }}</span>
                                    </p>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center space-x-4">
                                <button
                                    class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    <a href="{{ route('admin.show.update.books', ['id' => $book->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </button>

                                <x-ui.modal title="Confirm Deleting Book" hasFooter="true"
                                    triggerClass="font-medium text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
                                    <x-slot name="trigger">
                                        <i class="fa-solid fa-trash"></i>
                                    </x-slot>
                                    <div class="flex flex-col px-6 items-center justify-center space-y-6">
                                        <p class="text-red-500 p-4 m-4"><i
                                                class="fa-solid fa-2xl fa-triangle-exclamation"></i>
                                        </p>
                                        <p class="font-semibold text-gray-500 dark:text-gray-300">
                                            Are you sure you want to delete the book
                                            {{ $book->name }}?

                                        </p>
                                        <p class="dark:text-gray-300">All the images for this book will also be deleted
                                        </p>
                                        <p class="text-red-500">This action cannot be undone.</p>
                                    </div>
                                    <x-slot name="confirmButton">
                                        <form action="{{ route('admin.delete.books', ['id' => $book->id]) }}"
                                            method="POST" class="ml-4">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 px-4 py-2 border rounded-lg font-medium text-white hover:text-red-700 hover:bg-transparent dark:hover:text-red-300">
                                                Confirm Delete
                                            </button>
                                        </form>
                                    </x-slot>
                                </x-ui.modal>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
