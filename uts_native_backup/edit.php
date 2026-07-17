<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM mahasiswa WHERE id='$id'");

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Pendaftar</title>
</head>
<body>

<h1 align="center">UPDATE DATA PENDAFTAR</h1>

<form method="POST" action="update.php">

<input type="hidden" name="id"
value="<?php echo $d['id']; ?>">

<table border="1" align="center" cellpadding="10">

<tr>
    <td>Nama</td>
    <td>
        <input type="text" name="nama"
        value="<?php echo $d['nama']; ?>">
    </td>
</tr>

<tr>
    <td>Tempat Lahir</td>
    <td>
        <input type="text" name="tempat"
        value="<?php echo $d['tempat']; ?>">
    </td>
</tr>

<tr>
    <td>Tanggal</td>
    <td>
        <input type="text" name="tgl"
        value="<?php echo $d['tgl']; ?>">
    </td>
</tr>

<tr>
    <td>Bulan</td>
    <td>
        <input type="text" name="bulan"
        value="<?php echo $d['bulan']; ?>">
    </td>
</tr>

<tr>
    <td>Tahun</td>
    <td>
        <input type="text" name="tahun"
        value="<?php echo $d['tahun']; ?>">
    </td>
</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>
        <input type="text" name="jk"
        value="<?php echo $d['jk']; ?>">
    </td>
</tr>

<tr>
    <td>Alamat</td>
    <td>
        <textarea name="alamat"><?php echo $d['alamat']; ?></textarea>
    </td>
</tr>

<tr>
    <td>Sekolah</td>
    <td>
        <input type="text" name="sekolah"
        value="<?php echo $d['sekolah']; ?>">
    </td>
</tr>

<tr>
    <td>Matematika</td>
    <td>
        <input type="number" name="mtk"
        value="<?php echo $d['mtk']; ?>">
    </td>
</tr>

<tr>
    <td>Bahasa Inggris</td>
    <td>
        <input type="number" name="inggris"
        value="<?php echo $d['inggris']; ?>">
    </td>
</tr>

<tr>
    <td>Bahasa Indonesia</td>
    <td>
        <input type="number" name="indo"
        value="<?php echo $d['indo']; ?>">
    </td>
</tr>

<tr>
    <td>Pilihan 1</td>
    <td>
        <input type="text" name="pil1"
        value="<?php echo $d['pil1']; ?>">
    </td>
</tr>

<tr>
    <td>Pilihan 2</td>
    <td>
        <input type="text" name="pil2"
        value="<?php echo $d['pil2']; ?>">
    </td>
</tr>

<tr>
    <td>Alasan</td>
    <td>
        <textarea name="alasan"><?php echo $d['alasan']; ?></textarea>
    </td>
</tr>

<tr>
    <td colspan="2" align="center">
        <input type="submit"
        value="Simpan Perubahan">
        <a href="pendaftaran.php?menu=data" style="margin-left: 10px; display: inline-block; padding: 4px 10px; background-color: #e0e0e0; border: 1px solid #aaa; color: black; text-decoration: none; font-size: 13px; font-family: Arial, sans-serif; border-radius: 3px; vertical-align: middle;">Batal</a>
    </td>
</tr>

</table>

</form>

</body>
</html>