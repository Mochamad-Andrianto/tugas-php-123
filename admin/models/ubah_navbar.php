<?php 
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');

    include '../models/m_navbar.php';
   
    $connection = new database($host, $user, $pass, $database);

    $navbar = new Navbar($connection);
  
    $id = $_POST['id'];
    $title = $connection->conn->real_escape_string($_POST['title']);
    $subtitle = $connection->conn->real_escape_string($_POST['subtitle']);
    $button = $connection->conn->real_escape_string($_POST['button']);     

    $img = $_FILES['img']['name'];

    $extensi = explode(".",$img);
    $namabaru = $title.".".end($extensi);
    $sumber = $_FILES['img']['tmp_name'];
    

    if( $img == " "){
        $navbar->ubahdata("UPDATE db_nav SET title='$title', subtitle='$subtitle', button='$button' WHERE id ='$id'");        
        echo "<script> window.location='?page=navbar';</script>";
    }else{
        $foto_awal = $navbar->tampil($id)->fetch_object()->img;
        unlink("../assets/img/foto/tmp-navbar/".$foto_awal);
        $upload = move_uploaded_file($sumber, "../assets/img/foto/tmp-navbar/".$namabaru);
        if($upload){
            $navbar->ubahdata("UPDATE db_nav SET title='$title',subtitle='$subtitle', button='$button', img='$namabaru' WHERE id='$id'");        
            echo "<script> window.location='?page=navbar';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }    

?>