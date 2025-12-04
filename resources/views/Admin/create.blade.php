<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk Admin</title>
</head>
<body>

    <h1>Tambah Produk (Admin)</h1>

    <form action="{{ route('Admin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            @foreach($kategoris as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required>
        <br><br>

        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="men">Pria</option>
            <option value="women">Wanita</option>
        </select>
        <br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required>
        <br><br>

        <label>Foto Produk:</label><br>
        <input type="file" name="foto" required>
        <br><br>

        <button type="submit">Simpan Produk</button>
    </form>

</body>
</html>
    