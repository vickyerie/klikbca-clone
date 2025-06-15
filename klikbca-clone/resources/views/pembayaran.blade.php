<!DOCTYPE html>
<html>
<head>
    <title>KlikBCA - Pembayaran</title>
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

        select, input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
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
    <div class="navbar">KlikBCA - Pembayaran</div>

    <div class="container">
        <h3>Form Pembayaran</h3>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/pembayaran" method="POST">
            @csrf

            <label for="kategori">Kategori:</label>
            <select name="kategori" required>
                <option value="">-- Pilih --</option>
                <option value="listrik">Listrik</option>
                <option value="air">Air</option>
                <option value="internet">Internet</option>
            </select>

            <label for="nomor">Nomor Pelanggan:</label>
            <input type="text" name="nomor" required>

            <label for="amount">Jumlah Bayar:</label>
            <input type="number" name="amount" required>

            <button type="submit">Bayar</button>
        </form>

        <div class="back-link">
            <a href="/dashboard">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
