<div>
    <!-- Success message -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div x-data="initData">
        <div class="mb-11">
            <div class="mb-4 ">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Create | Funeral Mass
                </h2>
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
                            <a href="{{ route('analytics-events-funeral-mass.add-funeral-mass') }}"
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

        <div class="w-full mx-auto border bg-gray-200 border-gray-400 px-4 pt-8 pb-4 rounded-md">
            <div class="grid grid-cols-3 gap-4 mb-5 ">
                <div class="inline-flex flex-col">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Date</label>
                    <input type="date" class=" form-input" wire:model='date'>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-5 ">
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Buong Pangalan ng
                        Namatay</label>
                    <input type="text" class=" form-input" wire:model='pangalan_ng_namatay'>
                </div>
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Petsa ng
                        Kamatayan</label>
                    <input type="date" class=" form-input" wire:model='petsa_ng_kamatayan'>
                </div>
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Petsa ng
                        Libing</label>
                    <input type="date" class=" form-input" wire:model='petsa_ng_libing'>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-5 ">
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Oras ng alis sa
                        Bahay</label>
                    <input type="time" class=" form-input" wire:model='oras_ng_alis'>
                </div>
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Edad</label>
                    <input type="number" class=" form-input" wire:model='edad'>
                </div>
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Pangalan ng
                        Asawa</label>
                    <input type="text" class=" form-input" wire:model='pangalan_ng_asawa'>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-5 ">
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Taga Saan</label>
                    <input type="text" class=" form-input" wire:model='taga_saan'>
                </div>
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Sanhi ng
                        Kamatayan</label>
                    <input type="text" class=" form-input" wire:model='sanhi_ng_kamatayan'>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-5 ">
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Oras ng
                        Misa</label>
                    <input type="time" class=" form-input" wire:model='oras_ng_misa'>
                </div>
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Saan
                        Ililibing</label>
                    <input type="text" class=" form-input" wire:model='saan_ililibing'>
                </div>
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">pangalan ng
                        nagpalista</label>
                    <input type="text" class=" form-input" wire:model='pangalan_ng_nagpalista'>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 mb-5 ">
                <div class="inline-flex flex-col ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Contact
                        Number</label>
                    <input type="number" placeholder="09***34***" class=" form-input" wire:model='contact_no'>
                </div>
                <div class="inline-flex flex-col col-span-3 ">
                    <label for="" class="text-sm font-semibold tracking-wide text-gray-600 ">Taga
                        pagdiwang</label>
                    <input type="text" class=" form-input" wire:model='taga_pagdiwang'>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 ">
                <a href="{{ route('analytics.events') }}"
                    class="inline-flex items-center gap-2 px-3 py-2 text-sm text-indigo-600 transition-colors duration-150 ease-linear border border-indigo-600 rounded-md hover:text-white hover:bg-indigo-700">
                    Back
                </a>
                <button wire:click='create'
                    class="inline-flex items-center gap-1 px-3 py-2 text-sm text-white transition-colors duration-150 ease-linear bg-indigo-600 rounded-md hover:bg-indigo-700">
                    <svg class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z">
                        </path>
                    </svg>
                    Save
                </button>
            </div>
        </div>

        @push('script')
        @endpush
    </div>

</div>
