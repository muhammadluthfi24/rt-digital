<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM warga WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $iuran = $_POST['iuran'];
    $query = "UPDATE warga SET 
              nama_lengkap='$nama', 
              nomor_kk='$kk', 
              nik='$nik', 
              alamat='$alamat', 
              status='$status', 
              iuran='$iuran' 
              WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        .form-box { background: #fff; padding: 25px; max-width: 500px; margin: auto; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        input, textarea, select { width: 100%; padding: 10px; margin-top: 10px; border-radius: 4px; border: 1px solid #ccc; }
        button { margin-top: 15px; padding: 10px; background: #28a745; color: white; border: none; width: 100%; border-radius: 4px; }
        a { display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
<div class="form-box">
    <h2>Edit Data Warga</h2>
    <form method="POST">
        <input type="text" name="nama" value="<?= $data['nama_lengkap'] ?>" required>
        <input type="text" name="kk" value="<?= $data['nomor_kk'] ?>" required>
        <input type="text" name="nik" value="<?= $data['nik'] ?>" required>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
        <select name="status" required>
            <option <?= $data['status'] == "Kepala Keluarga" ? "selected" : "" ?>>Kepala Keluarga</option>
            <option <?= $data['status'] == "Anggota Keluarga" ? "selected" : "" ?>>Anggota Keluarga</option>
        </select>
        <input type="number" name="iuran" value="<?= $data['iuran'] ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">← Kembali</a>
</div>
</body>
</html>
