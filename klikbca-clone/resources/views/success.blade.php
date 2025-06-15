<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Berhasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f0fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        h2 {
            color: #003399;
        }

        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #003399;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .btn:hover {
            background-color: #001f66;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Transaksi Berhasil!</h2>
        <p>Terima kasih, transaksi Anda telah diproses.</p>
        <a href="/dashboard" class="btn">Kembali ke Dashboard</a>
    </div>
</body>
</html>
