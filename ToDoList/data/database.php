<?php
//Connect to MySQL
$link = 'localhost';
$adm = 'root';
$pasw = '';
$data = 'todo';
$con = mysqli_connect($link, $adm, $pasw, $data);

if (!$con) {
	echo 'Failed to connect: ' . mysqli_connect_error();
}