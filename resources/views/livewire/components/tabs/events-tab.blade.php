<div>
    <div class=" flex items-center gap-2  mb-8">
        <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px">
                {{-- <li class="me-2">
                    <a href="{{route('analytics.events')}}" class="{{request()->routeIs('analytics.events') ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300'}} inline-block p-4 border-b-2 border-transparent rounded-t-lg ">Events</a>
                </li> --}}
                <li class="me-2">
                    <a href="{{route('analytics-events-funeral-mass.index')}}" class=" {{request()->routeIs('analytics-events-funeral-mass.index') ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300'}} inline-block p-4 border-b-2 rounded-t-lg ">Funeral Mass</a>
                </li>
                {{-- <li class="me-2">
                    <a href="{{route('analytics.add-baptism')}}" class=" {{request()->routeIs('analytics.add-baptism') ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300'}} inline-block p-4 border-b-2 border-transparent rounded-t-lg ">Baptism</a>
                </li> --}}
                <li class="me-2">
                    <a href="{{route('analytics-events-wedding.index')}}" class=" {{request()->routeIs('analytics-events-wedding.index') ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300'}} inline-block p-4 border-b-2 rounded-t-lg  ">Wedding</a>
                </li>
            </ul>
        </div>

    
    </div>
</div>
