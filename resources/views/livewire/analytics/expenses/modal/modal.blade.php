<x-modal.modal name="add">
    <div class="relative w-auto p-4">
        <div @click.outside="closeModal" x-show="show" x-transition:enter="animate__animated animate__fadeIn"
            class="relative w-[500px] bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-3 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create Expenses
                </h3>
                <button @click="closeModal" type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 space-y-4 md:p-5">
                <div class="space-y-4">
                    <!-- File Upload Field -->
                    <div>
                        <label for="files"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                            File</label>
                        <input type="file" wire:model="files"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                        @error('files')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Expense Category Field -->
                    <div>
                        <label for="expense_reference_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense
                            Category</label>
                        <select wire:model="expense_reference_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red">

                            <!-- Default option: "Select Category" -->
                            <option value="">Select Category</option>

                            <!-- Categories List -->
                            @foreach ($expense_references as $expense_reference)
                                <option value="{{ $expense_reference->id }}"
                                    {{ old('expense_reference_id', $expense_reference_id) == $expense_reference->id ? 'selected' : '' }}>
                                    {{ $expense_reference->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('expense_reference_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Amount Field -->
                    <div>
                        <label for="amount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                        <input type="number" wire:model='amount'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                        @error('amount')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date Field -->
                    <div>
                        <label for="date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <input type="date" wire:model='date'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                        @error('date')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Remarks Field -->
                    <div>
                        <label for="remarks"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
                        <textarea wire:model='remarks' cols="30" rows="5"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"></textarea>
                    </div>
                </div>

                <!-- Loading Spinner -->
                <div x-show="isLoading" class="flex justify-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>

            <div
                class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b md:p-3 dark:border-gray-600">
                <x-forms.button @click="closeModal"
                    class="flex items-center gap-1 text-xs font-normal tracking-wide text-black border rounded-md shadow-lg focus:outline-none group border-primary-red hover:text-white hover:bg-indigo-700 me-2">
                    Close
                </x-forms.button>
                <x-forms.button wire:click="create"
                    class="flex items-center gap-1 text-xs font-normal tracking-wide text-white bg-indigo-700 rounded-md shadow-lg focus:outline-none hover:bg-indigo-800 me-2">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m5 12 4.7 4.5 9.3-9" />
                    </svg>
                    Save
                </x-forms.button>
            </div>
        </div>
    </div>
</x-modal.modal>

<x-modal.modal name="edit">
    <div class="relative w-auto p-4">
        <div @click.outside="closeModal" x-show="show" x-transition:enter="animate__animated animate__fadeIn"
            class="relative w-[500px] bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-3 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Expenses
                </h3>
                <button @click="closeModal" type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 space-y-4 md:p-5">
                <div class="space-y-4">
                    <div>
                        <label for="files"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload File
                            (Optional)</label>
                        <input type="file" wire:model="files"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                        @error('files')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Expense Category Field -->
                    <div>
                        <label for="expense_reference_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense
                            Category</label>
                        <select wire:model="expense_reference_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red">
                            @foreach ($expense_references as $expense_reference)
                                <option value="{{ $expense_reference->id }}">{{ $expense_reference->name }}</option>
                            @endforeach
                        </select>
                        @error('expense_reference_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Amount Field -->
                    <div>
                        <label for="amount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                        <input type="number" wire:model="amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                        @error('amount')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date Field -->
                    <div>
                        <label for="date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <input type="date" wire:model="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                        @error('date')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Remarks Field -->
                    <div>
                        <label for="remarks"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
                        <textarea wire:model="remarks" cols="30" rows="5"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"></textarea>
                        @error('remarks')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Loading Spinner (Optional) -->
                <div x-show="isLoading" class="flex justify-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>

            <div
                class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b md:p-3 dark:border-gray-600">
                <x-forms.button @click="closeModal"
                    class="flex items-center gap-1 text-xs font-normal tracking-wide text-black border rounded-md shadow-lg focus:outline-none group border-primary-red hover:text-white hover:bg-indigo-700 me-2">
                    Close
                </x-forms.button>
                <x-forms.button wire:click="update"
                    class="flex items-center gap-1 text-xs font-normal tracking-wide text-white bg-indigo-700 rounded-md shadow-lg focus:outline-none hover:bg-indigo-800 me-2">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m5 12 4.7 4.5 9.3-9" />
                    </svg>
                    Save
                </x-forms.button>
            </div>
        </div>
    </div>
</x-modal.modal>
