<?php
require_once('php/koneksi.php');

// Dapatkan data dari formulir
$id_pembayaran = $_POST['id_pembayaran'];
$id_pengguna = $_POST['id_pengguna'];
$bulan = $_POST['bulan'];
$jumlah_bayar = $_POST['jumlah_bayar'];

// Validasi dan bersihkan input jika diperlukan

// Buat kueri SQL untuk penyisipan
$sql = "INSERT INTO `cicilan` (`id_pengguna`, `id_pembayaran`, `bulan`, `tanggal_nyicil`, `nyicil`, `status`) VALUES ('$id_pengguna', '$id_pembayaran', '$bulan', current_timestamp(), '$jumlah_bayar', 'done')";

// Jalankan kueri
if (mysqli_query($conn, $sql)) {
	header("Location: ccl.php");
	exit();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
