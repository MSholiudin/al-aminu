<?php
include('php/koneksi.php');

if (isset($_GET['tanggal_nyicil'])) {
    $tanggal_nyicil = $_GET['tanggal_nyicil'];

    // Eksekusi query untuk mengonfirmasi cicilan
    $query = "UPDATE cicilan SET konfirmasi_admin = TRUE 
    WHERE tanggal_nyicil = '$tanggal_nyicil'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Cicilan berhasil dikonfirmasi.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Parameter tanggal_nyicil tidak ditemukan.";
}

mysqli_close($conn);
?>
