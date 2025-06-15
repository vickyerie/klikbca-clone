<!DOCTYPE html>
<html>
<head>
    <title>Ubah Password</title>
    <style>
        body {
            font-family: Arial;
            background-color: #e6f0fa;
            padding: 40px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h3 {
            color: #003399;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            width: 100%;
            background-color: #003399;
            color: white;
            border: none; padding: 12px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .message {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

    </style>
</head>
<body>
    <div class="container">
        <h3>Ubah Password</h3>

        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @elseif (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/ubah-password">
            @csrf
            <label>Password Saat Ini:</label>
            <input type="password" name="current_password" required>

            <label>Password Baru:</label>
            <input type="password" name="new_password" required>

            <label>Konfirmasi Password Baru:</label>
            <input type="password" name="new_password_confirmation" required>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="/dashboard" style="color: #003399; font-weight: bold; text-decoration: none;">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
