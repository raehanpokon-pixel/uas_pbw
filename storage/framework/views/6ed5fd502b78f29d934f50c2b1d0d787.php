<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Produk</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #efdbc9;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .form-wrapper {
            background: #fff;
            width: 450px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.12);
        }

        .form-wrapper h2 {
            text-align: center;
            color: #4a1f1f;
            margin-bottom: 25px;
            font-size: 26px;
            letter-spacing: .5px;
        }

        label {
            font-weight: 600;
            color: #4a1f1f;
            margin-bottom: 6px;
            display: block;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 11px;
            border: 2px solid #d9b597;
            border-radius: 8px;
            margin-bottom: 16px;
            outline: none;
            transition: 0.3s;
            font-size: 14px;
            background: #fff7f0;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #5c2222;
        }

        textarea {
            resize: none;
            height: 90px;
        }

        /* Upload Area */
        .upload-area {
            border: 2px dashed #d9b597;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 15px;
            color: #6c4a4a;
            background: #fff7f0;
            transition: .3s;
        }

        .upload-area:hover {
            border-color: #5c2222;
            background: #ffeede;
        }

        .img-preview {
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
            display: none;
            border: 2px solid #d9b597;
        }

        /* Buttons */
        .btn-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            transition: 0.3s;
            font-size: 14px;
        }

        .btn-save {
            background-color: #5c2222;
        }

        .btn-save:hover {
            opacity: 0.85;
        }

        .btn-cancel {
            background-color: #777;
        }

        .btn-cancel:hover {
            opacity: 0.85;
        }
    </style>

</head>
<body>

<div class="form-wrapper">

    <h2>Tambah Produk Baru</h2>

    <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label>Nama Produk</label>
        <input type="text" name="nama_produk" placeholder="Masukkan nama produk" required>

        <label>Pilih Gender</label>
        <select name="gender" required>
            <option value="men">Men</option>
            <option value="women">Women</option>
        </select>

        <label>Kategori</label>
        <select name="kategori_id" required>
            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama_kategori); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label>Foto Produk</label>
        <div class="upload-area" onclick="document.getElementById('file').click()">
            Klik untuk upload foto
        </div>

        <div class="mb-4">
            <label class="block">Harga</label>
            <input type="number" name="harga" step="0.01" class="w-full border p-2" required>
        </div>

        <input id="file" type="file" name="foto" accept="image/*" hidden onchange="previewImage(event)">
        <img id="preview" class="img-preview">

        <div class="btn-row">
            <button type="button" class="btn-cancel" onclick="history.back()">Cancel</button>
            <button type="submit" class="btn-save">Simpan</button>
        </div>

       


    </form>
</div>

<script>
function previewImage(event){
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = "block";
}
</script>

</body>
</html>
<?php /**PATH D:\uaspbw\resources\views/input/craete.blade.php ENDPATH**/ ?>