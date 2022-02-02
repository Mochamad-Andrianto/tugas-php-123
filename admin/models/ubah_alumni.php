<?php 
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');

    include '../models/m_alumni.php';
   
    $connection = new database($host, $user, $pass, $database);

    $alumni = new Alumni($connection);
  
    $id_al = $_POST['id_al'];
    $nm_al = $connection->conn->real_escape_string($_POST['nm_al']);
    $desk_al = $connection->conn->real_escape_string($_POST['desk_al']);    

    $foto_al = $_FILES['foto_al']['name'];

    $extensi = explode(".",$_FILES['foto_al']['name']);
    $namabaru = $nm_al.".".end($extensi);
    $sumber = $_FILES['foto_al']['tmp_name'];
    

    if( $foto_al == ""){
        $alumni->ubahdata("UPDATE db_alumni SET nm_al='$nm_al', desk_al='$desk_al' WHERE id_al ='$id_al'");        
        echo "<script> window.location='?page=Alumni';</script>";
    }else{
        $foto_awal = $alumni->tampil($id_al)->fetch_object()->foto_al;
        unlink("assets/img/foto/tmp-alumni/".$foto_awal);
        $upload = move_uploaded_file($sumber, "assets/img/foto/tmp-alumni/".$namabaru);
        if($upload){
            $alumni->ubahdata("UPDATE db_alumni SET nm_al='$nm_al',desk_al='$desk_al', foto_al='$namabaru' WHERE id_al='$id_al'");        
            echo "<script> window.location='?page=Alumni';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>