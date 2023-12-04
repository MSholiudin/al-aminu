<!Doctype HTML>
<html>

<head>
    <title>Murid</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <style>
        .popup-content {
            color: #333;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 24px;
            color: #777;
        }

        .popup-container form {
            display: grid;
            /* Change to grid layout */
            grid-template-columns: 1fr 1fr;
            /* Two equal columns */
            grid-gap: 20px;
            /* Adjust the gap between columns */
        }

        .popup-container label {
            display: block;
            margin-top: 20px;
            color: #333;
            font-size: 16px;
        }

        .popup-container input,
        .popup-container select {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .popup-container .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .popup-container button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .popup-container .save-button {
            background-color: #4caf50;
            color: white;
        }

        .popup-container .cancel-button {
            background-color: #ccc;
            color: #333;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 12px;
            z-index: 2;
            padding: 30px;
            max-width: 1300px;
            /* Ganti nilai sesuai kebutuhan Anda */
            width: 100%;
            /* Pastikan lebar maksimum diterapkan sepanjang waktu */
            animation: fadeIn 0.5s ease-out;
        }

        button.cari-button:hover {
            background-color: red;
        }

        .cari-button:hover {
            background-color: #38E54D !important;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <div id="mySidenav" class="sidenav">
        <p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
        <a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
        <a href="jadwal.php" class="icon-a"><i class="fa fa-calendar icons"></i> Jadwal</a>
        <a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
        <a href="pemesanan.php" class="icon-a"><i class="fa fa-shopping-cart"></i> Pemesanan</a>
        <a href="cicilan.php" class="icon-a"><i class="fa fa-credit-card"></i> Cicilan</a>
        <a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>
        <a href="notifikasi.php" class="icon-a"><i class="fa fa-regular fa-bell"></i> Notifikasi</a>

        <script>
            function editRow(button) {
                var popupOverlay = document.getElementById('overlay');

                // Tampilkan overlay dan pop-up
                popupOverlay.style.display = 'block';
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
                var popupContent = document.getElementById('popup-container');
                popupContent.innerHTML = `
                <div class="popup-content">
                <span class="popup-close" onclick="closePopup()">&times;</span>
                <h2>Edit Data</h2>
                <form action="update_data.php" method="post">
                <input type="hidden" name="id_pengguna" value="${idPengguna}">
                <div class="input-box">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" value="${nama}">
                </div>
                <div class="input-box">
                <label for="email">Email:</label>
                <input type="text" name="email" value="${email}">
                </div>
                <div class="input-box">
                <label for="username">Username:</label>
                <input type="text" name="username" value="${username}">
                </div>
                <div class="input-box">
                <label for="password">Password:</label>
                <input type="text" name="password" value="${password}">
                </div>
                <div class="input-box">
                <label for="no_wa">No. Wa:</label>
                <input type="text" name="no_wa" value="${noWa}">
                </div>
                <div class="input-box">
                <label for="nama_program">Nama Program:</label>
                <input type="text" name="nama_program" value="${namaProgram}">
                </div>
                <div class="button-container">
                <button class="save-button" type="submit">Simpan</button>
                <button class="cancel-button" type="button" onclick="closePopup()">Batal</button>
                </div>
                </form>
                </div>
                `;

                // Tampilkan popup
                popupContent.style.display = 'block';
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
                var popup = document.getElementById('popup-container');
                popup.style.display = 'none';

                var overlay = document.getElementById('overlay');
                overlay.style.display = 'none';
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
        <div id="main">
            <!-- ... (Kode main lainnya) ... -->

            <div id="overlay" class="overlay"></div>
            <div id="popup-container" class="popup-container">
                <div class="popup-content">
                    <span class="popup-close" onclick="closePopup()">&times;</span>
                    <h2>Edit Data</h2>
                    <form action="update_data.php" method="post">
                        <input type="hidden" name="id_pengguna" value="">
                        <div class="input-box">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" value="">
                        </div>
                        <div class="input-box">
                            <label for="email">Email:</label>
                            <input type="text" name="email" value="">
                        </div>
                        <div class="input-box">
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="">
                        </div>
                        <div class="input-box">
                            <label for="password">Password:</label>
                            <input type="text" name="password" value="">
                        </div>
                        <div class="input-box">
                            <label for="no_wa">No. Wa:</label>
                            <input type="text" name="no_wa" value="">
                        </div>
                        <div class="input-box">
                            <label for="nama_program">Nama Program:</label>
                            <input type="text" name="nama_program" value="">
                        </div>
                        <div class="button-container">
                            <button class="save-button" type="submit">Simpan</button>
                            <button class="cancel-button" type="button" onclick="closePopup()">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav">Murid</span>
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav2">☰ Murid</span>
            </div>

            <div class="col-div-6">
                <div class="profile">
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
        <div class="col-div-81" style="position: relative; top: 30px; left: 20px;">
            <div class="box-9" style="height: 630px;">
                <div class="content-box">
                    <div class="bulan-container">
                        <p>Data pengguna</p>
                        <input style="position: relative; height: 25px;  top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Nama Murid" required>
                    </div>
                    <button class="cari-button" style="height: 30px; background-color: green; position: relative; left: 15%; bottom: 20px;" onclick="cari()">Cari</button>
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
                    searchSpan.innerHTML = spanText.replace(new RegExp(searchText, 'ig'), function(match) {
                        return '<span style="background-color: yellow;">' + match + '</span>';
                    });
                } else {
                    searchSpan.innerHTML = 'Cari';
                }
            }
        </script>


    </body>

    </html>