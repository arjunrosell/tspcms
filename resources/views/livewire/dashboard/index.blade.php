<div x-data="initData">
    <div >
        <div class="mb-11">
            <div class=" mb-4">
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
                                Events
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
              <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                  <div class="text-sm text-gray-500">Users</div>
                  <div class="font-bold text-lg">{{$totalActiveUsers->total()}}</div>
                </div>
              </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
              <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                  <div class="text-sm text-gray-500">Total Expenses</div>
                  <div class="font-bold text-lg">{{$totalExpenses}}</div>
                </div>
              </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
              <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                  <div class="text-sm text-gray-500">Total Donations</div>
                  <div class="font-bold text-lg">{{$totalDonations}}</div>
                </div>
              </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-3">
              <div class="flex flex-row bg-white shadow-sm rounded p-4">
                <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex flex-col flex-grow ml-4">
                  <div class="text-sm text-gray-500">Total Events</div>
                  <div class="font-bold text-lg">{{$totalEvents->total()}}</div>
                </div>
              </div>
            </div>
        </div>
        <div class=" grid grid-cols-3 gap-2 mb-7">
          <div class=" col-span-2">
            <h2 class="text-lg font-medium mb-2 tracking-wide text-gray-800 dark:text-gray-100 ">Appointments Rate</h2>
            <div class=" bg-white p-4 border">
              <canvas x-ref='appointment' class=""></canvas>
            </div>
          </div>
          <div>
            <h2 class="text-lg font-medium mb-2 tracking-wide text-gray-800 dark:text-gray-100 ">Upcoming Appointment (This month)</h2>
            <div class=" bg-white border">
              <div>
                <ul class=" divide-y-[1px] divide-gray-300">
                  <li class=" flex items-center justify-between px-3 py-2 hover:border-l-2 border-indigo-500">
                    <div>
                      <p class=" font-semibold">John Doe</p>
                      <p class=" text-xs font-light">April 15, 2024 - 8:15AM</p>
                    </div>
                    <div>
                      <p class=" bg-green-400 py-1 px-2 rounded-md text-sm text-black">Baptism</p>
                    </div>
                  </li>
                  <li class=" flex items-center justify-between px-3 py-2 hover:border-l-2 border-indigo-500">
                    <div>
                      <p class=" font-semibold">John Doe</p>
                      <p class=" text-xs font-light">April 15, 2024 - 8:15AM</p>
                    </div>
                    <div>
                      <p class=" bg-blue-400 py-1 px-2 rounded-md text-sm text-black">Wedding</p>
                    </div>
                  </li>
                  <li class=" flex items-center justify-between px-3 py-2 hover:border-l-2 border-indigo-500">
                    <div>
                      <p class=" font-semibold">John Doe</p>
                      <p class=" text-xs font-light">April 15, 2024 - 8:15AM</p>
                    </div>
                    <div>
                      <p class=" bg-black py-1 px-2 rounded-md text-sm text-white">Funeral</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="">
            <h2 class="text-lg font-medium mb-2 tracking-wide text-gray-800 dark:text-gray-100 ">Sales Summary (Overview of the month)</h2>
            <div class=" bg-white pl-7 p-4 border grid grid-cols-[30%_70%]">
              <div class="flex flex-col gap-10 pt-6">
                <div>
                  <h4 class=" text-4xl font-bold tracking-wide text-green-500">&#x20B1;20,000</h4>
                  <p class=" text-sm tracking-wide">Overall Earnings</p>
                </div>
                <div>
                  <h4 class=" text-xl font-bold tracking-wide ">&#x20B1;1,000</h4>
                  <p class="text-sm tracking-wide">Current Month Earnings</p>
                </div>
              </div>
              <div class=" border p-2">
                <canvas x-ref='sales' class=""></canvas>
              </div>
            </div>
          </div>
        </div>

    </div>

    @push('script')
      <script>
        document.addEventListener('livewire:init', () =>{
          Alpine.data('initData', function(){
            return {
              months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
              init(){
                let appointment = this.$refs.appointment;
                let sales = this.$refs.sales;
                
                // appoinment
                new Chart(appointment, {
                  type: 'line',
                  data: {
                    labels: this.months,
                    datasets: [
                      {
                        label: 'Kasal',
                        data: [1,4,5,6,7],
                        borderColor: '#50623A',
                        backgroundColor: '#789461',
                      },
                      {
                        label: 'Binyag',
                        data: [2,43,43,2,23],
                        borderColor: '#FFB534',
                        backgroundColor: '#DBCC95',
                      },
                      {
                        label: 'Funeral',
                        data: [2,10,2,5,23],
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
