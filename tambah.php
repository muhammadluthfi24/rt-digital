<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $iuran = $_POST['iuran'];
    $query = "INSERT INTO warga (nama_lengkap, nomor_kk, nik, alamat, status, iuran) 
              VALUES ('$nama', '$kk', '$nik', '$alamat', '$status', '$iuran')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        .form-box { background: #fff; padding: 25px; max-width: 500px; margin: auto; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        input, textarea, select { width: 100%; padding: 10px; margin-top: 10px; border-radius: 4px; border: 1px solid #ccc; }
        button { margin-top: 15px; padding: 10px; background: #007bff; color: white; border: none; width: 100%; border-radius: 4px; }
        a { display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
<div class="form-box">
    <h2>Tambah Data Warga</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="text" name="kk" placeholder="Nomor KK" required>
        <input type="text" name="nik" placeholder="NIK" required>
        <textarea name="alamat" placeholder="Alamat" required></textarea>
        <select name="status" required>
            <option value="Kepala Keluarga">Kepala Keluarga</option>
            <option value="Anggota Keluarga">Anggota Keluarga</option>
        </select>
        <input type="number" name="iuran" placeholder="Iuran (Rp)" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>
