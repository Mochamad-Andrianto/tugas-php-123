<?php 
    class Login
    {
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function LoginUser($email, $password)
        {
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM tb_user WHERE email='$email' And password='$password'";     
            $query = $db->query($sql) or die ($db->error);      
           
            return $query;
           
        }

        public function get_sesi()
        {
            return $_SESSION['loginadmin'];
        }
    }
    

?>