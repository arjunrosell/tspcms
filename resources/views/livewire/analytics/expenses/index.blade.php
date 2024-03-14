<div>
    <div x-data="initData">
        <div class="mb-11">
            <div class=" mb-4">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Analytics | Expenses</h2>
            </div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route('analytics.expenses')}}" class="inline-flex items-center text-xs font-normal text-gray-600 hover:text-primary-red dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{route('analytics.expenses')}}" class="text-xs font-normal text-gray-600 ms-1 hover:text-primary-red md:ms-2 dark:text-gray-400 dark:hover:text-white">
                       Expenses
                    </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="text-xs font-normal text-gray-600 ms-1 md:ms-2 dark:text-gray-400">Index</span>
                    </div>
                </li>
                </ol>
            </nav>
        </div>

        <livewire:table.expenses-table />
    
        @push('script')
            <script>
                document.addEventListener('livewire:init', () =>{
                    Alpine.data('initData', function(){
                        return {
                            show: false,
                            showEdit: false,
                            toggleShowModal(){
                                this.$wire.show = ! this.$wire.show;
                            },
                            toggleEditClose(){
                                this.showEdit = false
                                this.$wire.resetComponent()
                            },
                            init(){
                                this.$watch('showEdit', value =>{
                                    if(value){
                                        document.body.style.overflowY = 'hidden';
                                    }else{
                                        document.body.style.overflowY = 'auto';
                                    }
                                })
                                Livewire.on('edit-modal', () =>{
                                    this.showEdit = true
                                })
                            }
        
                        }
                    })
                });
            </script>
        @endpush
    
    </div>

</div>
