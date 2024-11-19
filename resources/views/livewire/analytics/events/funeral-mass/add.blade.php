<div class="container mx-auto mt-5">
    <form wire:submit.prevent="create" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" id="date" wire:model="date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="deceased_name" class="block text-sm font-medium text-gray-700">Deceased Name</label>
                <input type="text" id="deceased_name" wire:model="deceased_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('deceased_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" id="birth_date" wire:model="birth_date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('birth_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="death_date" class="block text-sm font-medium text-gray-700">Death Date</label>
                <input type="date" id="death_date" wire:model="death_date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('death_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" id="age" wire:model="age" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('age')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="burial_date" class="block text-sm font-medium text-gray-700">Burial Date</label>
                <input type="date" id="burial_date" wire:model="burial_date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('burial_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="mass_time" class="block text-sm font-medium text-gray-700">Mass Time</label>
                <input type="time" id="mass_time" wire:model="mass_time"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('mass_time')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="cause_of_death" class="block text-sm font-medium text-gray-700">Cause of Death</label>
                <input type="text" id="cause_of_death" wire:model="cause_of_death"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('cause_of_death')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="departure_time" class="block text-sm font-medium text-gray-700">Departure Time</label>
                <input type="time" id="departure_time" wire:model="departure_time"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('departure_time')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="burial_place" class="block text-sm font-medium text-gray-700">Burial Place</label>
                <input type="text" id="burial_place" wire:model="burial_place"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('burial_place')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="registrant_name" class="block text-sm font-medium text-gray-700">Registrant Name</label>
                <input type="text" id="registrant_name" wire:model="registrant_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('registrant_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="spouse_name" class="block text-sm font-medium text-gray-700">Spouse Name</label>
                <input type="text" id="spouse_name" wire:model="spouse_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('spouse_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="place_of_origin" class="block text-sm font-medium text-gray-700">Place of Origin</label>
                <input type="text" id="place_of_origin" wire:model="place_of_origin"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('place_of_origin')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" id="contact_number" wire:model="contact_number"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('contact_number')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="celebration_place" class="block text-sm font-medium text-gray-700">Celebration
                    Place</label>
                <input type="text" id="celebration_place" wire:model="celebration_place"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('celebration_place')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-2">
            <a href="{{ route('analytics-events-funeral-mass.index') }}"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm text-indigo-600 transition-colors duration-150 ease-linear border border-indigo-600 rounded-md hover:text-white hover:bg-indigo-700">
                Back
            </a>
            <button type="submit"
                class="inline-flex items-center gap-1 px-3 py-2 text-sm text-white transition-colors duration-150 ease-linear bg-indigo-600 rounded-md hover:bg-indigo-700">
                <svg class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                        d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z">
                    </path>
                </svg>
                Save
            </button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#birth_date').on('input', function() {
            var birthDate = $(this).val();
            var birthDateRegex = /^\d{4}-\d{2}-\d{2}$/;
            if (birthDateRegex.test(birthDate)) {
                var birthDateObj = new Date(birthDate);
                var currentDate = new Date();

                var age = currentDate.getFullYear() - birthDateObj.getFullYear();
                var month = currentDate.getMonth() - birthDateObj.getMonth();
                if (month < 0 || (month === 0 && currentDate.getDate() < birthDateObj.getDate())) {
                    age--;
                }
                $('#age').val(age);
            } else {
                $('#age').val('');
            }
        });
    });
</script>
