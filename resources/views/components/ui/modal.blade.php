<div x-data="{ open: false, hasFooter: {{ $hasFooter ?? 'false' }} }" class="relative">
    <!-- Trigger Button -->
    <button @click="open = true"
        class="{{ $triggerClass ?? 'inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600' }}"
        aria-label="Open modal">
        {{ $trigger ?? ($triggerText ?? 'Open Modal') }}
    </button>

    <!-- Modal Overlay and Content -->
    <div x-show="open" x-cloak @click.away="open = false"
        class="fixed inset-0 z-50 flex items-center justify-center dark:bg-black/40 backdrop-blur-sm"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <!-- Close Button -->
            <button @click="open = false"
                class="absolute top-5 right-5 z-50 text-gray-400 hover:text-red-500 focus:outline-none"
                aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Modal Header -->

            <h2 id="modal-title"
                class="px-5 py-4 sm:px-6 sm:py-5 text-base font-medium text-gray-800 dark:text-white/90">
                {{ $title ?? 'Modal Title' }}
            </h2>


            <!-- Modal Content -->
            <div>
                {{ $slot }}
            </div>

            <!-- Modal Footer -->
            <div x-show='hasFooter' class="mt-6 flex justify-end space-x-3 items-center px-5 py-4 sm:px-6 sm:py-5">
                <button @click="open = false"
                    class="px-4 py-2 text-sm font-medium text-gray-800 transition rounded-lg bg-gray-200 hover:bg-gray-300">
                    Cancel
                </button>
                {{ $confirmButton ?? '' }}
            </div>
        </div>
    </div>
</div>
