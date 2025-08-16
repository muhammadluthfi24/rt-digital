<?php
include 'koneksi.php';
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$query = "SELECT * FROM warga WHERE nama_lengkap LIKE '%$cari%'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Warga RT</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        .container { background: #fff; padding: 25px; max-width: 1000px; margin: auto; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        h2 { text-align: center; }
        form { text-align: center; margin-bottom: 20px; }
        input[type="text"] { padding: 10px; width: 250px; border-radius: 4px; border: 1px solid #ccc; }
        button { padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        a.tambah { background: #007bff; color: white; padding: 8px 15px; border-radius: 4px; text-decoration: none; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border: 1px solid #ccc; }
        th { background: #007bff; color: white; }
        .aksi a { margin: 0 5px; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Warga RT</h2>
    <form method="GET">
        <input type="text" name="cari" placeholder="Cari nama..." value="<?php echo htmlspecialchars($cari); ?>">
        <button type="submit">Cari</button>
    </form>
    <a class="tambah" href="tambah.php">+ Tambah Warga</a>
    <table>
        <tr>
            <th>Nama</th><th>NIK</th><th>Alamat</th><th>Status</th><th>Iuran (Rp)</th><th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
            <td><?= htmlspecialchars($row['nik']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><?= number_format($row['iuran'], 0, ',', '.') ?></td>
            <td class="aksi">
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
