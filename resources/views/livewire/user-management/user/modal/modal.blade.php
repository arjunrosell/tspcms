<x-modal.modal x-show="show"  x-on:close-modal.window="show = false">
    <div class="relative p-4 w-full max-w-[1200px] max-h-full">
        <div @click.outside="show = false" x-show="show" x-transition:enter="animate__animated animate__fadeIn" x-transition:leave="animate__animated animate__fadeOut" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-3 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create User
                </h3>
                <button @click="toggleShowModal" type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 space-y-4 md:p-5">
                <div class="grid grid-cols-3 gap-2 ">
                    <div class="p-2 border border-gray-200 rounded-md ">
                        <h4 class="mb-8 text-sm tracking-wide ">Account Information</h4>
                        <div class="flex items-center justify-center mb-5 ">
                            <div class="relative inline-block ">
                                <div class="w-32 h-32 rounded-full bg-primary-black"></div>
                                <label for="profile_pic" class="absolute flex items-center justify-center w-6 h-6 bg-gray-200 border border-gray-400 rounded-full cursor-pointer bottom-3 right-2">
                                    <svg class="w-5 h-5 text-whitee" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M7.5 4.6A2 2 0 0 1 8.9 4h6.2c.5 0 1 .2 1.4.6L17.9 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h1l1.5-1.4ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" clip-rule="evenodd"/>
                                      </svg>                                    
                                </label>
                            </div>
                            <input type="file" wire:model='profile' hidden>
                        </div>
                        <div>
                            <div class="mb-5">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                                <input type="email" wire:model='email' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" placeholder="example@gmalil.com" required />
                            </div> 
                            <div class="mb-5">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" wire:model='password' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" placeholder="•••••••••" required />
                            </div> 
                            <div class="">
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                <input type="password" id='confirm_password' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" placeholder="•••••••••" required />
                            </div> 
                        </div>
                    </div>
                    <div class="col-span-2 p-2 border border-gray-200 rounded-md ">
                        <h4 class="mb-8 text-sm tracking-wide ">Personal Information</h4>
                        <div class="grid grid-cols-3 gap-2 mb-5 ">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                <input type="text" wire:model='fname' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"  required />
                            </div>
                            <div>
                                <label for="middle_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle name</label>
                                <input type="text" wire:model='mname' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"  required />
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                                <input type="text" wire:model='lname' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" required />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-5 ">
                            <div>
                                <label for="nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nickname</label>
                                <input type="text" wire:model='nickname' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"  required />
                            </div>
                            <div>
                                <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                                <input type="date" wire:model='DOB' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"  required />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-5">
                            <div>
                                <label for="contact_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                <input type="number" wire:model="contact_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red"  required />
                            </div>
                            <div>
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <select wire:model='gender' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-red focus:border-primary-red block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red">
                                    <option selected>Choose a gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-5">
                            <div>
                                <label for="contact_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                                <x-select
                                    wire:model.defer="position_id"
                                    placeholder="Select your position"
                                    :options="[]"
                                    option-label="name"
                                    option-value="id"
                                />
                            </div>
                            <div>
                                <label for="contact_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                                <x-select
                                    wire:model.defer="position_id"
                                    placeholder="Select your role"
                                    :options="[]"
                                    option-label="name"
                                    option-value="id"
                                />
                            </div>
                        </div>
                        <div>
                            <label for="perm_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permanent Address</label>
                            <textarea wire:model='permanent_address' rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-red focus:border-primary-red dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-red dark:focus:border-primary-red" placeholder="Enter your permanent..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b md:p-3 dark:border-gray-600">
                <x-forms.button @click="toggleShowModal" class="flex items-center gap-1 text-xs font-normal tracking-wide border rounded-md shadow-lg focus:outline-none group text-black border-primary-red hover:text-white hover:bg-indigo-700 me-2 ">
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