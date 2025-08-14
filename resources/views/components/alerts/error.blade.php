@props(['message'])

<div class="relative w-full overflow-hidden mb-2" role="alert">
    <div class="flex w-full items-center gap-2 bg-red-500/10 p-4 border border-red-500 rounded-sm">
        <div class="bg-red-500/15 text-red-500 rounded-full p-1" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-2">
            <p class="text-xs font-medium sm:text-sm text-balance text-gray-700 dark:text-white">
                {!! __($message) !!}
            </p>
        </div>
        <button class="ml-auto text-gray-700 dark:text-white" aria-label="dismiss alert" onclick="this.parentElement.remove()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2.5" class="size-4 shrink-0">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>
