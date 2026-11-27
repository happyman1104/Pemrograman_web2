<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kasus 6 - Batas Upload File</title>
</head>
<body>
    <h3>Kasus 6: Penanganan Kegagalan Upload File (Konfigurasi php.ini)</h3>
    <ul>
        <li>Nilai <code>upload_max_filesize</code> aktif saat ini: <b><?= ini_get('upload_max_filesize'); ?></b></li>
        <li>Nilai <code>post_max_size</code> aktif saat ini: <b><?= ini_get('post_max_size'); ?></b></li>
    </ul>
    <p><i>Solusi sesuai materi: Ubah kedua parameter di atas menjadi <code>80M</code> di file <code>php.ini</code> dan restart Apache agar file berukuran besar tidak gagal diunggah.</i></p>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="berkas" required>
        <button type="submit" name="upload">Uji Upload</button>
    </form>
    <hr>
    <?php
    if (isset($_POST['upload'])) {
        if (!empty($_FILES['berkas']['name']) && $_FILES['berkas']['error'] === UPLOAD_ERR_OK) {
            $nama = htmlspecialchars($_FILES['berkas']['name']);
            $ukuranKB = round($_FILES['berkas']['size'] / 1024, 2);
            echo "Status: <b>Berhasil terbaca!</b> Nama file: <b>$nama</b> ($ukuranKB KB)";
        } else {
            echo "Status: <b>Gagal upload!</b> Ukuran file melebihi batas maksimum pada <code>php.ini</code>.";
        }
    }
    ?>
</body>
</html>