<?php 
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');

    include '../models/m_galeri.php';
   
    $connection = new database($host, $user, $pass, $database);

    $galeri = new Galeri($connection);
  
    $id_gal = $_POST['id_gal'];
    $jd_gal = $connection->conn->real_escape_string($_POST['jd_gal']);
    $tmp_gal = $connection->conn->real_escape_string($_POST['tmp_gal']);    

    $foto_gal = $_FILES['foto_gal']['name'];

    $extensi = explode(".",$_FILES['foto_gal']['name']);
    $namabaru = $jd_gal.".".end($extensi);
    $sumber = $_FILES['foto_gal']['tmp_name'];
    

    if( $foto_gal == ""){
        $galeri->ubahdata("UPDATE db_gal SET jd_gal='$jd_gal', tmp_gal='$tmp_gal' WHERE id_gal ='$id_gal'");        
        echo "<script> window.location='?page=Galeri';</script>";
    }else{
        $foto_awal = $galeri->tampil($id_gal)->fetch_object()->foto_gal;
        unlink("../assets/img/foto/tmp-galeri/".$foto_awal);
        $upload = move_uploaded_file($sumber, "../assets/img/foto/tmp-galeri/".$namabaru);
        if($upload){
            $galeri->ubahdata("UPDATE db_gal SET jd_gal='$jd_gal',tmp_gal='$tmp_gal', foto_gal='$namabaru' WHERE id_gal='$id_gal'");        
            echo "<script> window.location='?page=Galeri';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>