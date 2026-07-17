<?php
include "koneksi.php";
?>

<h2 align="center">DATA PENDAFTAR</h2>

<table border="1" width="100%" cellpadding="5">

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

<?php
$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa");

while($d=mysqli_fetch_array($data))
{
?>

<tr>
    <td><?php echo $d['id']; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['tempat']; ?></td>
    <td><?php echo $d['jk']; ?></td>
    <td><?php echo $d['sekolah']; ?></td>
    <td><?php echo $d['mtk']; ?></td>
    <td><?php echo $d['inggris']; ?></td>
    <td><?php echo $d['indo']; ?></td>
    <td><?php echo $d['pil1']; ?></td>
    <td><?php echo $d['pil2']; ?></td>
    <td><?php echo $d['alasan']; ?></td>

    <td>
        <a style="color:blue;"
           href="edit.php?id=<?php echo $d['id']; ?>">
           Edit
        </a>

        |

        <a style="color:red;"
           href="hapus.php?id=<?php echo $d['id']; ?>"
           onclick="return confirm('Yakin ingin menghapus data ini?')">
           Hapus
        </a>
    </td>

</tr>

<?php
}
?>

</table>