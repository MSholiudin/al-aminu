<?php
session_start();
require_once 'php/koneksi.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["password"];

    // Lakukan query untuk mendapatkan user berdasarkan username
    $sql = "SELECT * FROM data_pengguna WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row["password"]) {
            // Tambahkan kondisi untuk memeriksa status admin
            if ($row["status"] == "admin") {
                $_SESSION["username"] = $username;
                $message = "Login berhasil!";
                ?>
                <script>
                    alert("<?php echo $message; ?>");
                    window.location.href = "index.html"; // Redirect ke halaman index.html
                </script>
                <?php
            } else {
                $message = "Anda bukan admin. Hanya admin yang diizinkan login.";
                ?>
                <script>
                    alert("<?php echo $message; ?>");
                </script>
                <?php
            }
        } else {
            $message = "Password salah";
            ?>
            <script>
                alert("<?php echo $message; ?>");
            </script>
            <?php
        }
    } else {
        $message = "Username tidak ditemukan";
        ?>
        <script>
            alert("<?php echo $message; ?>");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="basic">
        <form action="" method="post">
            <h2>LOGIN</h2>
            <div class="value">
                <div class="inputan">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Masukkan Username" name="uname" required>
                </div>
                <div class="inputan">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Masukkan Password" name="password" required>
                </div>
            </div>
            <div class="button">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
