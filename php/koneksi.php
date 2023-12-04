<?php
$servername = "localhost";
$username = "tifcmyho_les-alamin";
$password = "@JTIpolije2023";
$dbname = "tifcmyho_les-alamin";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>