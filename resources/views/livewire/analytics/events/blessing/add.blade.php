<div class="container mx-auto mt-5">
    <form wire:submit.prevent="create" class="space-y-6">
        <div>
            <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="fullname" wire:model="fullname"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('fullname')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" id="location" wire:model="location"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('location')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" id="date" wire:model="date"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('date')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
            <input type="time" id="time" wire:model="time"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('time')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="contact_person_name_and_number" class="block text-sm font-medium text-gray-700">Contact Person
                Name and Number</label>
            <input type="text" id="contact_person_name_and_number" wire:model="contactPersonNameAndNumber"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('contact_person_name_and_number')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="blessed_item_and_count" class="block text-sm font-medium text-gray-700">Blessed Item and
                Count</label>
            <input type="text" id="blessed_item_and_count" wire:model="blessedItemAndCount"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('blessed_item_and_count')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('analytics-events-blessing.index') }}"
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
