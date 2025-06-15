<!DOCTYPE html>
<html>
<head>
    <title>KlikBCA - Transfer</title>
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

        input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            color: green;
            margin-top: 10px;
            font-weight: bold;
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
    <div class="navbar">KlikBCA - Transfer</div>

    <div class="container">
        <h3>Form Transfer</h3>

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @elseif (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="/transfer" method="POST">
            @csrf

            <label for="to_username">Username Tujuan:</label>
            <input type="text" name="to_username" value="{{ old('to_username') }}" required>
            @error('to_username')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="amount">Jumlah Transfer (Rp):</label>
            <input type="number" name="amount" min="1" value="{{ old('amount') }}" required>
            @error('amount')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Password Anda:</label>
            <input type="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Kirim</button>
        </form>

        <div class="back-link">
            <a href="/dashboard">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
