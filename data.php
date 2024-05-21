<?php
include "koneksi.php"; 
if(isset($_POST['simpan'])){
    mysqli_query($koneksi,"insert into data_karyawan set
    id = '$_POST[id]',
    nama = '$_POST[nama]',
    usia = '$_POST[usia]',
    tanggal_lahir = '$_POST[tanggal_lahir]',
    keterangan = '$_POST[keterangan]'");

    echo "Data Pegawai berhasil disimpan";
}
echo "insert into data_karyawan set
    id = '$_POST[id]',
    nama = '$_POST[nama]',
    usia = '$_POST[usia]',
    tanggal_lahir = '$_POST[tanggal_lahir]',
    keterangan = '$_POST[keterangan]";
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Form Registri</title>
</head>
<body>
    <h1>Data Karyawan</h1>
    <form action="" method="post">
        
        <table>
            <!-- id -->
            <tr>
                <td>Id</td>
                <td><input type="text" name="id"></td>
            </tr>
            <!-- id -->
        </table>
            <table>
            <!-- name -->
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <!-- end name -->
        </table>
            <table>
            <!-- usia -->
            <tr>
                <td>Usia<td>
                <td><input type="number" name="usia"></td>
            </tr>
        </table>
            <!-- end usia -->
            <!-- tanggal lahir -->
         <table>   
            <tr>
                <td>Tanggal lahir</td>
                <td><input type="date" name="tanggal_lahir"></td>
             </tr>
             <!-- end tanggal lahir -->
        </table>
             <!-- keterangan -->
             <tr>
                <td>keterangan</td>
                <br><textarea row="100" id="keterangan" name="keterangan"></textarea></br>
              </tr>
            <tr>
                <td>
                    <input type="submit" name="simpan" value="Simpan Data">
                </td>
        </tr>    
            </table> 


    </form>
    <br>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Id</td>
            <td>Nama</td>
            <td>Usia.</td>
            <td>Tanggal_lahir</td>
            <td>keterangan</td>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        if(!isset($_GET['kode'])){
            $no=1; 
            $data_karyawan=mysqli_query($koneksi,"SELECT * FROM data_karyawan ORDER BY nama ASC");
            while ($tampil_data=mysqli_fetch_array($data_karyawan)) {
        ?>
        <tr>
            <td><?= $no++; ?>.</td>
            <td><?= $tampil_data['id']; ?></td>
            <td><?= $tampil_data['nama']; ?></td>
            <td><?= $tampil_data['usia']; ?></td>
            <td><?= $tampil_data['tanggal_lahir']; ?></td>
            <td><?= $tampil_data['keterangan']; ?></td>
            <td><a href="<?= '?kode='.$tampil['id']; ?>"> Hapus</td>
            <td>Ubah</td>
        </tr>
        <?php    
        }
        } 
        ?>

    </table>       
</body>
</html>

<?php
if(isset($_GET['kode'])) {

mysqli_query($koneksi,"delete from data_karyawan where id='$_GET[kode]'");

echo "Data telah terhapus";
echo "<meta http-uquiv=refresh content=2;URL='data.php'>";
}

?>
