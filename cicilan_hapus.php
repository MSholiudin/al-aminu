<?php
include('php/koneksi.php');

if (isset($_GET['tanggal_nyicil'])) {
    $tanggal_nyicil = $_GET['tanggal_nyicil'];

    // Eksekusi query untuk menghapus cicilan
    $query = "DELETE FROM cicilan WHERE tanggal_nyicil = '$tanggal_nyicil'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Cicilan berhasil dihapus.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Parameter tanggal_nyicil tidak ditemukan.";
}

mysqli_close($conn);
?>
