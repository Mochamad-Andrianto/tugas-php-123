<?php
class Navbar {
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM db_nav";
        if($id != null) {
            $sql .= " WHERE id = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($title, $subtitle, $button, $img){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO db_nav VALUES('','$title','$subtitle','$button', '$img')") or die ($db->error);
    }
    public function hapus($id){
        $db = $this->mysqli->conn;
        $result = $db->query("SELECT * FROM db_nav WHERE id='$id'");
        $result2 = $result->fetch_object();
        $result3 = $result2->img;
        $db->query("DELETE FROM db_nav WHERE id='$id'") or die ($db->error);
        unlink("../../assets/img/foto/tmp-navbar/" . $result3); 
    }
    public function ubahdata($sql)
        {
            $db = $this->mysqli->conn;
            $db->query($sql) or die ($db->error);
        }

}
?>