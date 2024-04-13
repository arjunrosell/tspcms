<div>
    <div x-data="initData">
        <div class="mb-11">
            <div class=" mb-4">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Wedding Application Form</h2>
            </div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('analytics.events') }}"
                            class="inline-flex items-center text-xs font-normal text-gray-600 hover:text-primary-red dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('analytics.add-funeral-mass') }}"
                                class="text-xs font-normal text-gray-600 ms-1 hover:text-primary-red md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Funeral Mass
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-xs font-normal text-gray-600 ms-1 md:ms-2 dark:text-gray-400">Index</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div>
            <div class=" flex items-start justify-between mb-7 bg-gray-700 py-6 px-4 rounded-md">
                <div>
                    <div class="mb-5">
                        <label class=" mb-1 text-sm block font-bold text-white">Date of Wedding</label>
                        <div>
                            <input type="date" class=" form-input" wire:model='date_wedding'>
                            <input type="time" class=" form-input" wire:model='time_wedding'>
                        </div>
                    </div>
                    <div>
                        <label class=" mb-1 text-sm block font-bold text-white">Type of Wedding</label>
                        <div class=" flex items-center gap-4">
                            <div>
                                <label for="nuptial" class=" text-sm cursor-pointer text-white">Nutial(With mass)</label>
                                <input type="checkbox" id="nuptial" wire:model='type_wedding' class=" text-indigo-500 form-input cursor-pointer">
                            </div>
                            <div>
                                <label for="simple_wedding" class=" text-sm cursor-pointer text-white">Simple Wedding(Without mass)</label>
                                <input type="checkbox" id="simple_wedding" wire:model='type_wedding' class="text-indigo-500 form-input cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class=" mb-1 text-sm block font-bold text-white">Date of Application</label>
                    <div>
                        <input type="date" class=" form-input" wire:model='date_application'>
                    </div>
                </div>
            </div>
            <div class=" grid grid-cols-2 gap-3 mb-5">
                <div>
                    <h4 class=" font-bold text-xl tracking-wide mb-3">Groom</h4>
                    <div class=" bg-gray-700 p-3 rounded-md">
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="groom_name" class=" text-sm text-white">Name</label>
                            <input type="text" class=" form-input" id="groom_name" wire:model='groom_name'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="groom_age" class=" text-sm text-white">Age</label>
                            <input type="number" class=" form-input" id="groom_age" wire:model='groom_age'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="groom_bday" class=" text-sm text-white">Birthday</label>
                            <input type="date" class=" form-input" id="groom_bday" wire:model='groom_bday'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="groom_father" class=" text-sm text-white">Father</label>
                            <input type="text" class=" form-input" id="groom_father" wire:model='groom_father'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="groom_mother" class=" text-sm text-white">Mother</label>
                            <input type="text" class=" form-input" id="groom_mother" wire:model='groom_mother'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="groom_address" class=" text-sm text-white">Address</label>
                            <input type="text" class=" form-input" id="groom_address" wire:model='groom_address'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="groom_contact_no" class=" text-sm text-white">Contact No.</label>
                            <input type="number" class=" form-input" id="groom_contact_no" wire:model='groom_contact_no'>
                        </div>
                        <fieldset class=" border border-gray-400 p-3 rounded-md mb-5">
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="groom_place_baptism" class=" text-sm text-white">Place of Baptism</label>
                                <input type="text" class=" form-input" id="groom_place_baptism" wire:model='groom_place_baptism'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="groom_parish_of" class=" text-sm text-white">Parish Of</label>
                                <input type="text" class=" form-input" id="groom_parish_of" wire:model='groom_parish_of'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="groom_date_bap" class=" text-sm text-white">Date</label>
                                <input type="text" class=" form-input" id="groom_date_bap" wire:model='groom_date_bap'>
                            </div>
                            <div class=" grid grid-cols-3 gap-2">
                                <div class="flex flex-col gap-1">
                                    <label for="groom_book_no_1" class=" text-sm text-white">Book #</label>
                                    <input type="number" class=" form-input" id="groom_book_no_1" wire:model='groom_book_no_1'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="groom_line_no_1" class=" text-sm text-white">Line #</label>
                                    <input type="number" class=" form-input" id="groom_line_no_1" wire:model='groom_line_no_1'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="groom_page_no_1" class=" text-sm text-white">Page #</label>
                                    <input type="number" class=" form-input" id="groom_page_no_1" wire:model='groom_page_no_1'>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class=" border border-gray-400 p-3 rounded-md">
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="groom_place_confirm" class=" text-sm text-white">Place of Confirmation</label>
                                <input type="text" class=" form-input" id="groom_place_confirm" wire:model='groom_place_confirm'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="groom_parish_confirm" class=" text-sm text-white">Parish Of</label>
                                <input type="text" class=" form-input" id="groom_parish_confirm" wire:model='groom_parish_confirm'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="groom_date_confirm" class=" text-sm text-white">Date</label>
                                <input type="text" class=" form-input" id="groom_date_confirm" wire:model='groom_date_confirm'>
                            </div>
                            <div class=" grid grid-cols-3 gap-2">
                                <div class="flex flex-col gap-1">
                                    <label for="groom_book_no_2" class=" text-sm text-white">Book #</label>
                                    <input type="number" class=" form-input" id="groom_book_no_2" wire:model='groom_book_no_2'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="groom_line_no_2" class=" text-sm text-white">Line #</label>
                                    <input type="number" class=" form-input" id="groom_line_no_2" wire:model='groom_line_no_2'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="groom_page_no_2" class=" text-sm text-white">Page #</label>
                                    <input type="number" class=" form-input" id="groom_page_no_2" wire:model='groom_page_no_2'>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div>
                    <h4 class=" font-bold text-xl tracking-wide mb-3">Bride</h4>
                    <div class=" bg-gray-700 p-3 rounded-md">
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="bride_name" class=" text-sm text-white">Name</label>
                            <input type="text" class=" form-input" id="bride_name" wire:model='bride_name'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="bride_age" class=" text-sm text-white">Age</label>
                            <input type="number" class=" form-input" id="bride_age" wire:model='bride_age'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="bride_bday" class=" text-sm text-white">Birthday</label>
                            <input type="date" class=" form-input" id="bride_bday" wire:model='bride_bday'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="bride_father" class=" text-sm text-white">Father</label>
                            <input type="text" class=" form-input" id="bride_father" wire:model='bride_father'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="bride_mother" class=" text-sm text-white">Mother</label>
                            <input type="text" class=" form-input" id="bride_mother" wire:model='bride_mother'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="bride_address" class=" text-sm text-white">Address</label>
                            <input type="text" class=" form-input" id="bride_address" wire:model='bride_address'>
                        </div>
                        <div class=" flex flex-col gap-1 mb-5">
                            <label for="bride_contact_no" class=" text-sm text-white">Contact No.</label>
                            <input type="number" class=" form-input" id="bride_contact_no" wire:model='bride_contact_no'>
                        </div>
                        <fieldset class=" border border-gray-400 p-3 rounded-md mb-5">
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="bride_place_baptism" class=" text-sm text-white">Place of Baptism</label>
                                <input type="text" class=" form-input" id="bride_place_baptism" wire:model='bride_place_baptism'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="bride_parish_of" class=" text-sm text-white">Parish Of</label>
                                <input type="text" class=" form-input" id="bride_parish_of" wire:model='bride_parish_of'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="bride_date_bap" class=" text-sm text-white">Date</label>
                                <input type="text" class=" form-input" id="bride_date_bap" wire:model='bride_date_bap'>
                            </div>
                            <div class=" grid grid-cols-3 gap-2">
                                <div class="flex flex-col gap-1">
                                    <label for="bride_book_no_1" class=" text-sm text-white">Book #</label>
                                    <input type="number" class=" form-input" id="bride_book_no_1" wire:model='bride_book_no_1'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="bride_line_no_1" class=" text-sm text-white">Line #</label>
                                    <input type="number" class=" form-input" id="bride_line_no_1" wire:model='bride_line_no_1'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="bride_page_no_1" class=" text-sm text-white">Page #</label>
                                    <input type="number" class=" form-input" id="bride_page_no_1" wire:model='bride_page_no_1'>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class=" border border-gray-400 p-3 rounded-md">
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="bride_place_confirm" class=" text-sm text-white">Place of Confirmation</label>
                                <input type="text" class=" form-input" id="bride_place_confirm" wire:model='bride_place_confirm'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="bride_parish_confirm" class=" text-sm text-white">Parish Of</label>
                                <input type="text" class=" form-input" id="bride_parish_confirm" wire:model='bride_parish_confirm'>
                            </div>
                            <div class=" flex flex-col gap-1 mb-5">
                                <label for="bride_date_confirm" class=" text-sm text-white">Date</label>
                                <input type="text" class=" form-input" id="bride_date_confirm" wire:model='bride_date_confirm'>
                            </div>
                            <div class=" grid grid-cols-3 gap-2">
                                <div class="flex flex-col gap-1">
                                    <label for="bride_book_no_2" class=" text-sm text-white">Book #</label>
                                    <input type="number" class=" form-input" id="bride_book_no_2" wire:model='bride_book_no_2'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="bride_line_no_2" class=" text-sm text-white">Line #</label>
                                    <input type="number" class=" form-input" id="bride_line_no_2" wire:model='bride_line_no_2'>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="bride_page_no_2" class=" text-sm text-white">Page #</label>
                                    <input type="number" class=" form-input" id="bride_page_no_2" wire:model='bride_page_no_2'>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class=" flex items-center gap-2 justify-end">
                <a href="{{route('analytics.events')}}"
                    class="inline-flex text-sm items-center transition-colors ease-linear duration-150 gap-2 px-3 py-2 text-indigo-600 border border-indigo-600 rounded-md hover:text-white hover:bg-indigo-700">
                    Back
                </a>
                <button wire:click='create'
                    class="inline-flex items-center text-sm gap-1 px-3 py-2 transition-colors ease-linear duration-150 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                    <svg class=" w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>
                    Save
                </button>
            </div>

        </div>
        

        @push('script')
        @endpush
    </div>

</div>
