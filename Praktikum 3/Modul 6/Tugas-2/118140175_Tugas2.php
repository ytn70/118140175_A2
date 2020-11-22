<?php 
    function hitung_bet(&$val){
        $hilangkan_spasi = str_replace(' ', '', $val);
        $panjang_string = strlen($hilangkan_spasi);
        if($panjang_string>=1 && $panjang_string<=10){
            $harga = $panjang_string*300;
        }else if($panjang_string>=11 && $panjang_string<=20){
            $harga = $panjang_string*500;
        }else if($panjang_string>=21){
            $harga = $panjang_string*700;
        }
        return $harga;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hitung Harga Bet</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    
    <body>
        <div class="utama">
            <h2>Menghitung Harga Bet Dan Menampilkan Sesuai Warna Yang Diinginkan</h2>
            <form method="POST">
                <table border="0" cellpadding="8" cellspacing="0">
                    <tr>
                        <td><label for="nama">Masukkan Nama Anda</label></td>
                        <td>:</td>
                        <td><input type="text" id="nama" name="nama_user" required</td>
                    </tr>
    
                    <tr>
                        <td><label for="warna">Masukkan Warna Text</label></td>
                        <td>:</td>
                        <td><input type="text" id="warna" name="warna_user" value="Red""</td>
                    </tr> 
                    
                    <tr>
                        <td colspan="3"><center><input type="submit" value="Hitung" name="submit"></center></td>
                    </tr>
                </table>
            </form>

            <!--php-->
            <?php 
                if(isset($_POST['submit'])):
                    $nama=$_POST['nama_user'];
                    $warna=$_POST['warna_user'];
                    $warna_spasi=str_replace(" ",'',$warna);
            ?>
            
            <!--hasil-->
            <table border="0" cellspacing="0" cellpadding="5" style="color: <?=$warna_spasi;?>">
                <tr>
                    <td>Nama </td>
                    <td>:</td>
                    <td><?=$nama;?></td>
                </tr>
                <tr>
                    <td>Harga </td>
                    <td>:</td>
                    <td>Rp.<?=hitung_bet($nama);?>,-</td>
                </tr>
                <tr>
                    <td>Warna</td>
                    <td>:</td>
                    <td><?=$warna;?></td>
                </tr>
            </table>
        <?php endif ?>
        </div>
    </body>
</html>