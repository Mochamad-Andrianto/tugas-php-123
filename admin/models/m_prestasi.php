<?php
class Prestasi {
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_pres limit 2";
        if($id != null) {
            $sql .= " WHERE id = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tampil2($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_pres";
        if($id != null) {
            $sql .= " WHERE id = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($judul, $tgl, $tmp, $ket, $foto_pres){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO db_pres VALUES('','$judul','$tgl','$tmp', '$ket', '$foto_pres')") or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $result = $db->query("SELECT * FROM db_pres WHERE id='$id'");
        $result2 = $result->fetch_object();
        $result3 = $result2->foto_pres;
        $db->query("DELETE FROM db_pres WHERE id='$id'") or die ($db->error);
        unlink("../../assets/img/foto/" . $result3); 
    }
    public function ubahdata($sql)
        {
            $db = $this->mysqli->conn;
            $db->query($sql) or die ($db->error);
        }

}
?>