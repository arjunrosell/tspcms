<div class="flex items-center gap-2 mb-8">
    <div class="text-sm font-medium text-center text-gray-500  dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap">
            <li class="me-2">
                <a href="{{ route('analytics-events-funeral-mass.index') }}"
                    class=" {{ request()->routeIs('analytics-events-funeral-mass.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-200' }}
                   inline-block py-2 px-4 rounded-lg transition duration-300">
                    Funeral Mass
                </a>
            </li>
            <li class="me-2">
                <a href="{{ route('analytics-events-wedding.index') }}"
                    class=" {{ request()->routeIs('analytics-events-wedding.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-200' }}
                   inline-block py-2 px-4 rounded-lg transition duration-300">
                    Wedding
                </a>
            </li>
            <li class="me-2">
                <a href="{{ route('analytics-events-baptism.index') }}"
                    class=" {{ request()->routeIs('analytics-events-baptism.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-200' }}
                   inline-block py-2 px-4 rounded-lg transition duration-300">
                    Baptism
                </a>
            </li>
            </li>
            <li class="me-2">
                <a href="{{ route('analytics-events-blessing.index') }}"
                    class=" {{ request()->routeIs('analytics-events-blessing.index') ? 'bg-blue-600 text-white' : 'hover:bg-gray-200' }}
                   inline-block py-2 px-4 rounded-lg transition duration-300">
                    Blessing
                </a>
            </li>
        </ul>
    </div>
</div>
