<?php
class Berita {
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id_br = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_br limit 3";
        if($id_br != null) {
            $sql .= " WHERE id_br = $id_br";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    
    public function tampil2($id_br = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_br";
        if($id_br != null) {
            $sql .= " WHERE id_br = $id_br";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($jd_br, $tgl_br, $ket_br, $foto_br){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO db_br VALUES('','$jd_br','$tgl_br', '$ket_br', '$foto_br')")or die ($db->error);
    }
    public function hapus($id_br){
        $db = $this->mysqli->conn;
        $result = $db->query("SELECT * FROM db_br WHERE id_br='$id_br'");
        $result2 = $result->fetch_object();
        $result3 = $result2->foto_br;
        $db->query("DELETE FROM db_br WHERE id_br='$id_br'") or die ($db->error);
        unlink("../../assets/img/foto/" . $result3); 
    }
    public function ubahdata($sql)
        {
            $db = $this->mysqli->conn;
            $db->query($sql) or die ($db->error);
        }

        public function tampil_berita($id_br){
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM db_br WHERE id_br='$id_br'";
            $query = $db->query($sql) or die ($db->error);
            return $query;

        }

}
?>