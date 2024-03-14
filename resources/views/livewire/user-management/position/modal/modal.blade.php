<x-modal.modal x-show="show" x-on:close-modal.window="show = false">
    <div class="relative w-full max-w-xl max-h-full p-4">
        <div @click.outside="toggleShowModal" x-show="show" x-transition:enter="animate__animated animate__fadeIn" x-transition:leave="animate__animated animate__fadeOut" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-3 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create Position
                </h3>
                <button @click="toggleShowModal" type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 space-y-4 md:p-5">
                <div>
                    <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                    <input type="text" wire:model='name' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"  required />
                </div>
            </div>
            <div class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b md:p-3 dark:border-gray-600">
                <x-forms.button @click="toggleShowModal" class="flex items-center gap-1 text-xs font-normal tracking-wide border rounded-md shadow-lg focus:outline-none group text-black border-primary-red hover:text-white hover:bg-indigo-700 me-2">
                    Close
                </x-forms.button>
                <x-forms.button wire:click='create' class="flex items-center gap-1 text-xs font-normal tracking-wide text-white rounded-md shadow-lg focus:outline-none bg-indigo-700 hover:bg-indigo-800 me-2 ">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4.7 4.5 9.3-9"/>
                      </svg>
                    Save
                </x-forms.button>
            </div>
        </div>
    </div>
</x-modal.modal>