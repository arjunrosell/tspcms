<div class="container mx-auto mt-5">
    <form wire:submit.prevent="createWedding" class="space-y-6">
        <div>
            <label for="wedding_date" class="block text-sm font-medium text-gray-700">Date of Wedding</label>
            <input type="date" id="wedding_date" wire:model="wedding_date"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('wedding_date')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="wedding_time" class="block text-sm font-medium text-gray-700">Time of Wedding</label>
            <input type="time" id="wedding_time" wire:model="wedding_time"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('wedding_time')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="wedding_type" class="block text-sm font-medium text-gray-700">Type of Wedding</label>
            <select id="wedding_type" wire:model="wedding_type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                <option value="nuptial">Nuptial (With Mass)</option>
                <option value="civil">Civil</option>
            </select>
            @error('wedding_type')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="application_date" class="block text-sm font-medium text-gray-700">Date of Application</label>
            <input type="date" id="application_date" wire:model="application_date"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                required>
            @error('application_date')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Groom's Information -->
        <div class="border-t border-gray-300 pt-4 space-y-4">
            <h3 class="text-lg font-medium text-gray-800">Groom's Information</h3>
            <div>
                <label for="groom_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="groom_name" wire:model="groom_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('groom_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                <input type="date" id="groom_birthday" wire:model="groom_birthday"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('groom_birthday')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_age" class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" id="groom_age" wire:model="groom_age" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('groom_age')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_father" class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" id="groom_father" wire:model="groom_father"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_father')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="groom_mother" class="block text-sm font-medium text-gray-700">Mother's Name</label>
                <input type="text" id="groom_mother" wire:model="groom_mother"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_mother')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="groom_address" wire:model="groom_address"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_address')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" id="groom_contact" wire:model="groom_contact"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_contact')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_baptism" class="block text-sm font-medium text-gray-700">Place of Baptism</label>
                <input type="text" id="groom_baptism" wire:model="groom_baptism"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_baptism')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_baptism_parish" class="block text-sm font-medium text-gray-700">Parish of
                    Baptism</label>
                <input type="text" id="groom_baptism_parish" wire:model="groom_baptism_parish"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_baptism_parish')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_baptism_date" class="block text-sm font-medium text-gray-700">Date of Baptism</label>
                <input type="date" id="groom_baptism_date" wire:model="groom_baptism_date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_baptism_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_confirmation" class="block text-sm font-medium text-gray-700">Place of
                    Confirmation</label>
                <input type="text" id="groom_confirmation" wire:model="groom_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_confirmation')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_confirmation_parish" class="block text-sm font-medium text-gray-700">Parish of
                    Confirmation</label>
                <input type="text" id="groom_confirmation_parish" wire:model="groom_confirmation_parish"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_confirmation_parish')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="groom_confirmation_date" class="block text-sm font-medium text-gray-700">Date of
                    Confirmation</label>
                <input type="date" id="groom_confirmation_date" wire:model="groom_confirmation_date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('groom_confirmation_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Bride's Information -->
        <div class="border-t border-gray-300 pt-4 space-y-4">
            <h3 class="text-lg font-medium text-gray-800">Bride's Information</h3>
            <div>
                <label for="bride_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="bride_name" wire:model="bride_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('bride_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                <input type="date" id="bride_birthday" wire:model="bride_birthday"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('bride_birthday')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_age" class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" id="bride_age" wire:model="bride_age" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                    required>
                @error('bride_age')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_father" class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" id="bride_father" wire:model="bride_father"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_father')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="bride_mother" class="block text-sm font-medium text-gray-700">Mother's Name</label>
                <input type="text" id="bride_mother" wire:model="bride_mother"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_mother')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="bride_address" wire:model="bride_address"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_address')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" id="bride_contact" wire:model="bride_contact"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_contact')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_baptism" class="block text-sm font-medium text-gray-700">Place of Baptism</label>
                <input type="text" id="bride_baptism" wire:model="bride_baptism"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_baptism')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_baptism_parish" class="block text-sm font-medium text-gray-700">Parish of
                    Baptism</label>
                <input type="text" id="bride_baptism_parish" wire:model="bride_baptism_parish"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_baptism_parish')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_baptism_date" class="block text-sm font-medium text-gray-700">Date of
                    Baptism</label>
                <input type="date" id="bride_baptism_date" wire:model="bride_baptism_date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_baptism_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_confirmation" class="block text-sm font-medium text-gray-700">Place of
                    Confirmation</label>
                <input type="text" id="bride_confirmation" wire:model="bride_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_confirmation')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_confirmation_parish" class="block text-sm font-medium text-gray-700">Parish of
                    Confirmation</label>
                <input type="text" id="bride_confirmation_parish" wire:model="bride_confirmation_parish"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_confirmation_parish')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="bride_confirmation_date" class="block text-sm font-medium text-gray-700">Date of
                    Confirmation</label>
                <input type="date" id="bride_confirmation_date" wire:model="bride_confirmation_date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                @error('bride_confirmation_date')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-2">
            <a href="{{ route('analytics-events-wedding.index') }}"
                class="inline-flex items-center gap-2 px-3 py-2 text-sm text-indigo-600 transition-colors duration-150 ease-linear border border-indigo-600 rounded-md hover:text-white hover:bg-indigo-700">
                Back
            </a>
            <button type="submit"
                class="inline-flex items-center gap-1 px-3 py-2 text-sm text-white transition-colors duration-150 ease-linear bg-indigo-600 rounded-md hover:bg-indigo-700">
                Save
            </button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#groom_birthday').on('input', function() {
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

                    @this.set('groom_age', age);
                } else {
                    $('#groom_age').val('');
                }
            });

            $('#bride_birthday').on('input', function() {
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

                    @this.set('bride_age', age);
                } else {
                    $('#bride_age').val('');
                }
            });
        });
    </script>
    @push('script')
    @endpush
</div>
