<?php

$connect = new PDO("mysql:host=3.3.2.121;dbname=smr_payslip;charset=utf8", "root", "");

$hostname = '3.3.2.121';
$username = 'root';
$password = '';
$database = 'smr_payslip';

// Establishing Connection with Server
$con = mysqli_connect($hostname, $username, $password, $database);

// Checking Connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
?>
