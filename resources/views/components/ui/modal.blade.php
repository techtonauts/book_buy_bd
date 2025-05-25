<div x-data="{ open: false }" class="relative">
    <!-- Trigger Button -->
    <button @click="open = true"
        class="{{ $triggerClass ?? 'inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600' }}"
        aria-label="Open modal">
        {{ $trigger ?? ($triggerText ?? 'Open Modal') }}
    </button>

    <!-- Modal Overlay and Content -->
    <div x-show="open" x-cloak @click.away="open = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-opacity-50 transition-opacity duration-300"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="relative rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
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
            <div class="mt-6 flex justify-end space-x-3">
                {{ $footer ?? '' }}
            </div>
        </div>
    </div>
</div>
