<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pencarian</title>
</head>
    <body>
        <div id="box">
            <?php
                require "fungsi.php";
                if(isset($_POST['cari'])):
                    $banyakData=adaData($_POST['nama']);
                    if($banyakData>0):
                        echo "Data ditemukan sebanyak $banyakData buah. Rinciannya sebagai berikut :<br>";
                        $arrayData=cari($_POST['nama']);
            ?>
                    <table border="1" cellpadding="5" cellspacing="0">
                        <tr>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                        </tr>
                        <?php foreach ($arrayData as $tampil):?>
                        <tr>
                            <td><?=$tampil[0];?></td>
                            <td><?=$tampil[1];?></td>
                            <td><?=$tampil[2];?></td>
                            <td><?=$tampil[3];?></td>
                        </tr>       
                        <?php endforeach?>
                    </table>
                    <?php else:
                        echo "Data tidak ditemukan<br>";
                    ?>
                    <?php endif ?>
                <?php endif ?>

            <a href="118140175_Tugas.php">Kembali</a>
        </div>
    </body>
</html>