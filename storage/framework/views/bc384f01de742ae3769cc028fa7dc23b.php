<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk Admin</title>
</head>
<body>

    <h1>Tambah Produk (Admin)</h1>

    <form action="<?php echo e(route('Admin.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>


        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama_kategori); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br><br>

        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required>
        <br><br>

        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
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
    <?php /**PATH D:\uaspbw\resources\views/Admin/create.blade.php ENDPATH**/ ?>