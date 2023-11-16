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
                    window.location.href = "index.php";
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
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
</head>
<body>
<style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url(img/Desktop\ -\ 8.png);
            margin: 0;
        }

        .login-container {
            display: flex;
            align-items: center;
            width: 650px;
        }

        .login-form {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            text-align: center;
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
        }

        .login-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-image {
            width: 320px;
            height: 420px;
            border-radius: 8px;
            overflow: hidden;
        }

        .login-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        body, html {
    height: 100%;
    margin: 0;
    overflow: hidden;
}

.sky {
    background-color: #87CEEB; /* Sky Blue */
    height: 100%;
    animation: skyAnimation 20s linear 1;
}

.bird-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.bird {
    width: 50px;
    height: 30px;
    background-color: #FFD700; /* Gold */
    clip-path: polygon(0 0, 100% 50%, 0 100%);
    animation: birdAnimation 30s linear infinite;
}

@keyframes skyAnimation {
    0% {
        background-position: 0 0;
    }
    100% {
        background-position: 100% 0;
    }
}

@keyframes birdAnimation {
    0% {
        transform: translateX(-1800%);
    }
    100% {
        transform: translateX(50vw);
        display: none;
    }
}
.password-input {
            position: relative;
        }

        #togglePassword {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        #togglePassword.closed {
            transform: translateY(-50%);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-form">
    <div class="sky">
        <div class="bird-container">
            <div class="bird"></div>
        </div>
    </div>
        <form action="" method="post">
            <h2 style="color: #444E96;">LOGIN</h2>
            <div class="value">
                <div class="inputan">
                    <label style="text-align: left;" for="username">Username</label>
                    <input type="text" placeholder="Masukkan Username" name="uname" required>
                </div>
                <div class="inputan">
    <label style="text-align: left;" for="password">Password</label>
    <div class="password-input">
        <input type="password" id="passwordInput" placeholder="Masukkan Password" name="password" required>
        <i data-feather="eye" id="togglePassword"></i>
    </div>
</div>
            </div>
            <div class="button">
                <button type="submit">Login</button>
            </div>
            <div class="button">
                <button>Kembali</button>
            </div>
        </form>
    </div>

    <div class="login-image">
        <!-- Tempatkan gambar Anda di sini -->
        <img src="img/OIG (2).jpeg" alt="Gambar">
    </div>
</div>
    
        </form>
    </div>
</body>
</html>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('passwordInput');

            feather.replace(); // Activating Feather Icons

            passwordInput.addEventListener('input', function () {
                feather.replace(); // Replacing icons when the input changes
            });
        });
    </script>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('passwordInput');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.classList.toggle('closed');

                // Remove existing icon
                while (togglePassword.firstChild) {
                    togglePassword.removeChild(togglePassword.firstChild);
                }

                // Create a new icon
                const newIcon = document.createElement('span');
                newIcon.setAttribute('data-feather', togglePassword.classList.contains('closed') ? 'eye-off' : 'eye');
                togglePassword.appendChild(newIcon);

                feather.replace(); // Replacing icons when the input changes
            });

            feather.replace(); // Activating Feather Icons after initial load
        });
    </script>