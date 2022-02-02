<?php 
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');

    include '../models/m_siswa.php';
   
    $connection = new database($host, $user, $pass, $database);

    $siswa = new Siswa($connection);
  
    $induk = $_POST['induk'];
    $nm_sw = $connection->conn->real_escape_string($_POST['nm_sw']);
    $jk_sw = $connection->conn->real_escape_string($_POST['jk_sw']);
    $jur_sw = $connection->conn->real_escape_string($_POST['jur_sw']);
    $kls_sw = $connection->conn->real_escape_string($_POST['kls_sw']);
    $th_sw = $connection->conn->real_escape_string($_POST['th_sw']);    

    // $pict = $_FILES['foto_gr']['name'];

    // $extensi = explode(".",$_FILES['foto_gr']['name']);
    // $namabaru = $nm_gr.".".end($extensi);
    // $sumber = $_FILES['foto_gr']['tmp_name'];
    

    // if( $pict == ''){
        $siswa->ubahdata("Update db_siswa SET nm_sw='$nm_sw', jk_sw='$jk_sw', jur_sw='$jur_sw', kls_sw='$kls_sw', th_sw='$th_sw' Where induk ='$induk'");        
        echo "<script> window.location='?page=Siswa';</script>";
    // }else{
    //             echo "<script>alert('Upload Gagal Broo..!')</script>";
    //         }
    //else{
    //     $foto_awal = $guru->tampil($id_gr)->fetch_object()->foto_gr;
    //     $upload = move_uploaded_file($sumber, "../assets/img/foto/".$namabaru);
    //     unlink("../assets/img/foto/".$foto_awal);
    //     if($upload){
    //         $guru->ubahdata("Update db_guru SET nm_gr='$nm_gr',jb_gr='$jb_gr', ket_gr='$ket_gr', foto_gr='$namabaru' Where id='$id_gr'");        
    //         echo "<script> window.location='?page=guru';</script>";
    //     }else {
            //echo "<script>alert('Upload Gagal Broo..!')</script>";
    //}
    // }    

?>