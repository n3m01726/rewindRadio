<?php
use RewindRadio\Database;

$db = new Database;
$db_conx_rdj = $db->connect();
$username = $_POST['username'];
$password = $_POST['password'];
login::login($username,$password,$db_conx_rdj);
?>