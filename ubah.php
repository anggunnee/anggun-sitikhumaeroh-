<?php
require "functions.php";

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id") [0];

    if (isset($_POST["submit"] ) ) {
      
      if( ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
            </script>
        ";
      } else {
        echo " 
        <script>
        alert('data gagal diubah');
            document.location.href = 'index.php';
            </script>
            ";
      }
      

    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <a href="index.php">kembali</a>
   <title>Ubah data mahasiswa</title>
   <style>
       label {
        display: flex;
       }
   </style>
</head>
<body>
    <h1>Ubah data mahasiswa</h1>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $mhs["id"]; ?> ">
<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
<ul>
        <li>
            <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
    </li>
    <li>
        <label for="nrp">NRP :</label>
        <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"] ?>">
    </li>
    <li>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="<?= $mhs["email"] ?> ">
    </li>
    <li>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?> ">
    </li>
    <li>
        <label for="gambar">Gambar :</label>
<img src="img/<?= $mhs['gambar']; ?>" width="80">
        <input type="file" name="gambar" id="gambar">
    </li>
    <li>
        <button type="submit" name="submit">Ubah data</button>
    </li>
</ul>


</form>



</body>
</html>