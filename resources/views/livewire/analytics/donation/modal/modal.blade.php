<x-modal.modal name="add">
    <div class="relative w-auto p-4">
        <div @click.outside="closeModal" x-show="show" x-transition:enter="animate__animated animate__fadeIn"
            class="relative w-[500px] bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-3 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Donation
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
                <div>
                    <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Donation
                        Category</label>
                    <select wire:model='donation_references_id'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red">
                        <option value="">Select Category</option>
                        @foreach ($donation_references as $income_reference)
                            <option value="{{ $income_reference->id }}">{{ $income_reference->name }}</option>
                        @endforeach
                    </select>
                    @error('donation_references_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="donor_type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Donation Source</label>
                    <select wire:model="donor_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red">
                        <option value="">Select Donation Source</option>
                        @foreach ($donor_type_options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('donor_type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div x-data="{ donorType: @entangle('donor_type') }">
                    <div x-show="donorType === 'Organization' || donorType === 'Donor Name'">
                        <label for="donor_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" wire:model="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="position"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                    <input type="number" wire:model='amount'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                    @error('amount')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="remarks"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
                    <textarea wire:model='remarks' cols="30" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"></textarea>
                    @error('remarks')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="date" wire:model='date'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                    @error('date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="received_by"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Received By</label>
                    <input type="text" wire:model="received_by"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" />
                    @error('received_by')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div
                class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b md:p-3 dark:border-gray-600">
                <x-forms.button @click="closeModal"
                    class="flex items-center gap-1 text-xs font-normal tracking-wide text-black border rounded-md shadow-lg focus:outline-none group border-primary-red hover:text-white hover:bg-indigo-700 me-2">
                    Close
                </x-forms.button>
                <x-forms.button wire:click='create'
                    class="flex items-center gap-1 text-xs font-normal tracking-wide text-white bg-indigo-700 rounded-md shadow-lg focus:outline-none hover:bg-indigo-800 me-2 ">
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
