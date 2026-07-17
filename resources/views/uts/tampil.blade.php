<h2 align="center">DATA PENDAFTAR</h2>

@if(session('success'))
    <div style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 15px; font-family: sans-serif; text-align: left;">
        {{ session('success') }}
    </div>
@endif

<table border="1" width="100%" cellpadding="5" style="border-collapse: collapse; background-color: white;">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>JK</th>
    <th>Sekolah</th>
    <th>MTK</th>
    <th>Inggris</th>
    <th>Indonesia</th>
    <th>Pilihan 1</th>
    <th>Pilihan 2</th>
    <th>Alasan</th>
    <th>Aksi</th>
</tr>

@forelse($data as $d)
<tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->nama }}</td>
    <td>{{ $d->tempat }}</td>
    <td>{{ $d->jk }}</td>
    <td>{{ $d->sekolah }}</td>
    <td>{{ $d->mtk }}</td>
    <td>{{ $d->inggris }}</td>
    <td>{{ $d->indo }}</td>
    <td>{{ $d->pil1 }}</td>
    <td>{{ $d->pil2 }}</td>
    <td>{{ $d->alasan }}</td>

    <td>
        <a style="color:blue; text-decoration: underline;"
           href="{{ url('/uts/pendaftaran/' . $d->id . '/edit') }}">
           Edit
        </a>

        |

        <form action="{{ url('/uts/pendaftaran/' . $d->id . '/delete') }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            <button type="submit" style="background: none; border: none; color: red; text-decoration: underline; cursor: pointer; padding: 0; font-family: inherit; font-size: inherit;">
                Hapus
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="12" align="center" style="padding: 15px; color: #666; font-style: italic;">
        Belum ada data pendaftar.
    </td>
</tr>
@endforelse

</table>
