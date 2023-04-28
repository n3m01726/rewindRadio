<?php

use App\Classes\Database;
use App\Classes\Login;

$db = new Database();
$db_conx_rdj = $db->connect();
$username = $_POST['username'];
$password = $_POST['password'];
Login::login($username, $password, $db_conx_rdj);
