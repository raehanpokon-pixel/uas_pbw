<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 30px;
        }

        .container {
            width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h1 {
            margin-bottom: 20px;
            border-left: 5px solid #3498db;
            padding-left: 15px;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-submit {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: #2980b9;
        }

        .preview-image {
            width: 120px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Produk</h1>

    <form action="{{ route('admin.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" required>

        <label>Kategori:</label>
        <select name="kategori_id" required>
            @foreach($kategoris as $k)
                <option value="{{ $k->id }}" {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                    {{ $k->gender }}
                </option>
            @endforeach
        </select>

        <label>Harga:</label>
        <input type="number" name="harga" value="{{ $produk->harga }}" required>

        <label>Foto Produk (opsional):</label>
        <input type="file" name="foto">

        <img src="{{ asset('storage/' . $produk->foto) }}" class="preview-image">

        <button class="btn-submit">Update Produk</button>

    </form>

</div>

</body>
</html>
