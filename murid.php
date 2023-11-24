<!Doctype HTML>
<html>

<head>
    <title>Murid</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <style>
        /* Popup container */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        /* Popup content */
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
        }

        /* Close button */
        .popup-content .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #333;
        }

        /* Form inside the popup */
        .popup-content form {
            display: grid;
            gap: 15px;
        }

        /* Submit button */
        .popup-content input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

    <div id="mySidenav" class="sidenav">
        <p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
        <a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
        <a href="jadwal.php" class="icon-a"><i class="fa fa-user icons"></i> Jadwal</a>
        <a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
        <a href="pemesanan.php" class="icon-a"><i class="fa fa-list icons"></i> Pemesanan</a>
        <a href="cicilan.php" class="icon-a"><i class="fa fa-list icons"></i> Cicilan</a>
        <a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>

        <script>
            function editRow(button) {
                // Dapatkan data baris yang sesuai dengan tombol Edit yang diklik
                var row = button.parentNode.parentNode;

                // Dapatkan data dari setiap sel pada baris tersebut
                var idPengguna = row.cells[0].innerHTML;
                var nama = row.cells[1].innerHTML;
                var email = row.cells[2].innerHTML;
                var username = row.cells[3].innerHTML;
                var password = row.cells[4].innerHTML;
                var noWa = row.cells[5].innerHTML;
                var namaProgram = row.cells[6].innerHTML;

                // Tampilkan formulir edit dalam popup dengan data yang sesuai
                var popupContent = document.getElementById('popup-content');
                popupContent.innerHTML = `
            <span class="close" onclick="closePopup()">&times;</span>
            <form action="update_data.php" method="post">
                <input type="hidden" name="id_pengguna" value="${idPengguna}">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" value="${nama}">
                <label for="email">Email:</label>
                <input type="text" name="email" value="${email}">
                <label for="username">Username:</label>
                <input type="text" name="username" value="${username}">
                <label for="password">Password:</label>
                <input type="text" name="password" value="${password}">
                <label for="no_wa">No. Wa:</label>
                <input type="text" name="no_wa" value="${noWa}">
                <label for="nama_program">Nama Program:</label>
                <input type="text" name="nama_program" value="${namaProgram}">
                <input type="submit" value="Simpan">
            </form>
        `;

                // Tampilkan popup
                var popup = document.getElementById('popup');
                popup.style.display = 'block';
            }

            function deleteRow(button) {
                // Dapatkan data baris yang sesuai dengan tombol Hapus yang diklik
                var row = button.parentNode.parentNode;

                // Dapatkan data dari kolom pertama (Id_Pengguna)
                var idPengguna = row.cells[0].innerHTML;

                // Konfirmasi sebelum menghapus
                var confirmDelete = confirm("Apakah Anda yakin ingin menghapus data ini?");

                if (confirmDelete) {
                    // Redirect atau lakukan penghapusan data
                    window.location.href = 'delete_data.php?id_pengguna=' + idPengguna;
                }
            }

            function closePopup() {
                // Sembunyikan popup saat tombol close ditekan
                var popup = document.getElementById('popup');
                popup.style.display = 'none';
            }
        </script>

        <script>
            window.onload = function() {
                var today = new Date();
                var options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                var formattedDate = today.toLocaleDateString(undefined, options);
                document.getElementById('tanggal').textContent += formattedDate;
            };
        </script>

    </div>
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav">Murid</span>
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav2">☰ Murid</span>
            </div>

            <div class="col-div-6">
                <div class="profile">
                    <img src="images/user.png" class="pro-img" />
                    <p style="color: #748DA6;">M fajar dwi p <span>Admin</span></p>
                    <i class="fa fa-regular fa-bell" style="position: relative; right: 30%; bottom: 43px;"></p></i>
                </div>
            </div>
        </div>
        <div id="popup" class="popup">
            <div id="popup-content" class="popup-content">
                <span class="close" onclick="closePopup">&times;</span>
                <p>Tekan ini</p>
            </div>
        </div>

        <?php
        // Mengimpor file koneksi.php
        require_once('php/koneksi.php');

        // Query untuk mengambil data dari database
        $query = "SELECT 
                data_pengguna.id_pengguna,
                data_pengguna.nama,
                data_pengguna.email,
                data_pengguna.username,
                data_pengguna.password,
                data_pengguna.no_wa,
                paket_program.nama_program
            FROM 
                data_pengguna
            JOIN 
                paket_program ON data_pengguna.id_program = paket_program.id_program";

        // Menjalankan query
        $result = $conn->query($query);
        ?>

        <div class="clearfix"></div>
        <div class="col-div-81" style="position: relative; bottom: 20px; left: 20px;">
            <div class="box-9" style="height: 630px;">
                <div class="content-box">
                <div class="bulan-container">
                    <p>Murid</p>
                        <input style="position: relative; top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Nama murid" required>
                    </div>
                    <p><span style="position: relative; right: 82%; bottom: 13px;" id="searchSpan">Cari</span>

                    <br />
                    <table>
                        <tr>
                            <th>Id_Pengguna</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>No.Wa</th>
                            <th>Nama Program</th>
                            <th>Aksi </th>
                        </tr>
                        <?php
                        // Menampilkan data dari hasil query
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_pengguna"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["password"] . "</td>";
                            echo "<td>" . $row["no_wa"] . "</td>";
                            echo "<td>" . $row["nama_program"] . "</td>";
                            echo "<td><button class='edit-button' onclick='editRow(this)'>Edit</button> <button class='delete-button' onclick='deleteRow(this)'>Hapus</button></td>";
                            echo "</tr>";
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
         <script>
        function toggleSearch() {
            var searchInput = document.getElementById('searchInput');
            searchInput.style.display = (searchInput.style.display === 'none' || searchInput.style.display === '') ? 'block' : 'none';
            searchInput.value = ''; // Clear input when toggling
        }

        function searchText() {
            var searchInput = document.getElementById('searchInput');
            var searchText = searchInput.value.toLowerCase();

            var searchSpan = document.getElementById('searchSpan');
            var spanText = searchSpan.innerText.toLowerCase();

            if (searchText && spanText.includes(searchText)) {
                searchSpan.innerHTML = spanText.replace(new RegExp(searchText, 'ig'), function (match) {
                    return '<span style="background-color: yellow;">' + match + '</span>';
                });
            } else {
                searchSpan.innerHTML = 'Cari';
            }
        }
    </script>

</body>

</html>