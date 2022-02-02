<?php
class Guru {
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_guru";
        if($id != null) {
            $sql .= " WHERE id_gr = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($nm_gr, $jb_gr, $mp_gr, $kls_gr, $foto_gr){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO db_guru VALUES('','$nm_gr','$jb_gr','$mp_gr', '$kls_gr', '$foto_gr')")or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $result = $db->query("SELECT * FROM db_guru WHERE id_gr='$id'");
        $result2 = $result->fetch_object();
        $result3 = $result2->foto_gr;
        $db->query("DELETE FROM db_guru WHERE id_gr='$id'") or die ($db->error);
        unlink("../../assets/img/foto/tmp-guru/" . $result3); 
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