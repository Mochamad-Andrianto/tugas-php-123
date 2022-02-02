<?php 
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');

    include '../models/m_prestasi.php';
   
    $connection = new database($host, $user, $pass, $database);

    $prestasi = new Prestasi($connection);
  
    $id = $_POST['id'];
    $judul = $connection->conn->real_escape_string($_POST['judul']);
    $tgl = $connection->conn->real_escape_string($_POST['tgl']);
    $tmp = $connection->conn->real_escape_string($_POST['tmp']);
    $ket = $connection->conn->real_escape_string($_POST['ket']);     

    $foto_pres = $_FILES['foto_pres']['name'];

    $extensi = explode(".",$foto_pres);
    $namabaru = $judul.".".end($extensi);
    $sumber = $_FILES['foto_pres']['tmp_name'];
    

    if( $foto_pres == " "){
        $prestasi->ubahdata("UPDATE db_pres SET judul='$judul', tgl='$tgl', tmp='$tmp', ket='$ket' WHERE id ='$id'");        
        echo "<script> window.location='?page=Prestasi';</script>";
    }else{
        $foto_awal = $prestasi->tampil2($id)->fetch_object()->foto_pres;
        unlink("../img/foto/tmp-prestasi/".$foto_awal);
        $upload = move_uploaded_file($sumber, "../assets/img/foto/tmp-prestasi/".$namabaru);
        if($upload){
            $prestasi->ubahdata("UPDATE db_pres SET judul='$judul',tgl='$tgl', tmp='$tmp', ket='$ket', foto_pres='$namabaru' WHERE id='$id'");        
            echo "<script> window.location='?page=Prestasi';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>