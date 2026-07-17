<?php
include "koneksi.php";

$id       = $_POST['id'];
$nama     = $_POST['nama'];
$tempat   = $_POST['tempat'];
$tgl      = $_POST['tgl'];
$bulan    = $_POST['bulan'];
$tahun    = $_POST['tahun'];
$jk       = $_POST['jk'];
$alamat   = $_POST['alamat'];
$sekolah  = $_POST['sekolah'];
$mtk      = $_POST['mtk'];
$inggris  = $_POST['inggris'];
$indo     = $_POST['indo'];
$pil1     = $_POST['pil1'];
$pil2     = $_POST['pil2'];
$alasan   = $_POST['alasan'];

mysqli_query($koneksi,"
UPDATE mahasiswa SET
nama='$nama',
tempat='$tempat',
tgl='$tgl',
bulan='$bulan',
tahun='$tahun',
jk='$jk',
alamat='$alamat',
sekolah='$sekolah',
mtk='$mtk',
inggris='$inggris',
indo='$indo',
pil1='$pil1',
pil2='$pil2',
alasan='$alasan'
WHERE id='$id'
");

header("Location:pendaftaran.php?menu=data");
?>