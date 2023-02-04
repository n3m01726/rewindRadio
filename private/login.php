<?php
use RewindRadio\Database;
include 'src/classes/login.class.php';
$db = new Database();
$db_conx_rdj = $db->connect();
$username = $_POST['username'];
$password = $_POST['password'];
login($username,$password,$db_conx_rdj);
?>