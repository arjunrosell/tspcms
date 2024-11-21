<!-- resources/views/livewire/general-report/index.blade.php -->
<div>
    <h1>General Report</h1>

    <!-- Date Range Selector -->
    <div class="mb-4">
        <label for="date_start">Start Date:</label>
        <input type="date" id="date_start" wire:model="date_start" class="border p-2">
        <label for="date_end" class="ml-4">End Date:</label>
        <input type="date" id="date_end" wire:model="date_end" class="border p-2">
        <button wire:click="generateReport" class="bg-blue-500 text-white p-2 mt-4">Generate Report</button>
    </div>

    <!-- Donation Report -->
    <div class="mb-6">
        <h2>Donation Report</h2>
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">{{ $columnsDonation[0]['columns'][0]['title'] }}</th>
                    <th class="border px-4 py-2">{{ $columnsDonation[0]['columns'][1]['title'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donationData as $donation)
                    <tr>
                        <td class="border px-4 py-2">{{ $donation['donationReference'] }}</td>
                        <td class="border px-4 py-2">{{ number_format($donation['amount'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="border px-4 py-2 font-bold">Total</td>
                    <td class="border px-4 py-2 font-bold">{{ number_format($totalDonationAmount, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Expense Report -->
    <div class="mb-6">
        <h2>Expense Report</h2>
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">{{ $columnsExpenses[0]['columns'][0]['title'] }}</th>
                    <th class="border px-4 py-2">{{ $columnsExpenses[0]['columns'][1]['title'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expensesData as $expense)
                    <tr>
                        <td class="border px-4 py-2">{{ $expense['category'] }}</td>
                        <td class="border px-4 py-2">{{ number_format($expense['amount'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="border px-4 py-2 font-bold">Total</td>
                    <td class="border px-4 py-2 font-bold">{{ number_format($totalExpenseAmount, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
