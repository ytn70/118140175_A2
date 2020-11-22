<?php
    function faktorial (&$val){
        $hasil =1;
        for($x=$val;$x>0;$x--){
            $hasil*=$x;
        }
        $val=$hasil;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Fungsi Faktorial PHP</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <div class="box">
            <form class="form" method="POST">
                <label>Angka Yang ingin di Faktorialkan : <input type="number" name="inputan"></label>
                <input type="submit" value="Hitung" class="button" required>
            </form>
        
            <br><br>
            <div class="hasil">
                <?php
                    if (isset($_POST['inputan'])) {
                        $input = $_POST['inputan'];
                        faktorial($input);
                        echo "Hasil Faktorial : $input";
                    }
                ?>       
            </div>
        </div>
    </body>
</html>