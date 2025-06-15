<!DOCTYPE html>
<html>
<head>
    <title>Cek Saldo</title>
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
            margin: 60px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .label {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .amount {
            font-size: 36px;
            color: #003399;
            font-weight: bold;
        }

        a.button {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #003399;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        a.button:hover {
            background-color: #001f66;
        }
    </style>
</head>
<body>
    <div class="navbar">KlikBCA - Cek Saldo</div>

    <div class="container">
        <div class="label">Saldo Anda Saat Ini:</div>
        <div class="amount">Rp {{ number_format(auth()->user()->saldo, 0, ',', '.') }}</div>

        <a href="/dashboard" class="button">Kembali ke Dashboard</a>
    </div>
</body>
</html>
