<!DOCTYPE html>
<html>
<head>
    <title>KlikBCA Dashboard</title>
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
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            padding: 40px;
            max-width: 1000px;
            margin: auto;
            text-align: center;
        }

        .welcome {
            font-size: 24px;
            font-weight: bold;
            color: #003399;
            margin-bottom: 30px;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .menu a {
            background-color: white;
            color: #003399;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .menu a:hover {
            background-color: #cce0ff;
        }

        .logout-form {
            margin-top: 20px;
        }

        .logout-form button {
            background-color: #cc0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-form button:hover {
            background-color: #990000;
        }

        footer {
            margin-top: 40px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="navbar">KlikBCA</div>

    <div class="container">
        <div class="welcome">Selamat Datang, {{ auth()->user()->username }}</div>

        <div class="menu">
            <a href="/saldo">💰 Cek Saldo</a>
            <a href="/transfer">💸 Transfer</a>
            <a href="/mutasi">📄 Mutasi Rekening</a>
            <a href="/pembayaran">🧾 Pembayaran</a>
        </div>

        <form action="/logout" method="POST" class="logout-form">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <footer>
            © 2025 KlikBCA Clone – Terima kasih telah menggunakan layanan kami.
        </footer>
    </div>
</body>
</html>
