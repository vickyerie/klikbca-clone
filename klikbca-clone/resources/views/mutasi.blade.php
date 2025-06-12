<!DOCTYPE html>
<html>
<head>
    <title>Mutasi Rekening - KlikBCA</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f0f4f7;
            padding: 40px;
        }
        .mutasi-box {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #0066cc;
            color: white;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="mutasi-box">
        <h2>Mutasi Rekening</h2>

        @if($transactions->isEmpty())
            <p style="text-align: center;">Tidak ada transaksi.</p>
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

        <a href="/dashboard">Kembali ke Dashboard</a>
    </div>
</body>
</html>