<!DOCTYPE html>
<html>
<head>
    <title>Register - KlikBCA</title>
    <style>
        body { font-family: Arial; background: #f0f4f7; padding: 40px; }
        .form-box { max-width: 400px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, button { width: 100%; padding: 10px; margin-top: 10px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Register KlikBCA</h2>
        <form method="POST" action="/register">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <p style="text-align:center;"><a href="/login">Sudah punya akun? Login</a></p>
    </div>
</body>
</html>
