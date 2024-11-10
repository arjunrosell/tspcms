<div x-data='initSidebar'>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 z-40 transition-opacity duration-200 bg-blue-600 bg-opacity-30 lg:hidden lg:z-auto"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex bg-blue-500 flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0  p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-center pr-3 mb-10 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>

            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('index') }}">
                {{-- <h1 class="text-2xl font-bold tracking-wide text-center text-white text-primary-yellow-light">Sto.
                    Cristo Parish
                    Church</h1> --}}
                <img class="rounded-full"
                    src="https://images.vexels.com/media/users/3/129738/isolated/preview/8810c93e6357c194080ab761e9035245-catholic-church-icon-by-vexels.png"
                    width="300px" alt="logo"
                    style="
                        width: 125px;
                        border-radius: 50%;
                        background: repeating-linear-gradient(45deg, black, transparent 100px);
                        margin: auto;
                        display: block;
                        position:relative;
                        top:17px;
                    ">
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8" x-init='toggleRecordMenu("{{ trim(Request()->route()->getPrefix(), '/') }}")'>
            <!-- Pages group -->
            <div>
                <h3 class="pl-3 text-xs font-semibold text-white uppercase">
                    <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Main</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    @foreach (config('sidebar') as $key => $sidebar)
                        @if (array_key_exists('routes', $sidebar))
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                                <button class="block text-white truncate transition duration-150 hover:text-white"
                                    @click="toggleRecordMenu('{{ $sidebar['unique_name'] }}')">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            {!! $sidebar['icon'] !!}
                                            <span
                                                class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">{{ $sidebar['title'] }}</span>
                                        </div>
                                        <!-- Icon -->
                                        <div
                                            class="flex ml-2 duration-200 shrink-0 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                            <svg class="w-3 h-3 ml-1 text-white fill-current shrink-0"
                                                :class="showMenu('{{ $sidebar['unique_name'] }}') ?
                                                    'rotate-180 transition-transform ease-linear' :
                                                    'rotate-0 transition-transform ease-linear'"
                                                viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                            </svg>
                                        </div>
                                    </div>
                                </button>
                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="mt-1 pl-9" x-show="showMenu('{{ $sidebar['unique_name'] }}')"
                                        x-transition>
                                        @foreach ($sidebar['routes'] as $sub_menu)
                                            <li class="mb-1 last:mb-0">
                                                <a class="block text-white truncate transition duration-150 hover:text-slate-200"
                                                    href="{{ route($sub_menu['route']) }}">
                                                    <span
                                                        class="text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">{{ $sub_menu['title'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['index'])) {{ 'bg-slate-900' }} @endif"
                                x-data="{ open: {{ in_array(Request::segment(1), ['index']) ? 1 : 0 }} }">
                                <a href="{{ route($sidebar['route']) }}"
                                    class="block text-white truncate transition duration-150 hover:text-white ">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            {!! $sidebar['icon'] !!}
                                            <span
                                                class="ml-3 text-sm font-medium duration-200 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">{{ $sidebar['title'] }}</span>
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
        <div class="justify-end hidden pt-3 mt-auto lg:inline-flex 2xl:hidden">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = ! sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400"
                            d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Alpine.data('initSidebar', function() {
                return {
                    userMenu: false,
                    analyticsdMenu: false,
                    systemRefMenu: false,
                    authenticationMenu: false,
                    toggleRecordMenu(key) {
                        if (key == "user-management") {
                            key = "userManagement"
                        }
                        if (key == "analytics") {
                            key = "analyticsManagement"
                        }
                        if (key == "system-references") {
                            key = "systemReferences"
                        }
                        switch (key) {
                            case 'userManagement':
                                this.sidebarExpanded ? this.userMenu = !this.userMenu : this
                                    .sidebarExpanded = true
                                break;
                            case 'analyticsManagement':
                                this.sidebarExpanded ? this.analyticsdMenu = !this.analyticsdMenu : this
                                    .sidebarExpanded = true
                                break;
                            case 'systemReferences':
                                this.sidebarExpanded ? this.systemRefMenu = !this.systemRefMenu : this
                                    .sidebarExpanded = true
                                break;
                            default:
                                break;
                        }
                    },
                    showMenu(key) {
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
                    toggleAuthenticationMenu() {
                        this.authenticationMenu = !this.authenticationMenu
                    }
                }
            })
        })
    </script>

</div>
