<div x-data='initSidebar'>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-gray-500 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex bg-gray-800 flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0  p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg"
    >

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('index') }}">
                <h1 class=" text-center text-primary-yellow-light font-bold tracking-wide text-2xl">TSPCMS</h1>
            </a>     
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-white font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Main</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    @foreach (config('sidebar') as $key => $sidebar)
                        @if(array_key_exists('routes', $sidebar))
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <button class="block text-white hover:text-white truncate transition duration-150" @click="toggleRecordMenu('{{$sidebar['unique_name']}}')">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            {!! $sidebar['icon'] !!}
                                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{$sidebar['title']}}</span>
                                        </div>
                                        <!-- Icon -->
                                        <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-white"  :class="showMenu('{{$sidebar['unique_name']}}') ? 'rotate-180 transition-transform ease-linear' : 'rotate-0 transition-transform ease-linear'" viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                            </svg>
                                        </div>
                                    </div>
                                </button>
                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="pl-9 mt-1" x-show="showMenu('{{$sidebar['unique_name']}}')" x-transition>
                                        @foreach ($sidebar['routes'] as $sub_menu)
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-white hover:text-slate-200 transition duration-150 truncate" href="{{ route($sub_menu['route']) }}">
                                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{$sub_menu['title']}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if(in_array(Request::segment(1), ['index'])){{ 'bg-slate-900' }}@endif" x-data="{ open: {{ in_array(Request::segment(1), ['index']) ? 1 : 0 }} }">
                                <a href="{{route($sidebar['route'])}}" class="block text-white hover:text-white truncate transition duration-150 ">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            {!! $sidebar['icon'] !!}
                                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{$sidebar['title']}}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = ! sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () =>{
            Alpine.data('initSidebar', function(){
                return {
                    userMenu: false,
                    analyticsdMenu: false,
                    systemRefMenu: false,
                    authenticationMenu: false,
                    toggleRecordMenu(key){
                        switch (key) {
                            case 'userManagement':
                                this.sidebarExpanded ? this.userMenu = ! this.userMenu : this.sidebarExpanded = true
                                break;
                            case 'analyticsManagement':
                                this.sidebarExpanded ? this.analyticsdMenu = ! this.analyticsdMenu : this.sidebarExpanded = true
                                break;
                            case 'systemReferences':
                                this.sidebarExpanded ? this.systemRefMenu = ! this.systemRefMenu : this.sidebarExpanded = true
                                break;
                            default:
                                break;
                        }
                    },
                    showMenu(key){
                        switch (key) {
                            case 'userManagement':
                                return this.userMenu;
                                break;
                            case 'analyticsManagement':
                                return this.analyticsdMenu
                                break;
                            case 'systemReferences':
                                return this.systemRefMenu
                                break;
                            default:
                                break;
                        }
                    },
                    toggleAuthenticationMenu(){
                        this.authenticationMenu = ! this.authenticationMenu
                    }
                }
            })
        })
    </script>

</div>
