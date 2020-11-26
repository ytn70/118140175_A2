<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data</title>
    </head>
    <body>
        <div id="box">
            <?php 
                //menghubungkan ke file fungsi.php agar dapat memanggil fungsi di dalam file tersebut
                require "fungsi.php";

                //mencek apakah tombol tambah pada form sudah di klik
                if(isset($_POST['tambah'])):

                    //mengirim data ke fungsi tambah di file fungsi.php
                    if(tambah($_POST)>0):
                        //menandakan file yang baru masuk agar saat menampilkan jurusan sesuai dengan nrp yang baru masuk
                        $nrp=$_POST['nrp'];
                        //membuat query untuk mengambil data nama jurusan sesuai nrp dan kode jurusan
                        $query="SELECT jurusan.nama_jur FROM mahasiswa,jurusan WHERE mahasiswa.id_jur = jurusan.id_jur AND mahasiswa.nrp = '$nrp'";
                        //menjalankan query
                        $ambilData=mysqli_query($conn,$query);
                        //menampilkan data sesuai dengan assoc(sesuai nama field)
                        $namaJur=mysqli_fetch_assoc($ambilData);
                        echo "Data Berhasil Ditambahkan Dengan Rincian Sebagai Berikut<br><br>";
            ?>

                     <table border="1" cellpadding="5" cellspacing="0">
                         <tr>
                             <th>NRP</th>
                             <th>Nama</th>
                             <th>Alamat</th>
                             <th>Jurusan</th>
                         </tr>
                         <tr>
                             <!--menampilkan data dalam tabel sesuai inputan barusan-->
                             <td><?=$_POST["nrp"];?></td>
                             <td><?=$_POST["nama"];?></td>
                             <td><?=$_POST["alamat"];?></td>
                             <!--meanmpilkan nama jurusan melalui proses query di atas-->
                             <td><?=$namaJur['nama_jur'];?></td>
                         </tr>
                     </table>
                    <?php else:
                        //menampilkan jika data tidak dapat ditambahkan dalam database
                        echo "Data Gagal Ditambahkan<br><br>";
                        echo mysqli_error($conn);
                    ?>
                <?php endif;?>
                
                <?php else:
                    //mencegah mengirim data kosong ke database
                    echo "Anda belum memasukkan data";
                ?>
            <?php endif;?>

            <a href="118140175_Tugas.php">Kembali</a>
        </div>
    </body>
</html>