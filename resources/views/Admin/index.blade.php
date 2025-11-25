<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Produk</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1300px;
            margin: 0 auto;
            position: relative;
        }

        /* === BUTTON LOGOUT === */
        .btn-logout {
            position: absolute;
            top: -10px;
            right: 0;
            padding: 10px 20px;
            background: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            transition: background 0.3s;
        }
        .btn-logout:hover {
            background: #c0392b;
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 25px;
            border-left: 5px solid #3498db;
            padding-left: 15px;
        }

        .btn-add {
            display: inline-block;
            margin-bottom: 30px;
            padding: 12px 25px;
            background: #2ecc71;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            transition: background 0.3s, transform 0.1s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-add:hover {
            background: #27ae60;
            transform: translateY(-1px);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background: #34495e;
            color: white;
            padding: 15px 20px;
            font-size: 14px;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        td {
            padding: 15px 20px;
            border-bottom: 1px solid #ecf0f1;
            font-size: 15px;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
            transition: background-color 0.2s;
        }

        .col-foto {
            width: 100px;
        }

        .col-harga {
            text-align: right;
            font-weight: 600;
            color: #e74c3c;
        }

        .col-gender {
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
            background-color: #ecf0f1;
            font-size: 13px;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn-edit {
            background: #3498db;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            margin-right: 5px;
        }
        .btn-edit:hover {
            background: #2980b9;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }
        .btn-delete:hover {
            background: #c0392b;
        }

    </style>
</head>

<body>

    <div class="container">

        <!-- 🔥 Tambahan baru: Tombol Logout -->
        <a href="{{ route('logout') }}" class="btn-logout">Logout</a>

        <h1>Daftar Produk (Admin)</h1>

        <a href="{{ route('produk.create') }}" class="btn-add">
            + Tambah Produk
        </a>

        <table>
            <thead>
                <tr>
                    <th class="col-foto">Foto</th>
                    <th>Nama Produk</th>
                    <th>Gender</th>
                    <th class="col-harga">Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($produks as $p)
                <tr>
                    <td class="col-foto">
                        <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama_produk }}" class="product-image">
                    </td>

                    <td>{{ $p->nama_produk }}</td>

                    <td><span class="col-gender">{{ $p->kategori->gender }}</span></td>

                    <td class="col-harga">Rp {{ number_format($p->harga) }}</td>

                    <td>
                        <a href="{{ route('admin.edit', $p->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('admin.destroy', $p->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
