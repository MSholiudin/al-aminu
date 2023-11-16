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
        <a href="jadwal.php" class="icon-a"><i class="fa fa-user icons"></i> Jadwal</a>
        <a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
        <a href="pemesanan.php" class="icon-a"><i class="fa fa-list icons"></i> Pemesanan</a>
        <a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>
    </div>

    <div id="main">
        <div class="head" style="background-color: white; height: 30px; bottom: 35px; position: relative;">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: black; position: relative; bottom: 7px;" class="nav">Dashboard</span>
                <span style="font-size:30px;cursor:pointer; color: black; position: relative; bottom: 7px;" class="nav2">☰ Dashboard</span>
            </div>
            <?php
            // Mengimpor file koneksi.php
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
        <div class="clearfix"></div>
        <br/>
        <div class="gambar">
            <div class="box3" style="height: 250px; position: relative; right: 160px; width: 290px; bottom: 20px;">
                <img src="images/2466249.jpg" style="height: 250px; position: relative; left: 20px;"/>
            </div>
        </div>
        <div class="gambar1" style="outline: #DAF5FF; position: relative; bottom: 35px;">
            <div class="box3" style="height: 250px; width: 450px; outline: DAF5FF;">
                <b style="left: 20px; font-size: 10mm; position: relative; top: 25px;">Hi, Username</b>
                <p style="position: relative; top: 20px; left: 20px;">Selamat datang di manajemen aplikasi bimbel Al - Amin, selamat memakai fitur yang telah kami sediakan</p>
                <button class="rounded-button" style="width: 200px; height: 45px; position: relative; left: 125px; top: 25%; outline: white; background-color: 00A9FF;">Lihat Pesanan</button>
            </div>
        </div>

        <div class="col-div-3 "style="left: 7%; position: relative; bottom: 25px">
            <div class="box">
                <p style="color: aqua;">67<br/><span>Murid</span></p>
                <i class="fa fa-users box-icon"></i>
            </div>
        </div>
        <div class="col-div-3" style="position: relative; bottom: 24px">
            <div class="box">
                <p style="color: aqua;">88<br/><span>Riwayat</span></p>
                <i class="fa fa-list box-icon"></i>
            </div>
        </div>
        <div class="col-div-3"style="left: 7%; position: relative; bottom: 25px">
            <div class="box">
                <p style="color: aqua;">99<br/><span>Pesan</span></p>
                <i class="fa fa-shopping-bag box-icon"></i>
            </div>
        </div>
        <div class="col-div-3">
            <div class="box" style="position: relative; bottom: 25px">
                <p style="color: aqua;">78<br/><span>Tasks</span></p>
                <i class="fa fa-tasks box-icon"></i>
            </div>
        </div>
        <div class="gambar" style="margin-bottom: 80px;">
            <div id="popup" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopup()">&times;</span>
                    <p>Ini adalah konten popup.</p>
                </div>
            </div>
        </div>
        <br/><br/>

        <div class="col-div-8" style="position: relative; bottom: 40px;">
    <div class="box-8">
        <div class="content-box">
            <p>Pemesanan <span>Lihat Semua</span></p>
            <br/>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>NO Wa</th>
                    <th>Cicilan</th>
                    <th>Status</th>
                </tr>
                <?php
                // Mengambil data dari database
                $sql = "SELECT data_pengguna.nama, data_pengguna.no_wa, pembayaran.status
                        FROM data_pengguna
                        JOIN pembayaran ON data_pengguna.id_pembayaran = pembayaran.id_pembayaran";
                $result = $conn->query($sql);

                // Menampilkan data dari database
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["no_wa"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
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


        <?php
        // Menutup koneksi
        $conn->close();
        ?>

        <div class="col-div-4">
            <div class="box-4" style="position: relative; bottom: 40px; height: 120px;">
                <div class="content-box">
                    <p>Hari ini</p>
                    <div style="text-align: left;" id="tanggal">Tanggal: </div>
                    <div id="jam">Jam: </div>
                </div>
            </div>
        </div>
        <div class="col-div-4">
            <div class="box-4" style="position: relative; bottom: 20px; width: 30px; height: px;">
                <div class="content-box " style="background-color:;">
                    <img src="images/images.jpeg " style="height: 150px; position:relative; bottom: 20px; width: 280px; left: 40px;">
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(".nav").click(function(){
                $("#mySidenav").css('width','70px');
                $("#main").css('margin-left','70px');
                $(".logo").css('visibility', 'hidden');
                $(".logo span").css('visibility', 'visible');
                $(".logo span").css('margin-left', '-10px');
                $(".icon-a").css('visibility', 'hidden');
                $(".icons").css('visibility', 'visible');
                $(".icons").css('margin-left', '-8px');
                $(".nav").css('display','none');
                $(".nav2").css('display','block');
            });

            $(".nav2").click(function(){
                $("#mySidenav").css('width','300px');
                $("#main").css('margin-left','300px');
                $(".logo").css('visibility', 'visible');
                $(".icon-a").css('visibility', 'visible');
                $(".icons").css('visibility', 'visible');
                $(".nav").css('display','block');
                $(".nav2").css('display','none');
            });
        </script>

        <!-- Kode untuk menampilkan tanggal dan jam -->
        <script>
            function updateDateTime() {
                var today = new Date();
                var options = { year: 'numeric', month: 'long', day: 'numeric' };
                var formattedDate = today.toLocaleDateString(undefined, options);
                document.getElementById('tanggal').textContent = "Tanggal: " + formattedDate;

                var time = today.toLocaleTimeString();
                document.getElementById('jam').textContent = "Jam: " + time;
            }

            // Memanggil updateDateTime() setiap detik (1000 milidetik)
            setInterval(updateDateTime, 1000);

            // Memanggil updateDateTime() saat halaman dimuat
            window.onload = updateDateTime;
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