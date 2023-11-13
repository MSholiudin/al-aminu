<?php
include "php/koneksi.php";

$message = ""; // Pesan untuk notifikasi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uname"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
    $status = "siswa";

    $sql = "INSERT INTO data_pengguna (nama, email, username, password, no_wa, jenis_kelamin, status) VALUES ('$name', '$email', '$username', '$password', '$phone', '$gender', '$status')";

    if ($conn->query($sql) === TRUE) {
        $message = "Pendaftaran berhasil!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekarang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form id="registrationForm" action="" method="post">
            <h2>DAFTAR</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan Nama Lengkap" name="name" required>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Masukkan Email" name="email" required>
                </div>
                <div class="input-box">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Masukkan Username" name="uname" required>
                </div>
                <div class="input-box">
                    <label for="phone">Nomor WA</label>
                    <input type="tel" placeholder="Masukkan Nomor Telepon" name="phone" required>
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Masukkan Password baru" name="password" required>
                </div>
                <div class="input-box">
                    <label for="confirm-password">Konfirmasi Password</label>
                    <input type="password" placeholder="Konfirmasi password" name="confirmPassword" required>
                </div>
                <span class="gender-title">Gender</span>
                <div class="gender-category">
                    <input type="radio" name="gender" id="male" value="laki-laki">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="perempuan">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="alert">
                <p>Dengan mengeklik Daftar, Anda menyetujui <a href="#">Ketentuan,</a> <a href="#">Kebijakan Privasi</a> dan <a href="#">Kebijakan cookie</a> kami. Anda mungkin menerima pemberitahuan SMS dari kami dan dapat memilih untuk tidak ikut serta kapan saja.</p>
            </div>
            <div class="button-container">
                <button type="submit">Daftar</button>
            </div>

            <!-- Notifikasi Pop-up -->
            <?php if ($message): ?>
                <script>
                    // Tampilkan pop-up window setelah pendaftaran berhasil
                    window.onload = function() {
                        alert("<?php echo $message; ?>");
                        window.location.href = "beranda.html"; // Ganti dengan halaman beranda yang sesuai
                    };
                </script>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>