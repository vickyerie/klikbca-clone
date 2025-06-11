<!DOCTYPE html>
<html>
<head>
    <title>KlikBCA Dashboard</title>
</head>
<body>
    <h2>Selamat Datang, {{ auth()->user()->username }}</h2>
    <ul>
        <li><a href="/saldo">Cek Saldo</a></li>
        <li><a href="/transfer">Transfer</a></li>
        <li><a href="/mutasi">Mutasi Rekening</a></li>
        <li><a href="/pembayaran">Pembayaran</a></li>
    </ul>
    <form action="/logout" method="POST">@csrf<button type="submit">Logout</button></form>
</body>
</html>
