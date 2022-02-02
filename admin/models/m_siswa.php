<?php
class Siswa {
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_siswa";
        if($id != null) {
            $sql .= "WHERE induk = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($nm_sw, $jk_sw, $jur_sw, $kls_sw, $th_sw){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO db_siswa VALUES('','$nm_sw','$jk_sw','$jur_sw', '$kls_sw', '$th_sw')")or die ($db->error);
    }
    public function hapus($induk){
        $db = $this->mysqli->conn;
        $result = $db->query("SELECT * FROM db_siswa WHERE induk='$induk'");
        // $result2 = $result->fetch_object();
        // $result3 = $result2->foto_gr;
        $db->query("DELETE FROM db_siswa WHERE induk='$induk'") or die ($db->error);
        // unlink("../../assets/img/foto/" . $result3); 
    }
    public function ubahdata($sql)
        {
            $db = $this->mysqli->conn;
            $db->query($sql) or die ($db->error);
        }
    // public function ubahdata($data){
    //     global $conn;
    //     $this->conn->query($data);
    //     return mysqli_affected_rows($this->conn);
    // }
}
?>