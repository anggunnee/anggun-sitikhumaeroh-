<?php

require 'functions.php';

// Pastikan fungsi query dan cari tersedia dan berfungsi dengan baik
try {
    $mahasiswa = query("SELECT * FROM mahasiswa");

    if (isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>


<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah data mahasiswa</a>
<br><br>
<form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="Cari data mahasiswa" autocomplete="off">
    <button type="submit" name="cari">Cari</button>
</form>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | 
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin mau dihapus?');">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="100" alt="Gambar Mahasiswa"></td>
            <td><?= htmlspecialchars($row["nrp"]); ?></td>
            <td><?= htmlspecialchars($row["nama"]); ?></td>
            <td><?= htmlspecialchars($row["email"]); ?></td>
            <td><?= htmlspecialchars($row["jurusan"]); ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>
