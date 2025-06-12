<!DOCTYPE html>
<html>
<head>
    <title>Transfer Dana - KlikBCA</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f0f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .transfer-box {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="transfer-box">
        <h2>Transfer Dana</h2>
        <form action="/transfer" method="POST">
            @csrf

            @if ($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <label>Tujuan Username</label>
            <input type="text" name="to_username" required>

            <label>Jumlah (Rp)</label>
            <input type="number" name="amount" required min="1">

            <button type="submit">Kirim Dana</button>
        </form>
        <a href="/dashboard">← Kembali ke Dashboard</a>
    </div>
</body>
</html>