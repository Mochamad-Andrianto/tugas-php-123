<?php
class Galeri {
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_gal";
        if($id != null) {
            $sql .= " WHERE id_gal = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($jd_gal, $tmp_gal, $foto_gal){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO db_gal VALUES('','$jd_gal','$tmp_gal','$foto_gal')")or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $result = $db->query("SELECT * FROM db_gal WHERE id_gal='$id'");
        $result2 = $result->fetch_object();
        $result3 = $result2->foto_gal;
        $db->query("DELETE FROM db_gal WHERE id_gal='$id'") or die ($db->error);
        unlink("../../assets/img/foto/" . $result3); 
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