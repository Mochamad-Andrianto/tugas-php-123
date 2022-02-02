<?php
require '../config/koneksi.php';
require '../models/database.php';

$connection = new database($host, $user, $pass, $database);

$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = md5(htmlspecialchars($_POST['password']));




?>