<!DOCTYPE html>
<html>
<head>
    <title>Produk</title>
</head>
<body>

<table border="1" width="100%" cellspacing="0">

<tr>
    <td colspan="2" align="center">
        <h1>TIKET TRAVEL ONLINE</h1>
    </td>
</tr>

<tr>

<!-- MENU -->
<td width="25%" height="900" align="center" valign="middle"
style="background-image:url('{{ asset('uts_assets/gambar2.jpg') }}'); background-size:cover;">

    <p>
        <font size="10" face="Brush Script MT">
            <a href="{{ url('/uts') }}" style="color:white; text-decoration:none;">Beranda</a>
        </font>
    </p>

    <p>
        <font size="10" face="Brush Script MT">
            <a href="{{ url('/uts/produk') }}" style="color:white; text-decoration:none;">Produk</a>
        </font>
    </p>

    <p>
        <font size="10" face="Brush Script MT">
            <a href="{{ url('/uts/kontak') }}" style="color:white; text-decoration:none;">Kontak</a>
        </font>
    </p>

    <p>
        <font size="10" face="Brush Script MT">
            <a href="{{ url('/uts/pendaftaran') }}" style="color:white; text-decoration:none;">Pendaftaran</a>
        </font>
    </p>
    <p>
        <font size="10" face="Brush Script MT">
            <a href="{{ url('/uts/pendaftaran?menu=data') }}" style="color:white; text-decoration:none;">Data Pendaftar</a>
        </font>
    </p>
    <p>
        <font size="10" face="Brush Script MT">
            <a href="{{ url('/') }}" style="color:#ffd700; text-decoration:none; font-weight:bold;">Portal Utama</a>
        </font>
    </p>

</td>

<!-- ISI -->
<td align="center">

    <font face="Times New Roman">

    <h2>DAFTAR TIKET TRAVEL</h2>

    <h3>Karimun Jawa</h3>
    <p>Harga : Rp 1.200.000</p>
    <img src="{{ asset('uts_assets/karimun.jpg') }}" width="300">

    <br><br>

    <h3>Bawean</h3>
    <p>Harga : Rp 1.300.000</p>
    <img src="{{ asset('uts_assets/bawean.jpg') }}" width="300">

    <br><br>

    <h3>Raja Ampat</h3>
    <p>Harga : Rp 2.000.000</p>
    <img src="{{ asset('uts_assets/rajaampat.jpg') }}" width="300">

    </font>

</td>

</tr>

</table>

</body>
</html>
