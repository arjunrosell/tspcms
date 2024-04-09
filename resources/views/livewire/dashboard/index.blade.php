<div x-data="initData">
    <div >
        <div class="mb-11">
            <div class=" mb-4">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Analytics | Events</h2>
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
        <div class=" grid grid-cols-3 gap-2">
          <div class=" col-span-2">
            <h2 class="text-lg font-medium mb-2 tracking-wide text-gray-800 dark:text-gray-100 ">Appointments</h2>
            <div class=" bg-white shadow-md p-3 rounded-md shadow-gray-300">
              <div class=" mb-3 w-48">
                <x-native-select
                    placeholder="Choose Appointment"
                    :options="['Kasal', 'Binyag']"
                    wire:model="appointment"
                />
              </div>
              <canvas x-ref='appointment' id="myChart"></canvas>
            </div>
          </div>
          <div></div>
        </div>

    </div>

    @push('script')
      <script>
        document.addEventListener('livewire:init', () =>{
          Alpine.data('initData', function(){
            return {
              init(){
                let appointment = this.$refs.appointment;
                let  months = ['Jan', 'Feb','Mar','Apr','May','Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                new Chart(appointment, {
                  type: 'bar',
                  data: {
                    labels: months,
                    datasets: [{
                      label: '',
                      data: [12, 19, 3, 5, 2, 3, 23, 45, 43, 3, 2, 10],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                });
              }
            }
          })
        })
      </script>
    @endpush

</div>
