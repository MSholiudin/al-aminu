<?php
session_start();
require_once 'php/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["password"];

    // Lakukan query untuk mendapatkan user berdasarkan username
    $sql = "SELECT * FROM data_pengguna WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verifikasi password tanpa hashing
    if ($password === $row["password"]) {
        $_SESSION["username"] = $username;
        header("Location: index.html"); // Ganti dengan halaman setelah login
        exit();
    } else {
        $error_message = "Password salah";
    }
} else {
    $error_message = "Username tidak ditemukan";
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
            <?php
            if (isset($error_message)) {
                echo '<p style="color: red;">' . $error_message . '</p>';
            }
            ?>
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
