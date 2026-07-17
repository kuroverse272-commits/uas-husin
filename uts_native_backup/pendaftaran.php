<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tiket Travel Online</title>

    <style>
        body{
            margin:0;
            font-family:"Times New Roman", serif;
            background-color:#f2f2f2;
        }

        a{
            color:white;
            text-decoration:none;
        }

        a:visited{
            color:white;
        }

        .menu{
            font-size:40px;
            font-family:"Brush Script MT";
            margin:40px 0;
            font-weight:bold;
        }

        .container{
            width:90%;
            margin:auto;
            background:white;
            border-radius:10px;
            padding:20px;
        }

        table.form{
            width:100%;
        }

        table.form td{
            padding:8px;
        }

        textarea{
            width:300px;
            height:90px;
        }

        .btn{
            padding:8px 20px;
            cursor:pointer;
        }
    </style>

</head>

<body>

<table border="1" width="100%" cellspacing="0">

<tr>
    <td colspan="2" align="center">
        <h1>TIKET TRAVEL ONLINE</h1>
    </td>
</tr>

<tr>

<td width="25%"
    height="800"
    valign="middle"
    align="center"
    style="background-image:url('gambar2.jpg'); background-size:cover;">

    <p class="menu">
        <a href="index.php">Beranda</a>
    </p>

    <p class="menu">
        <a href="produk.php">Produk</a>
    </p>

    <p class="menu">
        <a href="kontak.php">Kontak</a>
    </p>

    <p class="menu">
        <a href="pendaftaran.php">Pendaftaran</a>
    </p>

    <p class="menu">
        <a href="pendaftaran.php?menu=data">Data Pendaftar</a>
    </p>

    <p class="menu">
        <a href="../" style="color:#ffd700; font-weight:bold;">Portal Utama</a>
    </p>

</td>

<td valign="top"
    style="background-image:url('gambar1.jpg'); background-size:cover; padding:20px;">

<div class="container">

<?php
$menu = isset($_GET['menu']) ? $_GET['menu'] : '';

if($menu=="data")
{
    include "tampil.php";
}
else
{
?>

<h1>FORMULIR PENDAFTARAN</h1>

<form method="POST" action="simpan.php">

<table class="form">

<tr>
    <td width="220">Nama</td>
    <td>:</td>
    <td>
        <input type="text" name="nama" size="40" required>
    </td>
</tr>

<tr>
    <td>Tempat Lahir</td>
    <td>:</td>
    <td>
        <input type="text" name="tempat" size="40" required>
    </td>
</tr>

<tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td>

        <select name="tgl">
        <?php
        for($i=1;$i<=31;$i++)
        {
            echo "<option>$i</option>";
        }
        ?>
        </select>

        <select name="bulan">
            <option>Januari</option>
            <option>Februari</option>
            <option>Maret</option>
            <option>April</option>
            <option>Mei</option>
            <option>Juni</option>
            <option>Juli</option>
            <option>Agustus</option>
            <option>September</option>
            <option>Oktober</option>
            <option>November</option>
            <option>Desember</option>
        </select>

        <select name="tahun">
        <?php
        for($i=1990;$i<=2025;$i++)
        {
            echo "<option>$i</option>";
        }
        ?>
        </select>

    </td>
</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>
        <input type="radio" name="jk" value="Laki-laki" required>
        Laki-laki

        <input type="radio" name="jk" value="Perempuan">
        Perempuan
    </td>
</tr>

<tr>
    <td>Alamat</td>
    <td>:</td>
    <td>
        <textarea name="alamat" required></textarea>
    </td>
</tr>

<tr>
    <td>Sekolah Asal</td>
    <td>:</td>
    <td>
        <input type="text" name="sekolah" size="40" required>
    </td>
</tr>

<tr>
    <td>Nilai Matematika</td>
    <td>:</td>
    <td>
        <input type="number" name="mtk" required>
    </td>
</tr>

<tr>
    <td>Nilai Bahasa Inggris</td>
    <td>:</td>
    <td>
        <input type="number" name="inggris" required>
    </td>
</tr>

<tr>
    <td>Nilai Bahasa Indonesia</td>
    <td>:</td>
    <td>
        <input type="number" name="indo" required>
    </td>
</tr>

<tr>
    <td>Jurusan Pilihan 1</td>
    <td>:</td>
    <td>
        <select name="pil1">
            <option>TEKNIK INFORMATIKA</option>
            <option>SISTEM INFORMASI</option>
            <option>TEKNIK INDUSTRI</option>
        </select>
    </td>
</tr>

<tr>
    <td>Jurusan Pilihan 2</td>
    <td>:</td>
    <td>
        <select name="pil2">
            <option>TEKNIK INFORMATIKA</option>
            <option>SISTEM INFORMASI</option>
            <option>TEKNIK INDUSTRI</option>
        </select>
    </td>
</tr>

<tr>
    <td>Alasan Masuk</td>
    <td>:</td>
    <td>
        <textarea name="alasan" required></textarea>
    </td>
</tr>

<tr>
    <td colspan="3">
        <input type="checkbox" name="setuju" value="ya" required>
        Dengan ini saya menyetujui persyaratan
    </td>
</tr>

<tr>
    <td colspan="3" align="right">

        <input type="submit"
               name="daftar"
               value="Daftar"
               class="btn">

        <input type="reset"
               value="Cancel"
               class="btn">

    </td>
</tr>

</table>

</form>

<?php
}
?>

</div>

</td>
</tr>
</table>

</body>
</html>