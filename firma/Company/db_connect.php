<?php

$host = 'localhost';
$db = 'company_db';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Anslutningsfel: ' . $mysqli->connect_error);
}
?>


