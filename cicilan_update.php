<?php
require_once('php/koneksi.php');

// Dapatkan data dari formulir
$id_pembayaran = $_POST['id_pembayaran'];
$id_pengguna = $_POST['id_pengguna'];
$bulan = $_POST['bulan'];
$jumlah_bayar = $_POST['jumlah_bayar'];

// Buat kueri SQL untuk penyisipan
$sql = "INSERT INTO cicilan (id_pengguna, id_pembayaran, bulan, tanggal_nyicil, nyicil, konfirmasi_admin) VALUES ('$id_pengguna', '$id_pembayaran', '$bulan', current_timestamp(), '$jumlah_bayar', TRUE)";

// Jalankan kueri
if (mysqli_query($conn, $sql)) {
	header("Location: cicilan.php");
	exit();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
