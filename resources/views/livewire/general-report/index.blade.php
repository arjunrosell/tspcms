<div>
    <div x-data="initData">
        <div class="mb-11">
            <div class="mb-4 ">
                <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">General Report</h2>
            </div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('general-reports.index') }}"
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
                            <a href="{{ route('general-reports.index') }}"
                                class="text-xs font-normal text-gray-600 ms-1 hover:text-primary-red md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Report
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
            <div class="mb-2">
                <div class=" max-h-[600px] relative overflow-y-auto rounded-md scrollable-table ">
                    <div class="flex flex-row items-end gap-2 mb-2">
                        <div>
                            <label for="dateStart" class="block text-sm font-medium text-gray-700">Start
                                Date</label>
                            <input type="date" id="dateStart" class=" form-input" name="" id=""
                                wire:model="date_start">
                        </div>
                        <div>
                            <label for="dateEnd" class="block text-sm font-medium text-gray-700">End
                                Date</label>
                            <input type="date" class=" form-input" name="" id="dateEnd"
                                wire:model="date_end">
                        </div>
                        <div>
                            <button wire:click='generateReport'
                                class="flex items-center gap-2 px-3 py-2 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4.2a1 1 0 1 0-2 0V11H7.8a1 1 0 1 0 0 2H11v3.2a1 1 0 1 0 2 0V13h3.2a1 1 0 1 0 0-2H13V7.8Z"
                                        clip-rule="evenodd" />
                                </svg>
                                generate
                            </button>

                        </div>


                    </div>
                    <div id="guide-dashboard-filterResult" wire:ignore>
                        <div class="grid grid-cols-2 col-span-12 gap-2 overflow-x-auto rounded-lg border-1"
                            x-data="dragScroll">
                            {{-- <div x-data="tabulator" x-init="init()">
                                <div x-data="tabulator()" class="mb-4 overflow-x-auto scrollbar-hidden">
                                    <div x-ref="tabulator"
                                        class="mt-5 overflow-x-auto border table-report table-report--tabulator">
                                    </div>
                                </div>

                                <button @click="printTable" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">
                                    Print Table
                                </button>
                            </div> --}}

                            <div x-data="tabulator" x-init="init()">
                                <div x-ref="tabulator"></div>


                                <!-- Total Amount Display -->
                                <div class="mt-4">
                                    <strong>Total Amount: </strong><span x-text="totalAmount"></span>
                                </div>

                                <!-- Print Button -->
                                <button @click="printTable" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">
                                    Print Donations
                                </button>
                            </div>


                            <div x-data="expenses()" x-init="init()">
                                <div x-ref="expenses"></div>

                                <!-- Total Amount Display -->
                                <div class="mt-4">
                                    <strong>Total Amount: </strong><span x-text="totalAmount"></span>
                                </div>


                                <!-- Print Button -->
                                <button @click="printTable" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">
                                    Print Expenses 
                                </button>

                            </div>



                            {{-- <div>
                                <div x-data="expenses()" class="mb-4 overflow-x-auto scrollbar-hidden">
                                    <div x-ref="expenses"
                                        class="mt-5 overflow-x-auto border table-report table-report--tabulator">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('script')
            <script>
                document.addEventListener('livewire:init', () => {
                    console.log('livewire load');

                    let component;
                    let table;
                    let expenses;
                    let arrayData;
                    // Alpine.data('tabulator', () => ({
                    //     tableData: @entangle('donationData').live,
                    //     tableColumns: @entangle('columns').live,
                    //     init() {
                    //         table = new Tabulator(this.$refs.tabulator, {
                    //             printAsHtml: true,
                    //             printStyled: true,
                    //             renderHorizontal: "virtual",
                    //             placeholder: "No matching records found",
                    //             dataTree: true,
                    //             dataTreeStartExpanded: true,
                    //             dataTreeSelectable: 1,
                    //             autoResize: false,
                    //             data: this.tableData,
                    //             columns: this.tableColumns,
                    //             selectable: true, // Enable row selection
                    //             selectableCheck: function(row) {
                    //                 // console.log(row.getData().parent);
                    //                 // Check if the row is a parent row (assuming parent rows have a property 'isParent')
                    //                 return !row.getData().parent; // Return false for parent rows
                    //             },
                    //             // cellEditing: function(cell) {
                    //             //     console.log(cell);
                    //             //     // Check if the row has children
                    //             //     if (cell.getRow().getData().children) {
                    //             //         // Disable editing for parent rows
                    //             //         return false;
                    //             //     }
                    //             //     // Enable editing for child rows
                    //             //     return true;
                    //             // },
                    //         });

                    //         this.$watch('tableData', (value) => {
                    //             table.setData(value);
                    //         });

                    //         Livewire.on('dataUpdated', (data) => {
                    //             table.setColumns(data.column);
                    //             table.setData(data.data);
                    //             console.log(data.column);
                    //             table.redraw(true);
                    //         });

                    //         function statusFormatter(cell) {
                    //             if (cell.getValue() == "Arrived at Sorting Hub") {
                    //                 cell.getElement().classList.add("bg-black",
                    //                     "text-white"); // Corrected classList.add usage
                    //             }
                    //         }

                    //         table.on("rowSelectionChanged", function(data, rows, selected, deselected) {
                    //             arrayData = data[0];
                    //         });

                    //         table.on("cellEditing", function(cell) {
                    //             console.log("asasd");
                    //             if (cell.getRow().getData().children) {
                    //                 // Disable editing for parent rows
                    //                 return false;
                    //             }
                    //             // Enable editing for child rows
                    //             return true;
                    //         });
                    //     },



                    // }));

                    Alpine.data('tabulator', () => ({
                        tableData: @entangle('donationData').live,
                        tableColumns: @entangle('columns').live,
                        table: null,
                        totalAmount: 0,

                        init() {
                            this.table = new Tabulator(this.$refs.tabulator, {
                                printAsHtml: true,
                                printStyled: true,
                                renderHorizontal: "virtual",
                                placeholder: "No matching records found",
                                dataTree: true,
                                dataTreeStartExpanded: true,
                                dataTreeSelectable: 1,
                                autoResize: false,
                                data: this.tableData,
                                columns: this.tableColumns,
                                selectable: true,
                                selectableCheck: function(row) {
                                    return !row.getData().parent;
                                },
                            });

                            this.$watch('tableData', (value) => {
                                this.table.setData(value);
                                this.updateTotalAmount(value);
                            });

                            Livewire.on('dataUpdated', (data) => {
                                this.table.setColumns(data.column);
                                this.table.setData(data.data);
                                this.table.redraw(true);
                                this.updateTotalAmount(data.data);
                            });

                            this.table.on("rowSelectionChanged", (data, rows, selected, deselected) => {
                                this.arrayData = data[0];
                            });

                            this.table.on("cellEditing", (cell) => {
                                if (cell.getRow().getData().children) {
                                    return false;
                                }
                                return true;
                            });
                        },

                        updateTotalAmount(data) {
                            const total = data.reduce((sum, item) => {
                                return sum + (item.amount || 0);
                            }, 0);

                            this.totalAmount = total;
                        },

                        printTable() {
                            if (this.table) {
                                this.table.print();
                            } else {
                                console.error("Tabulator table is not initialized.");
                            }
                        },
                    }));

                    // Alpine.data('expenses', () => ({
                    //     tableData: @entangle('expensesData').live,
                    //     tableColumns: @entangle('columnsexp').live,
                    //     init() {
                    //         expenses = new Tabulator(this.$refs.expenses, {
                    //             printAsHtml: true,
                    //             printStyled: true,
                    //             renderHorizontal: "virtual",
                    //             placeholder: "No matching records found",
                    //             dataTree: true,
                    //             dataTreeStartExpanded: true,
                    //             dataTreeSelectable: 1,
                    //             autoResize: false,
                    //             data: this.tableData,
                    //             columns: this.tableColumns,
                    //             selectable: true, // Enable row selection
                    //             selectableCheck: function(row) {
                    //                 // console.log(row.getData().parent);
                    //                 // Check if the row is a parent row (assuming parent rows have a property 'isParent')
                    //                 return !row.getData().parent; // Return false for parent rows
                    //             },
                    //             // cellEditing: function(cell) {
                    //             //     console.log(cell);
                    //             //     // Check if the row has children
                    //             //     if (cell.getRow().getData().children) {
                    //             //         // Disable editing for parent rows
                    //             //         return false;
                    //             //     }
                    //             //     // Enable editing for child rows
                    //             //     return true;
                    //             // },
                    //         });

                    //         this.$watch('tableData', (value) => {
                    //             expenses.setData(value);
                    //         });

                    //         Livewire.on('dataUpdated', (data) => {
                    //             table.setColumns(data.column);
                    //             table.setData(data.data);
                    //             console.log(data.column);
                    //             table.redraw(true);
                    //         });

                    //         function statusFormatter(cell) {
                    //             if (cell.getValue() == "Arrived at Sorting Hub") {
                    //                 cell.getElement().classList.add("bg-black",
                    //                     "text-white"); // Corrected classList.add usage
                    //             }
                    //         }

                    //         table.on("rowSelectionChanged", function(data, rows, selected, deselected) {
                    //             arrayData = data[0];
                    //         });

                    //         table.on("cellEditing", function(cell) {
                    //             console.log("asasd");
                    //             if (cell.getRow().getData().children) {
                    //                 // Disable editing for parent rows
                    //                 return false;
                    //             }
                    //             // Enable editing for child rows
                    //             return true;
                    //         });
                    //     },



                    // }));


                    Alpine.data('expenses', () => ({
                        tableData: @entangle('expensesData').live,
                        tableColumns: @entangle('columnsexp').live,
                        expenses: null,
                        totalAmount: 0, // Initialize total amount

                        init() {
                            this.expenses = new Tabulator(this.$refs.expenses, {
                                printAsHtml: true,
                                printStyled: true,
                                renderHorizontal: "virtual",
                                placeholder: "No matching records found",
                                dataTree: true,
                                dataTreeStartExpanded: true,
                                dataTreeSelectable: 1,
                                autoResize: false,
                                data: this.tableData,
                                columns: this.tableColumns,
                                selectable: true,
                                selectableCheck: function(row) {
                                    return !row.getData().parent;
                                },
                            });

                            this.$watch('tableData', (value) => {
                                this.expenses.setData(value);
                                this.updateTotalAmount(value); // Update total whenever data changes
                            });

                            Livewire.on('dataUpdated', (data) => {
                                this.expenses.setColumns(data.column);
                                this.expenses.setData(data.data);
                                this.expenses.redraw(true);
                                this.updateTotalAmount(data
                                    .data); // Update total when Livewire data updates
                            });

                            this.expenses.on("rowSelectionChanged", (data, rows, selected, deselected) => {
                                this.arrayData = data[0];
                            });

                            this.expenses.on("cellEditing", function(cell) {
                                if (cell.getRow().getData().children) {
                                    return false;
                                }
                                return true;
                            });
                        },

                        updateTotalAmount(data) {

                            const total = data.reduce((sum, item) => {
                                return sum + (Array.isArray(item.amount) ? item.amount.reduce((a, b) =>
                                    a + b, 0) : item.amount || 0);
                            }, 0);

                            this.totalAmount = total;
                        },

                        printTable() {
                            this.expenses.print();
                        },
                    }));

                    Alpine.data('actions', () => ({
                        print() {
                            table.print();
                        },
                        printExpenses() {
                            expenses.print();
                        },
                    }));
                })
            </script>
        @endpush

    </div>

</div>
