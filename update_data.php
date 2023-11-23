<?php
    // Mengimpor file koneksi.php
    require_once('php/koneksi.php');

    // Pastikan data yang diterima dari formulir edit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idPengguna = $_POST["id_pengguna"];
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $noWa = $_POST["no_wa"];
        $namaProgram = $_POST["nama_program"];

        // Query untuk melakukan update data
        $updateQuery = "UPDATE data_pengguna
                        SET 
                            nama = '$nama',
                            email = '$email',
                            username = '$username',
                            password = '$password',
                            no_wa = '$noWa'
                        WHERE
                            id_pengguna = $idPengguna";

        // Eksekusi query
        if ($conn->query($updateQuery) === TRUE) {
            // Redirect atau tampilkan pesan sukses
            header("Location: murid.php"); // Ganti dengan halaman yang sesuai
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Tutup koneksi
    $conn->close();
?>
