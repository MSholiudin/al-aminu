<!Doctype HTML>
<html>

<head>
    <title>Cicilan</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>
    <style>
        /* Styles for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 20%;
        }

        /* Close button styles */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Button styles */
        .modal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .modal-buttons button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .modal-buttons button.confirm {
            background-color: #4caf50;
            color: #fff;
        }

        .modal-buttons button.cancel {
            background-color: #f44336;
            color: #fff;
        }
    </style>

    <div id="mySidenav" class="sidenav">
        <p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
        <a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
        <a href="jadwal.php" class="icon-a"><i class="fa fa-calendar icons"></i> Jadwal</a>
        <a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
        <a href="cicilan.php" class="icon-a"><i class="fa fa-credit-card"></i> Cicilan</a>
        <a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>
        <a href="notifikasi.php" class="icon-a"><i class="fa fa-regular fa-bell"></i> Notifikasi</a>

    </div>
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav">Cicilan</span>
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav2">☰ Cicilan</span>
            </div>

            <div class="col-div-6">
                <div class="profile">
                </div>
            </div>
        </div>
        <style>
            #popup {
                display: none;
                position: fixed;
                z-index: 1;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 60%;
                max-width: 400px;
                max-height: 80%;
                overflow-y: auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            #popup .cancel-button:hover {
                background-color: red;
            }

            #popup .save-button:hover{
                background-color: #38E54D;
            }

            .input-box {
                margin-bottom: 15px;
            }

            #popup h2 {
                text-align: center;
                color: #333;
            }

            /* Additional styles for better visibility of the close button */
            .close-popup {
                color: #aaa;
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 20px;
                cursor: pointer;
            }

            .close-popup:hover {
                color: #333;
            }

            .container {
                max-width: 800px;
                margin: 50px auto;
                background-color: #f4f4f4;
                padding: 20px;
                border-radius: 8px;
                position: relative;
                right: 15%;
            }

            h2 {
                text-align: center;
                color: #333;
            }

            /* Additional styles for form alignment */
            form {
                display: grid;
                grid-template-columns: 1fr 1fr;
                /* Two equal-width columns */
                gap: 15px;
            }

            .input-box {
                margin-bottom: 0;
                /* Remove the default margin */
            }

            .button-container {
                grid-column: span 2;
                /* Make the button container span two columns */
            }

            button {
                width: 100%;
                /* Make the buttons take the full width of the container */
            }

            label {
                margin-bottom: 8px;
                color: #333;
            }

            input {
                padding: 8px;
                position: relative;
                margin-bottom: 16px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .button-container {
                display: flex;
                gap: 16px;
                justify-content: flex-end;
                /* Pindahkan ke sebelah kanan */
            }

            button {
                padding: 10px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: #4caf50;
            }


            .button-periksa {
                background-color: #2196F3;
            }

            .button-periksa:hover {
                background-color: #0b7dda;
            }

            .checkbox-container {
                display: flex;
                align-items: center;
                margin-bottom: 16px;
            }

            .checkbox-input {
                margin-right: 8px;
            }

            .bulan-container {
                display: flex;
                align-items: center;
                margin-bottom: 16px;
            }

            .checkbox-container label {
                margin-right: 16px;
            }

            .bulan-input,
            .pembayaran-input {
                flex: 1;
                margin-right: 8px;
            }

            .text-bulan {
                width: 70px;
            }

            .cancel-button {
                background-color: #C70039;
            }


            #overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.4);
                z-index: 1;
            }
        </style>
        <style>
            #calendar-container {
                display: none;
                position: absolute;
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 10px;
                z-index: 1;
            }

            .show-calendar {
                cursor: pointer;
                text-decoration: underline;
                color: blue;
            }
        </style>
        </head>

        <body>
            <div class="clearfix"></div>
            <div class="col-div-81" style="position: relative; top: 30px; left: 20px;">
                <div class="box-9" style="height: 630px;">
                    <div class="content-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id Pembayaran</th>
                                    <th>Id Pengguna</th>
                                    <th>Nama</th>
                                    <th>No. WA</th>
                                    <th>Program</th>
                                    <th>Tanggungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once('php/koneksi.php');
                                $query = "SELECT pembayaran.id_pembayaran, data_pengguna.id_pengguna, data_pengguna.nama, data_pengguna.no_wa, paket_program.nama_program, pembayaran.status FROM pembayaran
                            JOIN data_pengguna ON pembayaran.id_pengguna = data_pengguna.id_pengguna
                            JOIN paket_program ON pembayaran.id_program = paket_program.id_program";

                                $result = $conn->query($query);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id_pembayaran"] . "</td>";
                                    echo "<td>" . $row["id_pengguna"] . "</td>";
                                    echo "<td>" . $row["nama"] . "</td>";
                                    echo "<td>" . $row["no_wa"] . "</td>";
                                    echo "<td>" . $row["nama_program"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td><button class='edit-button' onclick='showPopup(this)'>Detail</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="overlay"></div>
            <div id="popup">

            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                function showPopup(button) {
                    var popupOverlay = document.getElementById('overlay');
                    var popupContent = document.getElementById('popup');

                    // Tampilkan overlay dan pop-up
                    popupOverlay.style.display = 'block';
                    // Dapatkan data baris yang sesuai dengan tombol Edit yang diklik
                    var row = button.parentNode.parentNode;
                    // Dapatkan data dari setiap sel pada baris tersebut
                    var idPembayaran = row.cells[0].innerHTML;
                    var idPengguna = row.cells[1].innerHTML;
                    var status = row.cells[5].innerHTML;
                    // Tampilkan formulir edit dalam popup dengan data yang sesuai
                    var popupContent = document.getElementById('popup');
                    popupContent.innerHTML = `
            <h2>Form Cicilan</h2>
            <form action="update_cicilan.php" method="post">
            <div class="input-box">
            <label for="id_pembayaran">ID Pembayaran:</label>
            <input type="text" name="id_pembayaran" id="id_pembayaran" value="${idPembayaran}" readonly>
            <div class="input-box">
            <label for="bulan">Bulan:</label>
            <select id="bulan" name="bulan">
            <option value="januari">Januari</option>
            <option value="februari">Februari</option>
            <option value="maret">Maret</option>
            <option value="april">April</option>
            <option value="mei">Mei</option>
            <option value="juni">Juni</option>
            <option value="juli">Juli</option>
            <option value="agustus">Agustus</option>
            <option value="september">September</option>
            <option value="oktober">Oktober</option>
            <option value="november">November</option>
            <option value="desember">Desember</option>
            </select>
            </div>
            </div>
            <div class="input-box">
            <label for="id_pengguna">ID Pengguna:</label>
            <input type="text" name="id_pengguna" id="id_pengguna" value="${idPengguna}" readonly>
            </div>
            <div class="input-box">
            <label for="totTanggungan">Total Tanggungan : Rp</label>
            <input type="number" name="totTanggungan" id="totTanggungan" value="${status}" readonly>
            </div>
            <div class="input-box">
            <label for="jumlah_bayar">Jumlah Bayar: Rp</label>
            <input type="number" name="jumlah_bayar" required>
            </div>
            <div class="button-container">
            <button class="cancel-button" type="button" onclick="hidePopup()">Batal</button>
            <button class="save-button" type="submit">Simpan</button>
            </div>   
            </form>
            `;

                    // Tampilkan tabel cicilan di dalam popup
                    $.ajax({
                        url: 'get_cicilan_by_id.php',
                        type: 'GET',
                        data: {
                            id_pembayaran: idPembayaran
                        },
                        success: function(data) {
                            popupContent.innerHTML += data;
                        },
                        error: function(error) {
                            console.log('Error fetching cicilan data:', error);
                        }
                    });

                    // Tampilkan popup
                    popupContent.style.display = 'block';
                }

                function hidePopup() {
                    document.getElementById('overlay').style.display = 'none';
                    document.getElementById('popup').style.display = 'none';

                }
            </script>

        </body>

</html>