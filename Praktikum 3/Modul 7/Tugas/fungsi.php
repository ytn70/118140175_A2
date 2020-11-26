<?php
    $conn = mysqli_connect("localhost","root","","universitas");

    function tambah($data){
        global $conn;
        $nrp=$data["nrp"];
        $nama=$data["nama"];
        $alamat=$data["alamat"];
        $id=$data["jurusan"];

        $query = "INSERT INTO mahasiswa VALUES ('$nrp','$nama','$alamat','$id')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    function cari($cari){
        global $conn;
        $query="SELECT mahasiswa.nrp, mahasiswa.nama, mahasiswa.alamat, jurusan.nama_jur                        
                    FROM mahasiswa, jurusan 
                        WHERE mahasiswa.id_jur=jurusan.id_jur 
                            AND mahasiswa.nama 
                                LIKE '%$cari%'";
        $hasil=mysqli_query($conn,$query);
        $arrayData = [];
        
        while($record = mysqli_fetch_row($hasil)){
            $arrayData[] = $record;
        }
        return $arrayData;
    }
    
    function adaData($ada){
        global $conn;
        $query="SELECT mahasiswa.nrp, mahasiswa.nama, mahasiswa.alamat, jurusan.nama_jur                        
                    FROM mahasiswa, jurusan 
                        WHERE mahasiswa.id_jur=jurusan.id_jur 
                            AND mahasiswa.nama 
                                LIKE '%$ada%'";
        $hasil=mysqli_query($conn,$query);
        $banyakData=mysqli_num_rows($hasil);

        return $banyakData;
        
    }

    function hapus($var){
        global $conn;
        $query="DELETE FROM mahasiswa WHERE mahasiswa.nrp='$var'";
        mysqli_query($conn,$query);
        $hasil=mysqli_affected_rows($conn);
        return ($hasil);
    }
?>