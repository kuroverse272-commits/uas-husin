<!DOCTYPE html>
<html>
<head>
    <title>Update Data Pendaftar</title>
</head>
<body>

<h1 align="center">UPDATE DATA PENDAFTAR</h1>

@if($errors->any())
    <div style="max-width: 600px; margin: 15px auto; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/uts/pendaftaran/' . $d->id) }}">
    @csrf

<table border="1" align="center" cellpadding="10">

<tr>
    <td>Nama</td>
    <td>
        <input type="text" name="nama" size="40" required value="{{ old('nama', $d->nama) }}">
    </td>
</tr>

<tr>
    <td>Tempat Lahir</td>
    <td>
        <input type="text" name="tempat" size="40" required value="{{ old('tempat', $d->tempat) }}">
    </td>
</tr>

<tr>
    <td>Tanggal</td>
    <td>
        <input type="text" name="tgl" required value="{{ old('tgl', $d->tgl) }}">
    </td>
</tr>

<tr>
    <td>Bulan</td>
    <td>
        <input type="text" name="bulan" required value="{{ old('bulan', $d->bulan) }}">
    </td>
</tr>

<tr>
    <td>Tahun</td>
    <td>
        <input type="text" name="tahun" required value="{{ old('tahun', $d->tahun) }}">
    </td>
</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>
        <input type="text" name="jk" required value="{{ old('jk', $d->jk) }}">
    </td>
</tr>

<tr>
    <td>Alamat</td>
    <td>
        <textarea name="alamat" required>{{ old('alamat', $d->alamat) }}</textarea>
    </td>
</tr>

<tr>
    <td>Sekolah</td>
    <td>
        <input type="text" name="sekolah" size="40" required value="{{ old('sekolah', $d->sekolah) }}">
    </td>
</tr>

<tr>
    <td>Matematika</td>
    <td>
        <input type="number" name="mtk" required value="{{ old('mtk', $d->mtk) }}">
    </td>
</tr>

<tr>
    <td>Bahasa Inggris</td>
    <td>
        <input type="number" name="inggris" required value="{{ old('inggris', $d->inggris) }}">
    </td>
</tr>

<tr>
    <td>Bahasa Indonesia</td>
    <td>
        <input type="number" name="indo" required value="{{ old('indo', $d->indo) }}">
    </td>
</tr>

<tr>
    <td>Pilihan 1</td>
    <td>
        <input type="text" name="pil1" required value="{{ old('pil1', $d->pil1) }}">
    </td>
</tr>

<tr>
    <td>Pilihan 2</td>
    <td>
        <input type="text" name="pil2" required value="{{ old('pil2', $d->pil2) }}">
    </td>
</tr>

<tr>
    <td>Alasan</td>
    <td>
        <textarea name="alasan" required>{{ old('alasan', $d->alasan) }}</textarea>
    </td>
</tr>

<tr>
    <td colspan="2" align="center">
        <input type="submit" value="Simpan Perubahan">
        <a href="{{ url('/uts/pendaftaran?menu=data') }}" style="margin-left: 10px; display: inline-block; padding: 4px 10px; background-color: #e0e0e0; border: 1px solid #aaa; color: black; text-decoration: none; font-size: 13px; font-family: Arial, sans-serif; border-radius: 3px; vertical-align: middle;">Batal</a>
    </td>
</tr>

</table>

</form>

</body>
</html>
