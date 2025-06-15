<!DOCTYPE html>
<html>
<head>
    <title>KlikBCA - Pembelian</title>
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
            max-width: 600px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h3 {
            text-align: center;
            color: #003399;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        select, input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            margin-top: 25px;
            background-color: #003399;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #001f66;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            width: 100%;
        }

        .back-link a {
            color: #003399;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">KlikBCA - Pembelian</div>

    <div class="container">
        <h3>Form Pembelian</h3>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/pembelian" method="POST">
            @csrf

            <label for="jenis">Jenis Pembelian:</label>
            <select name="jenis" required>
                <option value="">-- Pilih --</option>
                <option value="pulsa">Pulsa</option>
                <option value="pln">PLN Prabayar</option>
            </select>

            <label for="nomor">Nomor HP / ID Pelanggan:</label>
            <input type="text" name="nomor" required>

            <label for="amount">Jumlah Bayar:</label>
            <input type="number" name="amount" required>

            <label for="password">Konfirmasi Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Beli</button>
        </form>

        <div class="back-link">
            <a href="/dashboard">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
