<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Report</h1>

    <h2>Donations</h2>
    <table>
        <thead>
            <tr>
                <th>Donation Reference</th>
                <th>Category</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->donationData as $data)
                <tr>
                    <td>{{ $data['donationReference'] }}</td>
                    <td>{{ $data['category'] }}</td>
                    <td>{{ number_format($data['amount'], 2) }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="2">Total Donations</td>
                <td>{{ number_format($this->donationTotal, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Expenses</h2>
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->expensesData as $data)
                <tr>
                    <td>{{ $data['category'] }}</td>
                    <td>{{ number_format($data['amount'], 2) }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td>Total Expenses</td>
                <td>{{ number_format($this->expenseTotal, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
