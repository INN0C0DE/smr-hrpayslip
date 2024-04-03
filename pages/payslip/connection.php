

<?php
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
