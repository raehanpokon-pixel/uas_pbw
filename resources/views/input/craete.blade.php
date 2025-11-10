<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Produk</title>

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
    margin-bottom: 20px;
}

label {
    font-weight: 600;
    color: #4a1f1f;
    margin-bottom: 5px;
    display: block;
}

input[type="text"],
select,
textarea {
    width: 100%;
    padding: 10px;
    border: 2px solid #d9b597;
    border-radius: 8px;
    margin-bottom: 15px;
    outline: none;
    transition: 0.3s;
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

/* Upload */
.upload-area {
    border: 2px dashed #d9b597;
    padding: 15px;
    border-radius: 10px;
    text-align: center;
    cursor: pointer;
    margin-bottom: 15px;
    color: #6c4a4a;
}

.upload-area:hover {
    border-color: #5c2222;
}

.img-preview {
    width: 100%;
    border-radius: 10px;
    margin-top: 10px;
    display: none;
}

/* Button Style */
.btn-row {
    display: flex;
    justify-content: space-between;
    margin-top: 15px;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    color: white;
    transition: 0.3s;
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

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Produk</label>
        <input type="text" name="nama_produk" placeholder="Masukkan nama produk" required>

        <label>Kategori</label>
        <select name="kategori_id" required>
            @foreach($kategoris as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>

    
        <label>Foto Produk</label>
        <div class="upload-area" onclick="document.getElementById('file').click()">
            Klik untuk upload foto
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
