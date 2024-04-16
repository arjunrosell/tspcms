<div x-data="initData">
    <div>
        <div class="mb-11">
            <div class="mb-4 ">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Dashboard</h2>
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
                            <a href="{{ route('analytics.events') }}"
                                class="text-xs font-normal text-gray-600 ms-1 hover:text-primary-red md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Dashboard
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
        <div class="grid grid-cols-12 gap-4 mb-7">
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row p-4 bg-white rounded shadow-sm">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-blue-500 bg-blue-100 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Users</div>
                        <div class="text-lg font-bold">{{ $totalActiveUsers->total() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row p-4 bg-white rounded shadow-sm">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-green-500 bg-green-100 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Total Expenses</div>
                        <div class="text-lg font-bold">{{ $totalExpenses }}</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row p-4 bg-white rounded shadow-sm">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-orange-500 bg-orange-100 rounded-xl">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M5.00488 9.00268C5.55717 9.00268 6.00488 9.45039 6.00488 10.0027C7.63965 10.0027 9.14352 10.5631 10.3349 11.5022L12.5049 11.5027C13.837 11.5027 15.0339 12.0815 15.8579 13.0014L19.0049 13.0027C20.9972 13.0027 22.7173 14.1679 23.521 15.8541C21.1562 18.9747 17.3268 21.0027 13.0049 21.0027C10.2142 21.0027 7.85466 20.3994 5.944 19.3447C5.80557 19.7283 5.43727 20.0027 5.00488 20.0027H2.00488C1.4526 20.0027 1.00488 19.555 1.00488 19.0027V10.0027C1.00488 9.45039 1.4526 9.00268 2.00488 9.00268H5.00488ZM6.00589 12.0027L6.00488 17.0238L6.05024 17.0572C7.84406 18.3176 10.183 19.0027 13.0049 19.0027C16.0089 19.0027 18.8035 17.847 20.84 15.8732L20.9729 15.7397L20.8537 15.6393C20.3897 15.2763 19.8205 15.051 19.2099 15.0096L19.0049 15.0027L16.8932 15.0017C16.9663 15.3236 17.0049 15.6586 17.0049 16.0027V17.0027H8.00488V15.0027L14.7949 15.0017L14.7605 14.9232C14.38 14.1296 13.593 13.568 12.6693 13.508L12.5049 13.5027L9.57547 13.5025C8.66823 12.5772 7.40412 12.003 6.00589 12.0027ZM4.00488 11.0027H3.00488V18.0027H4.00488V11.0027ZM13.6513 3.57806L14.0046 3.93183L14.3584 3.57806C15.3347 2.60175 16.9177 2.60175 17.894 3.57806C18.8703 4.55437 18.8703 6.13728 17.894 7.11359L14.0049 11.0027L10.1158 7.11359C9.13948 6.13728 9.13948 4.55437 10.1158 3.57806C11.0921 2.60175 12.675 2.60175 13.6513 3.57806ZM11.53 4.99227C11.3564 5.16584 11.3372 5.43526 11.4714 5.62938L11.5289 5.69831L14.0039 8.17368L16.4798 5.69938C16.6533 5.52581 16.6726 5.25639 16.5376 5.06152L16.4798 4.99227C16.3062 4.81871 16.0368 4.79942 15.8417 4.93457L15.7724 4.99249L14.0033 6.76111L12.236 4.9912L12.1679 4.93442C11.973 4.79942 11.7036 4.81871 11.53 4.99227Z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Total Donations</div>
                        <div class="text-lg font-bold">{{ $totalDonations }}</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row p-4 bg-white rounded shadow-sm">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-red-500 bg-red-100 rounded-xl">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM11 13V17H6V13H11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Total Events</div>
                        <div class="text-lg font-bold">{{ $totalEvents }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-2 mb-7">
            <div class="col-span-2 ">
                <h2 class="mb-2 text-lg font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Appointments Rate
                </h2>
                <div class="p-4 bg-white border ">
                    <canvas x-ref='appointment' class=""></canvas>
                </div>
            </div>
            <div>
                <h2 class="mb-2 text-lg font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Upcoming
                    Weddings (This month)</h2>
                <div class="bg-white border ">
                    <div>
                        <ul class=" divide-y-[1px] divide-gray-300">
                            @forelse ($upcomingWedddings as $upcomingWeddding)
                                <li
                                    class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                    <div>
                                        <p class="font-semibold ">
                                            {{ $upcomingWeddding->groom_name . ' & ' . $upcomingWeddding->bride_name }}
                                        </p>
                                        <p class="text-xs font-light ">
                                            {{ $upcomingWeddding->date_wedding . ' - ' . $upcomingWeddding->time_wedding }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="px-2 py-1 text-sm text-black bg-green-400 rounded-md ">Weddings</p>
                                    </div>
                                </li>

                            @empty
                            @endforelse
                            {{-- <li class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                <div>
                                    <p class="font-semibold ">John Doe</p>
                                    <p class="text-xs font-light ">April 15, 2024 - 8:15AM</p>
                                </div>
                                <div>
                                    <p class="px-2 py-1 text-sm text-black bg-blue-400 rounded-md ">Wedding</p>
                                </div>
                            </li>
                            <li class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                <div>
                                    <p class="font-semibold ">John Doe</p>
                                    <p class="text-xs font-light ">April 15, 2024 - 8:15AM</p>
                                </div>
                                <div>
                                    <p class="px-2 py-1 text-sm text-white bg-black rounded-md ">Funeral</p>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <h2 class="mt-4 mb-2 text-lg font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Upcoming
                    Funeral Mass (This month)</h2>
                <div class="bg-white border ">
                    <div>
                        <ul class=" divide-y-[1px] divide-gray-300">
                            @forelse ($upcomingFuneralMass as $upcomingFuneralMas)
                                <li
                                    class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                    <div>
                                        <p class="font-semibold ">
                                            {{ $upcomingFuneralMas->pangalan_ng_namatay }}
                                        </p>
                                        <p class="text-xs font-light ">
                                            {{ $upcomingFuneralMas->petsa_ng_libing . ' - ' . $upcomingFuneralMas->oras_ng_misa }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="px-2 py-1 text-sm text-black bg-green-400 rounded-md ">Weddings</p>
                                    </div>
                                </li>

                            @empty
                            @endforelse
                            {{-- <li class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                <div>
                                    <p class="font-semibold ">John Doe</p>
                                    <p class="text-xs font-light ">April 15, 2024 - 8:15AM</p>
                                </div>
                                <div>
                                    <p class="px-2 py-1 text-sm text-black bg-blue-400 rounded-md ">Wedding</p>
                                </div>
                            </li>
                            <li class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                <div>
                                    <p class="font-semibold ">John Doe</p>
                                    <p class="text-xs font-light ">April 15, 2024 - 8:15AM</p>
                                </div>
                                <div>
                                    <p class="px-2 py-1 text-sm text-white bg-black rounded-md ">Funeral</p>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <h2 class="mt-4 mb-2 text-lg font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Upcoming
                    Baptism (This month)</h2>
                <div class="bg-white border ">
                    <div>
                        <ul class=" divide-y-[1px] divide-gray-300">
                            @forelse ($upcomingBapstisms as $upcomingBapstism)
                                <li
                                    class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                    <div>
                                        <p class="font-semibold ">
                                            {{ $upcomingBapstism->groom_name . ' & ' . $upcomingBapstism->bride_name }}
                                        </p>
                                        <p class="text-xs font-light ">
                                            {{ $upcomingBapstism->date_wedding . ' - ' . $upcomingBapstism->time_wedding }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="px-2 py-1 text-sm text-black bg-green-400 rounded-md ">Weddings</p>
                                    </div>
                                </li>

                            @empty
                            @endforelse
                            {{-- <li class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                <div>
                                    <p class="font-semibold ">John Doe</p>
                                    <p class="text-xs font-light ">April 15, 2024 - 8:15AM</p>
                                </div>
                                <div>
                                    <p class="px-2 py-1 text-sm text-black bg-blue-400 rounded-md ">Wedding</p>
                                </div>
                            </li>
                            <li class="flex items-center justify-between px-3 py-2 border-indigo-500 hover:border-l-2">
                                <div>
                                    <p class="font-semibold ">John Doe</p>
                                    <p class="text-xs font-light ">April 15, 2024 - 8:15AM</p>
                                </div>
                                <div>
                                    <p class="px-2 py-1 text-sm text-white bg-black rounded-md ">Funeral</p>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="">
                <h2 class="mb-2 text-lg font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Sales Summary
                    (Overview of the month)</h2>
                <div class=" bg-white pl-7 p-4 border grid grid-cols-[30%_70%]">
                    <div class="flex flex-col gap-10 pt-6">
                        <div>
                            <h4 class="text-4xl font-bold tracking-wide text-green-500 ">&#x20B1;20,000</h4>
                            <p class="text-sm tracking-wide ">Overall Earnings</p>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold tracking-wide ">&#x20B1;1,000</h4>
                            <p class="text-sm tracking-wide">Current Month Earnings</p>
                        </div>
                    </div>
                    <div class="p-2 border ">
                        <canvas x-ref='sales' class=""></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('script')
        <script>
            document.addEventListener('livewire:init', () => {
                Alpine.data('initData', function() {
                    return {
                        months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                            'Dec'
                        ],
                        init() {
                            let appointment = this.$refs.appointment;
                            let sales = this.$refs.sales;

                            // appoinment
                            new Chart(appointment, {
                                type: 'line',
                                data: {
                                    labels: this.months,
                                    datasets: [{
                                            label: 'Kasal',
                                            data: [1, 4, 5, 6, 7],
                                            borderColor: '#50623A',
                                            backgroundColor: '#789461',
                                        },
                                        {
                                            label: 'Binyag',
                                            data: [2, 43, 43, 2, 23],
                                            borderColor: '#FFB534',
                                            backgroundColor: '#DBCC95',
                                        },
                                        {
                                            label: 'Funeral',
                                            data: [2, 10, 2, 5, 23],
                                            borderColor: '#29ADB2',
                                            backgroundColor: '#61A3BA',
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        title: {
                                            display: false,
                                            text: 'Chart.js Line Chart'
                                        }
                                    }
                                },
                            });

                            // sales summary
                            new Chart(sales, {
                                type: 'bar',
                                data: {
                                    labels: this.months,
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [65, 59, 80, 81, 56, 55, 40],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                },
                            });
                        }
                    }
                })
            })
        </script>
    @endpush

</div>
