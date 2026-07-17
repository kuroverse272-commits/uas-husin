<?php
include "koneksi.php";

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
INSERT INTO mahasiswa
(
nama,
tempat,
tgl,
bulan,
tahun,
jk,
alamat,
sekolah,
mtk,
inggris,
indo,
pil1,
pil2,
alasan
)
VALUES
(
'$nama',
'$tempat',
'$tgl',
'$bulan',
'$tahun',
'$jk',
'$alamat',
'$sekolah',
'$mtk',
'$inggris',
'$indo',
'$pil1',
'$pil2',
'$alasan'
)
");

header("Location: pendaftaran.php?menu=data");
exit;
?>