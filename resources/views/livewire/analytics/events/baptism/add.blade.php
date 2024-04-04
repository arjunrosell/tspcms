<div>
    <div x-data="initData">
        <div class="mb-11">
            <div class=" mb-4">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Create | Baptism</h2>
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
                            <a href="{{ route('analytics.add-baptism') }}"
                                class="text-xs font-normal text-gray-600 ms-1 hover:text-primary-red md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Baptism
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

        <div class=" border bg-white border-gray-400 px-4 pt-8 pb-4 rounded-md">
            <div class=" grid grid-cols-3 gap-4 mb-8">
                <div class="inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Date</label>
                    <input type="date" class=" form-input" wire:model='date'>
                </div>
            </div>
            <div class=" grid grid-cols-3 gap-4 mb-8">
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Pangalan ng Bibinyagan</label>
                    <input type="text" class=" form-input" wire:model='pangalan_ng_bibinyagan'>
                </div>
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Petsa ng Kapanganakan</label>
                    <input type="date" class=" form-input" wire:model='petsa_ng_kapanganakan'>
                </div>
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Lugar ng Kapanganakan</label>
                    <input type="text" class=" form-input" wire:model='lugar_ng_kapanganakan'>
                </div>
            </div>
            <div class=" grid grid-cols-2 gap-4 mb-8">
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Edad ng Batang Bibinyagan</label>
                    <input type="date" class=" form-input" wire:model='edad_ng_bibinyagan'>
                </div>
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Kasarian</label>
                    <select name="" id="" class=" form-input" wire:model='kasarian'>
                        <option value="" selected>--Select--</option>
                        <option value="Lalaki" >Lalaki</option>
                        <option value="Babae" >Babae</option>
                    </select>
                </div>
            </div>
            <fieldset class=" form-input mb-8">
                <legend class=" font-bold tracking-wide">Pangalan ng Magulang</legend>
                <div class=" grid grid-cols-2 mb-8">
                    <div class=" flex flex-col gap-2 pr-2">
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Pangalan ng Ama</label>
                            <input type="text" class=" form-input" wire:model='pangalan_ng_ama'>
                        </div>
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Taga Saan</label>
                            <textarea name="" id="" class=" form-input" cols="7" wire:model='taga_saan_ama'></textarea>
                        </div>
                    </div>
                    <div class=" flex flex-col gap-2 pl-2">
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Pangalan ng Ina</label>
                            <input type="text" class=" form-input" wire:model='pangalan_ng_ina'>
                        </div>
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Taga Saan</label>
                            <textarea name="" id="" class=" form-input" cols="7" wire:model='taga_saan_ina'></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class=" grid grid-cols-2 gap-4 mb-8">
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Saan Ikinasal ang magulang ng bibinyagan</label>
                    <select name="" id="" class=" form-input" wire:model='lugar_kinasal_ang_magulang'>
                        <option value="" selected>--Select--</option>
                        <option value="simbahan" >Simbahan</option>
                        <option value="civil" >Civil</option>
                        <option value="hindi pa" >Hindi pa</option>
                    </select>
                </div>
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Kasalukuyang Tirahan</label>
                    <input type="text" class=" form-input" wire:model='kasalukuyang_tirahan'>
                </div>
            </div>
            <fieldset class=" form-input mb-8">
                <legend class=" font-bold tracking-wide">Ninong/Ninang</legend>
                <div class=" grid grid-cols-2 mb-8">
                    <div class=" flex flex-col gap-2 pr-2">
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Pangunahing Ninong</label>
                            <input type="text" class=" form-input" wire:model='pangunahing_ninong'>
                        </div>
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Taga Saan</label>
                            <textarea name="" id="" class=" form-input" cols="7" wire:model='tagasan_ang_ninong'></textarea>
                        </div>
                    </div>
                    <div class=" flex flex-col gap-2 pl-2">
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Pangunahing Ninang</label>
                            <input type="text" class=" form-input" wire:model='pangunahing_ninang'>
                        </div>
                        <div class=" inline-flex flex-col">
                            <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Taga Saan</label>
                            <textarea name="" id="" class=" form-input" cols="7" wire:model='tagasan_ang_ninang'></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class=" form-input mb-8">
                <legend class=" font-bold tracking-wide">Karagdagang Mag-aanak</legend>
                <div class=" grid grid-cols-2 mb-8">
                    <div class=" flex flex-col gap-2 pr-2">
                        <div class=" inline-flex flex-col">
                            <div class="mb-2 flex items-center justify-between">
                                <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Ninong</label>
                                <button wire:click='addNinong'>
                                    <svg class=" w-5 h-5 text-indigo-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3ZM5 5V19H19V5H5ZM11 11V7H13V11H17V13H13V17H11V13H7V11H11Z"></path></svg>
                                </button>
                            </div>
                            @foreach ($ninongs as $index => $ninong)
                                <div class=" relative mb-2">
                                    <input type="text" class=" form-input w-full" wire:model='ninongs.{{$index}}'>
                                    <button wire:click='removeNinong({{$index}})' class="absolute top-2/4 h-full px-3 rounded-tr-md rounded-br-md transform -translate-y-2/4 right-0 bg-red-300">
                                        <svg class=" w-5 h-5 text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class=" flex flex-col gap-2 pl-2">
                        <div class=" inline-flex flex-col">
                            <div class="mb-2 flex items-center justify-between">
                                <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Ninang</label>
                                <button wire:click='addNinang'>
                                    <svg class=" w-5 h-5 text-indigo-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3ZM5 5V19H19V5H5ZM11 11V7H13V11H17V13H13V17H11V13H7V11H11Z"></path></svg>
                                </button>
                            </div>
                            @foreach ($ninangs as $index => $ninang)
                                <div class=" relative mb-2">
                                    <input type="text" class=" form-input w-full" wire:model='ninangs.{{$index}}'>
                                    <button wire:click='removeNinang({{$index}})' class="absolute top-2/4 h-full px-3 rounded-tr-md rounded-br-md transform -translate-y-2/4 right-0 bg-red-300">
                                        <svg class=" w-5 h-5 text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class=" grid grid-cols-2 gap-4 mb-8">
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Petsa ng Binyag</label>
                    <input type="date" class=" form-input" wire:model='petsa_ng_binyag'>
                </div>
                <div class=" inline-flex flex-col">
                    <label for="" class=" text-gray-600 text-sm tracking-wide font-semibold">Contact Number</label>
                    <input type="number" placeholder="09***34***" class=" form-input" wire:model='contact_no'>
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
