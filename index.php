<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak, redirect ke halaman login
    header('Location: login-admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <a href="#" class="icon-a"><i class="fa fa-user icons"></i> Accounts</a>

    <script>
        // Fungsi untuk menampilkan data pada baris tabel
        function viewRow(button) {
            document.getElementById("popup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>

    <div id="mySidenav" class="sidenav">
        <p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
        <a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
        <a href="jadwal.php" class="icon-a"><i class="fa fa-calendar icons"></i> Jadwal</a>
        <a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
        <a href="pemesanan.php" class="icon-a"><i class="fa fa-shopping-cart"></i> Pemesanan</a>
        <a href="cicilan.php" class="icon-a"><i class="fa fa-credit-card"></i> Cicilan</a>
        <a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>
    </div>

    <div id="main">
        <div class="head" style="background-color: white; height: 30px; bottom: 35px; position: relative;">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: black; position: relative; bottom: 7px;" class="nav">Dashboard</span>
                <span style="font-size:30px;cursor:pointer; color: black; position: relative; bottom: 7px;" class="nav2">☰ Dashboard</span>
            </div>
            <?php
            require_once('php/koneksi.php');

            // Cek apakah pengguna sudah login
            if (isset($_SESSION['username'])) {
                // Jika sudah login, ambil informasi pengguna dari database berdasarkan username
                $username = $_SESSION['username'];
                $query = "SELECT * FROM data_pengguna WHERE username = '$username'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $nama_pengguna = $user['nama'];
                }
            } else {
                // Jika pengguna belum login, beri nilai default untuk $nama_pengguna
                $nama_pengguna = "Username";
            }
            ?>

            <div class="col-div-6">
                <div class="profile" style="position: relative; bottom: 7px;">
                    <img src="images/user.png" class="pro-img" />
                    <?php
                    // Tampilkan nama pengguna jika sudah login
                    if (isset($nama_pengguna)) {
                        echo "<p style='color: #748DA6;'>$nama_pengguna <span>Admin</span></p>";
                    }
                    ?>
                    <i class="fa fa-regular fa-bell" style="position: relative; right: 30%; bottom: 43px;"></i>
                    <button id="logoutButton" class="icon-a"><i class="fa fa-users icons"></i> Logout</button>
                </div>
            </div>
        </div>
        <style>
            .changing-text {
                left: 20px;
                font-size: 10mm;
                position: relative;
                top: 25px;
            }
        </style>
        <div class="clearfix"></div>
        <br />
        <div class="gambar">
            <div class="box3" style="position: relative; ">
                <img src="images/2466249.jpg" style="height: 250px; position: relative; right: 180px; width: 250px; bottom: 40px;" />
            </div>
        </div>
        <div class="gambar1" style="outline: #DAF5FF; position: relative; bottom: 35px;">
            <div class="box3" style="height: 250px; width: 450px; outline: DAF5FF;">
                <b class="changing-text">Hello, <?php echo $nama_pengguna; ?>!</b>

                <script>
                    // Array of sentences to be displayed
                    const sentences = [
                        "Selamat datang!",
                        "Bagaimana kabarmu?",
                        "Hello, <?php echo $nama_pengguna; ?>!"
                    ];
                    const changingTextElements = document.querySelectorAll('.changing-text');

                    // Function to change the text for each element
                    function changeText(element) {
                        const randomIndex = Math.floor(Math.random() * sentences.length);
                        element.textContent = sentences[randomIndex];
                    }

                    // Change the text for each element every 3 seconds (3000 milliseconds)
                    changingTextElements.forEach(element => {
                        setInterval(() => changeText(element), 3000);
                    });
                </script>
                <p style="position: relative; top: 20px; left: 20px;">Selamat datang di manajemen aplikasi bimbel Al - Amin, selamat memakai fitur yang telah kami sediakan</p>
                <a class="search-button button-style" href="jadwal.php" style="width: 200px; height: 45px; position: relative; left: 125px; top: 25%; outline: white; background-color: #00A9FF; border-radius: 25px; text-align: center; line-height: 45px; display: inline-block; font-size: 5mm;">Lihat Jadwal</a>
            </div>
        </div>

        <div class="col-div-3 " style="left: 7%; position: relative; bottom: 25px">
            <?php
            include 'php/koneksi.php';

            $sql = "SELECT COUNT(*) as total_murid FROM data_pengguna";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="box">';
                echo '<p style="color: aqua;">' . $row['total_murid'] . '<br /><span>Murid</span></p>';
                echo '<i class="fa fa-users box-icon"></i>';
                echo '</div>';
            } else {
                echo "Tidak ada data murid.";
            }
            ?>

        </div>
        <div class="col-div-3" style="position: relative; bottom: 24px">
            <?php
            include 'php/koneksi.php';

            $sql = "SELECT COUNT(*) as total_riwayat_cicilan FROM cicilan";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="box">';
                echo '<p style="color: aqua;">' . $row['total_riwayat_cicilan'] . '<br /><span>Riwayat</span></p>';
                echo '<i class="fa fa-list box-icon"></i>';
                echo '</div>';
            } else {
                echo "Tidak ada data murid.";
            }
            ?>
        </div>
        <div class="col-div-3" style="left: 7%; position: relative; bottom: 25px">
            <div class="box">
                <p style="color: aqua;">99<br /><span>Pesan</span></p>
                <i class="fa fa-shopping-bag box-icon"></i>
            </div>
        </div>
        <div class="col-div-3" style="position: relative; bottom: 24px">
            <?php
            include 'php/koneksi.php';

            $sql = "SELECT COUNT(*) as total_jadwal FROM jadwal";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="box">';
                echo '<p style="color: aqua;">' . $row['total_jadwal'] . '<br /><span>Jadwal</span></p>';
                echo '<i class="fa fa-task box-icon"></i>';
                echo '</div>';
            } else {
                echo "Tidak ada data murid.";
            }
            ?>
        </div>
        <div class="gambar" style="margin-bottom: 80px;">
            <div id="popup" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopup()">&times;</span>
                    <p>Ini adalah konten popup.</p>
                </div>
            </div>
        </div>
        <br /><br />

        <div class="col-div-8" style="position: relative; bottom: 40px;">
            <div class="box-8">
                <div class="content-box">
                    <p>Pemesanan <a class="button-style" href="pemesanan.php" style="width: 150px; height: 20px; outline: white; background-color: #00A9FF; border-radius: 10px; text-align: center; line-height: 16px; padding: 10px; display: inline-block; font-size: 15px; position: relative; top: 25%; left: 65%; color: #fff;">Lihat Pemesanan</a></p>

                    <br />
                    <table>
                        <tr>
                            <th>Nama</th>
                            <th>NO Wa</th>
                            <th>Tanggungan</th>
                        </tr>
                        <?php
                        // Mengambil data dari database
                        $sql = "SELECT dp.nama, dp.no_wa, p.status
                        FROM data_pengguna dp
                        JOIN pembayaran p ON dp.id_pengguna = p.id_pengguna";
                        $result = $conn->query($sql);

                        // Menampilkan data dari database
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["nama"] . "</td>";
                                echo "<td>" . $row["no_wa"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-div-4">
            <div class="box-4" style="position: relative; bottom: 50px; height: 110px;">
                <div class="content-box">
                    <div style="text-align: left;" id="tanggal">Tanggal: </div>
                    <div id="jam">Jam: </div>
                </div>
                <style>
                    .button-style {
                        /* Gaya tombol Anda di sini */
                        padding: 10px 15px;
                        background-color: #3498db;
                        color: #fff;
                        text-decoration: none;
                        border-radius: 5px;
                        display: inline-block;
                    }
                </style>
                <?php
                require_once('php/koneksi.php');
                $query = "SELECT
                data_pengguna.username,
                data_pengguna.email,
                paket_program.nama_program
                FROM 
                data_pengguna
                JOIN 
                paket_program ON data_pengguna.id_program = paket_program.id_program
                ORDER BY data_pengguna.id_pengguna DESC
                LIMIT 3";

                $result = $conn->query($query);
                ?>

                <div class="table-container" style="position: relative; top: 25px;">
                    <div class="table-content">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Nama Program</th>
                                    <th></th> <a href="murid.php" class="search-button button-style" style="position: relative; left: 10px; background-color: #00A9FF;">Lihat Murid</a>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["username"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["nama_program"] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(".nav").click(function() {
                $("#mySidenav").css('width', '70px');
                $("#main").css('margin-left', '70px');
                $(".logo").css('visibility', 'hidden');
                $(".logo span").css('visibility', 'visible');
                $(".logo span").css('margin-left', '-10px');
                $(".icon-a").css('visibility', 'hidden');
                $(".icons").css('visibility', 'visible');
                $(".icons").css('margin-left', '-8px');
                $(".nav").css('display', 'none');
                $(".nav2").css('display', 'block');
            });

            $(".nav2").click(function() {
                $("#mySidenav").css('width', '300px');
                $("#main").css('margin-left', '300px');
                $(".logo").css('visibility', 'visible');
                $(".icon-a").css('visibility', 'visible');
                $(".icons").css('visibility', 'visible');
                $(".nav").css('display', 'block');
                $(".nav2").css('display', 'none');
            });
        </script>

        <!-- Kode untuk menampilkan tanggal dan jam -->
        <script>
            // Fungsi untuk mendapatkan dan memformat tanggal
            function updateTanggal() {
                var today = new Date();
                var options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                var formattedDate = today.toLocaleDateString(undefined, options);
                document.getElementById('tanggal').textContent = 'Tanggal: ' + formattedDate;
            }

            // Fungsi untuk mendapatkan dan memformat jam
            function updateJam() {
                var today = new Date();
                var formattedTime = today.getHours() + ':' + (today.getMinutes() < 10 ? '0' : '') + today.getMinutes() + ':' + (today.getSeconds() < 10 ? '0' : '') + today.getSeconds();
                document.getElementById('jam').textContent = 'Jam: ' + formattedTime;
            }

            // Panggil fungsi updateTanggal dan updateJam saat halaman dimuat
            window.onload = function() {
                updateTanggal();
                updateJam();

                // Perbarui waktu setiap detik
                setInterval(function() {
                    updateJam();
                }, 1000);
            };
        </script>
        <!-- Kode untuk logout -->
        <script>
            document.getElementById("logoutButton").addEventListener("click", function() {
                if (confirm("Apakah Anda yakin ingin keluar?")) {
                    // Redirect ke halaman logout.php setelah konfirmasi OK
                    window.location.href = "logout.php";
                }
            });
        </script>
</body>

</html>