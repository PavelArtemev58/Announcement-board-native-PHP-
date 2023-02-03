<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'announcement_board';

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>