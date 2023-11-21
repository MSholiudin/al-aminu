<?php
    // Mengimpor file koneksi.php
    require_once('php/koneksi.php');

    // Pastikan data yang diterima dari query string
    if (isset($_GET['id_pengguna'])) {
        $idPengguna = $_GET['id_pengguna'];

        // Query untuk menghapus data
        $deleteQuery = "DELETE FROM data_pengguna WHERE id_pengguna = $idPengguna";

        // Eksekusi query
        if ($conn->query($deleteQuery) === TRUE) {
            // Redirect atau tampilkan pesan sukses
            header("Location: murid.php"); // Ganti dengan halaman yang sesuai
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Tutup koneksi
    $conn->close();
?>
