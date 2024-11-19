<div class="container mx-auto mt-5">
    <form wire:submit.prevent="create" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="date_of_baptism" class="block text-sm font-medium text-gray-700">Date of Baptism</label>
                <input type="date" id="date_of_baptism" wire:model="date_of_baptism"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('date_of_baptism')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name_of_child" class="block text-sm font-medium text-gray-700">Name of Child</label>
                <input type="text" id="name_of_child" wire:model="name_of_child"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('name_of_child')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
                <input type="text" id="place_of_birth" wire:model="place_of_birth"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('place_of_birth')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input type="date" id="date_of_birth" wire:model="date_of_birth"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('date_of_birth')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="legitimacy" class="block text-sm font-medium text-gray-700">Legitimacy</label>
                <input type="text" id="legitimacy" wire:model="legitimacy"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('legitimacy')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="father_name" class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" id="father_name" wire:model="father_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('father_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="father_place" class="block text-sm font-medium text-gray-700">From</label>
                <input type="text" id="father_place" wire:model="father_place"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('father_place')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="mother_name" class="block text-sm font-medium text-gray-700">Mother's Name</label>
                <input type="text" id="mother_name" wire:model="mother_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('mother_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="mother_place" class="block text-sm font-medium text-gray-700">From</label>
                <input type="text" id="mother_place" wire:model="mother_place"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('mother_place')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div>
            <label for="residence" class="block text-sm font-medium text-gray-700">Residence</label>
            <input type="text" id="residence" wire:model="residence"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
            @error('residence')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <!-- godfathers & godmothers -->
        <div class="mt-10 mb-2">
            <h2 class="text-2xl font-medium tracking-wide text-gray-800 dark:text-gray-100 ">Sponsors
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="godfathers" class="block text-sm font-medium text-gray-700">Godfathers (If you wanted to add
                    more godfathers, separate with commas.)</label>
                <textarea id="godfathers" wire:model="godfathers" placeholder=""
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    rows="5"></textarea>
                @error('godfathers')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="godmothers" class="block text-sm font-medium text-gray-700">Godmothers (If you wanted to add
                    more godmothers , separate with commas)</label>
                <textarea id="godmothers" wire:model="godmothers"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    rows="5"></textarea>
                @error('godmothers')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="minister_of_baptism" class="block text-sm font-medium text-gray-700">Minister of
                    Baptism</label>
                <input type="text" id="minister_of_baptism" wire:model="minister_of_baptism"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('minister_of_baptism')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="parish_priest" class="block text-sm font-medium text-gray-700">Parish Priest</label>
                <input type="text" id="parish_priest" wire:model="parish_priest"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('parish_priest')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name_of_baptized" class="block text-sm font-medium text-gray-700">Name of Baptized</label>
                <input type="text" id="name_of_baptized" wire:model="name_of_baptized"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('name_of_baptized')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="offering" class="block text-sm font-medium text-gray-700">Offering</label>
                <input type="number" id="offering" wire:model="offering"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('offering')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
            <textarea id="remarks" wire:model="remarks"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                rows="4"></textarea>
            @error('remarks')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('analytics-events-baptism.index') }}"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm text-indigo-700 bg-indigo-100 rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                Cancel
            </a>
            <button type="submit"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                Save
            </button>
        </div>
    </form>
</div>
