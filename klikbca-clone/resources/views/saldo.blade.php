<!DOCTYPE html>
<html>
<head>
    <title>Cek Saldo - KlikBCA</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f0f4f7;
            padding: 40px;
            text-align: center;
        }
        .saldo-box {
            background-color: white;
            border-radius: 8px;
            display: inline-block;
            padding: 30px 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .jumlah {
            font-size: 28px;
            color: #0066cc;
            margin-top: 15px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="saldo-box">
        <h2>Saldo Anda</h2>
        <div class="jumlah">Rp {{ number_format($saldo, 2, ',', '.') }}</div>
        <a href="/dashboard">← Kembali ke Dashboard</a>
    </div>
</body>
</html>