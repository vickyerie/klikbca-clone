<!DOCTYPE html>
<html>
<head>
    <title>Mutasi Rekening</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e6f0fa;
        }

        .navbar {
            background-color: #003399;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h3 {
            color: #003399;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #003399;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .empty {
            text-align: center;
            font-style: italic;
            margin-top: 20px;
        }

        a.button {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background-color: #003399;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        a.button:hover {
            background-color: #001f66;
        }

        form.filter-form {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        form.filter-form label {
            font-weight: bold;
        }

        form.filter-form input[type="date"] {
            padding: 6px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        form.filter-form button {
            background-color: #003399;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        form.filter-form button:hover {
            background-color: #001f66;
        }
    </style>
</head>
<body>
    <div class="navbar">KlikBCA - Mutasi Rekening</div>

    <div class="container">
        <h3>Riwayat Transaksi</h3>

        <!-- Filter Tanggal -->
        <form method="GET" action="/mutasi" class="filter-form">
            <label for="from">Dari:</label>
            <input type="date" name="from" id="from" value="{{ request('from') }}">

            <label for="to">Sampai:</label>
            <input type="date" name="to" id="to" value="{{ request('to') }}">

            <button type="submit">Filter</button>
        </form>

        @if($transactions->isEmpty())
            <div class="empty">Tidak ada transaksi.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $trx)
                        <tr>
                            <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ ucfirst($trx->type) }}</td>
                            <td>Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                            <td>{{ $trx->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div style="text-align: center;">
            <a href="/dashboard" class="button">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
