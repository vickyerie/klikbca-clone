<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran - KlikBCA</title>
</head>
<body>
    <h2>Pembayaran</h2>

    @if ($errors->any())
        <div style="color:red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/pembayaran" method="POST">
        @csrf
        <label for="kategori">Kategori:</label>
        <select name="kategori" required>
            <option value="">-- Pilih --</option>
            <option value="listrik">Listrik</option>
            <option value="air">Air</option>
            <option value="internet">Internet</option>
        </select><br><br>

        <label for="nomor">Nomor Pelanggan:</label>
        <input type="text" name="nomor" required><br><br>

        <label for="jumlah">Jumlah Bayar:</label>
        <input type="number" name="amount" required><br><br>

        <button type="submit">Bayar</button>
    </form>

    <br>
    <a href="/dashboard">Kembali</a>
</body>
</html>
