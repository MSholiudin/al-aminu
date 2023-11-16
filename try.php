<?php
// Mengimpor file koneksi.php
require_once('php/koneksi.php');

// Inisialisasi sesi (pastikan sesi dimulai sebelum menggunakan session)
session_start();

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

<?php
// Menutup koneksi
$conn->close();
?>
