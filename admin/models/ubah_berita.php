<?php 
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');

    include '../models/m_berita.php';
   
    $connection = new database($host, $user, $pass, $database);

    $prestasi = new Berita($connection);
  
    $id_br = $_POST['id_br'];
    $jd_br = $connection->conn->real_escape_string($_POST['jd_br']);
    $tgl_br = $connection->conn->real_escape_string($_POST['tgl_br']);
    $ket_br = $connection->conn->real_escape_string($_POST['ket_br']);     

    $foto_br = $_FILES['foto_br']['name'];

    $extensi = explode(".",$foto_br);
    $namabaru = $jd_br.".".end($extensi);
    $sumber = $_FILES['foto_br']['tmp_name'];
    

    if( $foto_br == " "){
        $prestasi->ubahdata("UPDATE db_br SET jd_br='$jd_br', tgl_br='$tgl_br', ket_br='$ket_br' WHERE id_br ='$id_br'");        
        echo "<script> window.location='?page=Berita';</script>";
    }else{
        $foto_awal = $prestasi->tampil2($id_br)->fetch_object()->foto_br;
        unlink("../assets/img/foto/tmp-brita/".$foto_awal);
        $upload = move_uploaded_file($sumber, "../assets/img/foto/tmp-brita/".$namabaru);
        if($upload){
            $prestasi->ubahdata("UPDATE db_br SET jd_br='$jd_br',tgl_br='$tgl_br', ket_br='$ket_br', foto_br='$namabaru' WHERE id_br='$id_br'");        
            echo "<script> window.location='?page=Berita';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>