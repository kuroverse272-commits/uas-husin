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
    style="background-image:url('{{ asset('uts_assets/gambar2.jpg') }}'); background-size:cover;">

    <p class="menu">
        <a href="{{ url('/uts') }}">Beranda</a>
    </p>

    <p class="menu">
        <a href="{{ url('/uts/produk') }}">Produk</a>
    </p>

    <p class="menu">
        <a href="{{ url('/uts/kontak') }}">Kontak</a>
    </p>

    <p class="menu">
        <a href="{{ url('/uts/pendaftaran') }}">Pendaftaran</a>
    </p>

    <p class="menu">
        <a href="{{ url('/uts/pendaftaran?menu=data') }}">Data Pendaftar</a>
    </p>

    <p class="menu">
        <a href="{{ url('/') }}" style="color:#ffd700; font-weight:bold;">Portal Utama</a>
    </p>

</td>

<td valign="top"
    style="background-image:url('{{ asset('uts_assets/gambar1.jpg') }}'); background-size:cover; padding:20px;">

<div class="container">

@if($menu == 'data')
    @include('uts.tampil')
@else

<h1>FORMULIR PENDAFTARAN</h1>

@if($errors->any())
    <div style="padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 15px; text-align: left;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/uts/pendaftaran') }}">
    @csrf

<table class="form">

<tr>
    <td width="220">Nama</td>
    <td>:</td>
    <td>
        <input type="text" name="nama" size="40" required value="{{ old('nama') }}">
    </td>
</tr>

<tr>
    <td>Tempat Lahir</td>
    <td>:</td>
    <td>
        <input type="text" name="tempat" size="40" required value="{{ old('tempat') }}">
    </td>
</tr>

<tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td>

        <select name="tgl">
        @for($i=1;$i<=31;$i++)
            <option value="{{ $i }}" {{ old('tgl') == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
        </select>

        <select name="bulan">
            @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $b)
                <option value="{{ $b }}" {{ old('bulan') == $b ? 'selected' : '' }}>{{ $b }}</option>
            @endforeach
        </select>

        <select name="tahun">
        @for($i=1990;$i<=2025;$i++)
            <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
        </select>

    </td>
</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>
        <input type="radio" name="jk" value="Laki-laki" required {{ old('jk') == 'Laki-laki' ? 'checked' : '' }}>
        Laki-laki

        <input type="radio" name="jk" value="Perempuan" {{ old('jk') == 'Perempuan' ? 'checked' : '' }}>
        Perempuan
    </td>
</tr>

<tr>
    <td>Alamat</td>
    <td>:</td>
    <td>
        <textarea name="alamat" required>{{ old('alamat') }}</textarea>
    </td>
</tr>

<tr>
    <td>Sekolah Asal</td>
    <td>:</td>
    <td>
        <input type="text" name="sekolah" size="40" required value="{{ old('sekolah') }}">
    </td>
</tr>

<tr>
    <td>Nilai Matematika</td>
    <td>:</td>
    <td>
        <input type="number" name="mtk" required value="{{ old('mtk') }}">
    </td>
</tr>

<tr>
    <td>Nilai Bahasa Inggris</td>
    <td>:</td>
    <td>
        <input type="number" name="inggris" required value="{{ old('inggris') }}">
    </td>
</tr>

<tr>
    <td>Nilai Bahasa Indonesia</td>
    <td>:</td>
    <td>
        <input type="number" name="indo" required value="{{ old('indo') }}">
    </td>
</tr>

<tr>
    <td>Jurusan Pilihan 1</td>
    <td>:</td>
    <td>
        <select name="pil1">
            @foreach(['TEKNIK INFORMATIKA', 'SISTEM INFORMASI', 'TEKNIK INDUSTRI'] as $jur)
                <option value="{{ $jur }}" {{ old('pil1') == $jur ? 'selected' : '' }}>{{ $jur }}</option>
            @endforeach
        </select>
    </td>
</tr>

<tr>
    <td>Jurusan Pilihan 2</td>
    <td>:</td>
    <td>
        <select name="pil2">
            @foreach(['TEKNIK INFORMATIKA', 'SISTEM INFORMASI', 'TEKNIK INDUSTRI'] as $jur)
                <option value="{{ $jur }}" {{ old('pil2') == $jur ? 'selected' : '' }}>{{ $jur }}</option>
            @endforeach
        </select>
    </td>
</tr>

<tr>
    <td>Alasan Masuk</td>
    <td>:</td>
    <td>
        <textarea name="alasan" required>{{ old('alasan') }}</textarea>
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
@endif

</div>

</td>
</tr>
</table>

</body>
</html>
