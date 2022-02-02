<?php 
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');

    include '../models/m_guru.php';
   
    $connection = new database($host, $user, $pass, $database);

    $guru = new Guru($connection);
  
    $id_gr = $_POST['id_gr'];
    $nm_gr = $connection->conn->real_escape_string($_POST['nm_gr']);
    $jb_gr = $connection->conn->real_escape_string($_POST['jb_gr']);
    $mp_gr = $connection->conn->real_escape_string($_POST['mp_gr']);
    $kls_gr = $connection->conn->real_escape_string($_POST['kls_gr']);     

    $foto_gr = $_FILES['foto_gr']['name'];

    $extensi = explode(".",$foto_gr);
    $namabaru = $nm_gr.".".end($extensi);
    $sumber = $_FILES['foto_gr']['tmp_name'];
    

    if( $foto_gr == " "){
        $guru->ubahdata("UPDATE db_guru SET nm_gr='$nm_gr', jb_gr='$jb_gr', mp_gr='$mp_gr', kls_gr='$kls_gr' WHERE id_gr ='$id_gr'");        
        echo "<script> window.location='?page=guru';</script>";
    }else{
        $foto_awal = $guru->tampil($id_gr)->fetch_object()->foto_gr;
        unlink("../assets/img/foto/tmp-guru/".$foto_awal);
        $upload = move_uploaded_file($sumber, "../assets/img/foto/tmp-guru/".$namabaru);
        if($upload){
            $guru->ubahdata("UPDATE db_guru SET nm_gr='$nm_gr',jb_gr='$jb_gr', mp_gr='$mp_gr', kls_gr='$kls_gr', foto_gr='$namabaru' WHERE id_gr='$id_gr'");        
            echo "<script> window.location='?page=guru';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>