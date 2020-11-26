<!DOCTYPE html>
<html lang='ind'>
    <head>
        <title>Tugas MySQLi</title>
    </head>
    <body>
        <div class="header">
            <h1>DATA MAHASISWA PENS</h1>
            =============================================================
        </div>
        
        <form action="tambahData.php" method="post">
            <h2>TAMBAH DATA</h2>
            <br>
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td><label for="nrp">NRP</label></td>
                    <td>:</td>
                    <td><input type="number" name="nrp" id="nrp" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="nama" required></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td>:</td>
                    <td><input type="text" name="alamat" id="alamat" required></td>
                </tr>
                <tr>
                    <td><label for="jurusan">Jurusan</label></td>
                    <td>:</td>
                    <td>
                        <select type="" name="jurusan" id="jurusan">
                            <option value="TK">Telekomunikasi</option>
                            <option value="EK">Elka</option>
                            <option value="IT">IT</option>
                            <option value="EI">Elin</option>

                        </select>
                    </td>
                </tr>
                <tr class="button_tambah">
                    <td colspan="3"><center><button type="submit" name="tambah">Tambah</button></center></td>
                </tr>
            </table>
        </form>
        <br>
        =============================================================

        <form action="cariData.php" method="POST">
            <h2>SEARCH DATA</h2>
            <br>
            <label for="cari">Nama : <input type="text" name="nama" id="nama" required></label>
            <button type="submit" name="cari">Cari Data</button>
        </form>
        <br>
        =============================================================
        
        <form action="" method="POST">
            <h2>DELETE DATA</h2>
            <br>
            <label for="nrp">NRP : <input type="number" name="nrp" id="nrp" min="0" required></label>
            <button type="submit" name="hapus" onclick="return confirm('Data dengan NRP <?=$_POST['nrp']?> akan dihapus?')">Delete Data</button>
            <?php
                require "fungsi.php";
                if(isset($_POST['hapus'])){
                    $var=$_POST['nrp'];
                    $hasil=hapus($var);
                    if ($hasil>0) {
                    echo "Data berhasil dihapus";
                    }else{
                        echo "Data gagal dihapus";
                    }
                } 
            ?>
        </form>
    </body>
</html>