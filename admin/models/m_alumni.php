<?php
class Alumni {
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_alumni";
        if($id != null) {
            $sql .= " WHERE id_al = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($nm_al, $desk_al, $foto_al){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO db_alumni VALUES('','$nm_al','$desk_al','$foto_al')")or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $result = $db->query("SELECT * FROM db_alumni WHERE id_al='$id'");
        $result2 = $result->fetch_object();
        $result3 = $result2->foto_al;
        $db->query("DELETE FROM db_alumni WHERE id_al='$id'") or die ($db->error);
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