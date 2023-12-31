<?php
// Memasukkan file koneksi.php
include 'php/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $idProgram = $_POST['program'];
    $harga = $_POST['harga'];
    $bayar = $_POST['bayar'];

    // Menghitung status pembayaran
    $status = $harga-$bayar;

    // Mendapatkan id_pengguna terakhir
    $queryLastPayment = "SELECT id_pengguna FROM data_pengguna ORDER BY id_pengguna DESC LIMIT 1";
    $resultLastPayment = $conn->query($queryLastPayment);

    if ($resultLastPayment->num_rows > 0) {
        $lastId = $resultLastPayment->fetch_assoc();
        $id_pengguna = $lastId['id_pengguna'];
    } else {
        $id_pengguna = "1"; // Isi dengan nilai default untuk id_pengguna jika tidak ada sebelumnya
    }

    // Menyimpan data pembayaran ke database
    $queryInsert = "INSERT INTO pembayaran (id_pembayaran, bayar, status, id_program, tgl_pembayaran, id_pengguna) VALUES (NULL, '$bayar', '$status', '$idProgram', current_timestamp(), '$id_pengguna')";

    if ($conn->query($queryInsert) === TRUE) {
        // Pembayaran berhasil ditambahkan
        echo "Pembayaran berhasil ditambahkan.";

        // Menutup koneksi database
        $conn->close();
    } else {
        // Gagal menambahkan pembayaran
        echo "Error: " . $queryInsert . "<br>" . $conn->error;

        // Menutup koneksi database
        $conn->close();
        exit(); // Hentikan eksekusi skrip
    }
} else {
    // Jika bukan metode POST, kembalikan ke halaman sebelumnya
    header("Location: pembayaran.php"); // Sesuaikan dengan nama halaman utama Anda
    exit(); // Hentikan eksekusi skrip
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pembayaran</title>
    <script>
        // Menampilkan notifikasi setelah pembayaran berhasil
        alert("Pembayaran berhasil ditambahkan.");

        // Mengarahkan pengguna ke daftar.php setelah notifikasi ditutup
        window.location.href = "beranda.php";
    </script>
</head>

<body>
    <!-- Tidak perlu konten HTML di dalam halaman ini karena pengguna akan diarahkan secara otomatis -->
</body>

</html>