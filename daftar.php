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
    $id_program = isset($_POST["programPackage"]) ? $_POST["programPackage"] : "";

    $sql = "INSERT INTO data_pengguna (nama, email, username, password, no_wa, jenis_kelamin, status, id_program) VALUES 
    ('$name', '$email', '$username', '$password', '$phone', '$gender', '$status', '$id_program' )";

    if ($conn->query($sql) === TRUE) {
        $message = "Pendaftaran berhasil!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$queryPrograms = "SELECT id_program, nama_program FROM paket_program";
$resultPrograms = $conn->query($queryPrograms);
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            background-image: url('img/daftar.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            height: 80%;
            width: 30%;
            /* Ubah nilai width sesuai keinginan Anda */
            text-align: center;
            margin: auto;
        }

        /* ... (other existing styles remain unchanged) ... */

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #333;
            font-size: 10mm;
        }

        .content {
            margin-top: 20px;
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box label {
            color: #555;
            /* Ganti dengan warna yang diinginkan */
            font-size: 6mm;
            text-align: center;
            margin-bottom: 5px;
            /* Tambahkan margin-bottom sesuai kebutuhan */
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 6mm;
            text-align: center;

        }

        .input-box input,
        .input-box select {
            height: 50px;
            /* Sesuaikan dengan lebar yang diinginkan, bisa dalam persen atau piksel */
            padding: 10px;
            /* Sesuaikan dengan padding yang diinginkan */
            font-size: 16px;
            /* Sesuaikan dengan ukuran font yang diinginkan */
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
            font-size: 6mm;
            text-align: center;
            /* Menengahkan teks */
        }

        .gender-category {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .gender-category input {
            margin-right: 5px;
            /* Sesuaikan margin atau gaya lain sesuai kebutuhan */
        }

        .gender-category label {
            font-size: 6mm;
            /* Sesuaikan ukuran font sesuai kebutuhan */
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

        .button-container button,
        .back-button {
            padding: 20px 85px;
            background-color: #ccc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 6mm;
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
                <div class="input-box">
                    <label for="programPackage">Pilih Program:</label>
                    <select name="programPackage">
                        <?php
                        // Tampilkan pilihan program dari database
                        while ($row = $resultPrograms->fetch_assoc()) {
                            echo "<option value=\"" . $row["id_program"] . "\">" . $row["nama_program"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <span class="gender-title">Jenis Kelamin</span>
                <div class="gender-category">
                    <input type="radio" name="gender" id="male" value="laki-laki">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="perempuan">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="alert">
                <p style="color: black; font-size: 5mm;">Dengan mengeklik Daftar, Anda menyetujui <a href="#">Ketentuan,</a> <a href="#">Kebijakan Privasi</a> dan <a href="#">Kebijakan cookie</a> kami. Anda mungkin menerima pemberitahuan SMS dari kami dan dapat memilih untuk tidak ikut serta kapan saja.</p>
            </div>
            <div class="button-container">
                <button style="position: relative; right: 50px;" type="button" class="back-button" onclick="goBack()">Kembali</button>
                <button type="submit">Daftar</button>
            </div>

            <!-- Notifikasi Pop-up -->
            <?php if ($message) : ?>
                <script>
                    // Tampilkan pop-up window setelah pendaftaran berhasil
                    window.onload = function() {
                        alert("<?php echo $message; ?>");
                        window.location.href = "pembayaran.php"; // Ganti dengan halaman beranda yang sesuai
                    };
                </script>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>