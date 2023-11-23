<?php
include "php/koneksi.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uname"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
    $status = "siswa";

    // Mendapatkan id_pembayaran dan id_program terakhir
    $queryLastPayment = "SELECT id_pembayaran, id_program FROM pembayaran ORDER BY id_pembayaran DESC LIMIT 1";
    $resultLastPayment = $conn->query($queryLastPayment);

    if ($resultLastPayment->num_rows > 0) {
        $lastPayment = $resultLastPayment->fetch_assoc();
        $id_pembayaran = $lastPayment['id_pembayaran'];
        $id_program = $lastPayment['id_program'];
    } else {
        // Jika tidak ada pembayaran sebelumnya, Anda mungkin ingin menangani ini sesuai kebutuhan aplikasi Anda
        $id_pembayaran = "P001";
        $id_program = "PR001"; // Isi dengan nilai default untuk id_program jika tidak ada sebelumnya
    }

    $sql = "INSERT INTO data_pengguna (nama, email, username, password, no_wa, jenis_kelamin, status, id_program, id_pembayaran) VALUES 
            ('$name', '$email', '$username', '$password', '$phone', '$gender', '$status', '$id_program', '$id_pembayaran')";

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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #DEEBFB;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #333;
        }

        .content {
            margin-top: 20px;
        }

        .input-box {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .gender-title {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #666;
        }

        .gender-category {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .gender-category input {
            margin-right: 5px;
        }

        .alert {
            margin-top: 15px;
            color: #666;
        }

        .alert a {
            color: #007bff;
            text-decoration: none;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 40px;
        }

        .back-button:hover {
            background-color: #999;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 0px;
            /* Add margin-right to create space between buttons */
        }
    </style>
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
                <span class="gender-title">Gender</span>
                <div class="gender-category">
                    <input type="radio" name="gender" id="male" value="laki-laki">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="perempuan">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="alert">
                <p style="color: black;">Dengan mengeklik Daftar, Anda menyetujui <a href="#">Ketentuan,</a> <a href="#">Kebijakan Privasi</a> dan <a href="#">Kebijakan cookie</a> kami. Anda mungkin menerima pemberitahuan SMS dari kami dan dapat memilih untuk tidak ikut serta kapan saja.</p>
            </div>
            <div class="button-container">
                <button type="submit">Daftar</button>
                <button type="button" class="back-button" onclick="goBack()">Kembali</button>
            </div>

            <!-- Notifikasi Pop-up -->
            <?php if ($message) : ?>
                <script>
                    // Tampilkan pop-up window setelah pendaftaran berhasil
                    window.onload = function() {
                        alert("<?php echo $message; ?>");
                        window.location.href = "beranda.php"; // Ganti dengan halaman beranda yang sesuai
                    };
                </script>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>