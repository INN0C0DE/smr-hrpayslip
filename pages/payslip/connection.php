<?php
$connect = new PDO("mysql:host=3.3.2.121;dbname=smr_payslip;charset=utf8", "root", "");

$hostname = '3.3.2.121';
$username = 'root';
$password = '';
$database = 'smr_payslip';

$con = mysqli_connect($hostname, $username, $password, $database);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
?>