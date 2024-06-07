<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'spfc_jantung';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
