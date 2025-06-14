<!DOCTYPE html>
<html>
<head>
    <title>Login KlikBCA</title>
    <style>
        body {
            background-color: #0066cc;
            color: white;
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background-color: white;
            color: black;
            padding: 30px;
            border-radius: 8px;
            width: 300px;
        }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 8px; margin-bottom: 10px;
        }
        button {
            width: 100%; background-color: #0066cc; color: white; padding: 10px; border: none;
        }
        .register-link {
            margin-top: 15px;
            text-align: center;
        }
        .register-link a {
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h3>Login KlikBCA</h3>
        <form action="/login" method="POST">
            @csrf
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            @if ($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="/register">Daftar di sini</a>
        </div>
    </div>
</body>
</html>
