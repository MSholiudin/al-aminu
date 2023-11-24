<!Doctype HTML>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datepicker/dist/datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>

    <div id="mySidenav" class="sidenav">
        <p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
        <a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
        <a href="jadwal.php" class="icon-a"><i class="fa fa-user icons"></i> Jadwal</a>
        <a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
        <a href="pemesanan.php" class="icon-a"><i class="fa fa-list icons"></i> Pemesanan</a>
        <a href="cicilan.php" class="icon-a"><i class="fa fa-list icons"></i> Cicilan</a>
        <a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>

    </div>
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav">Cicilan</span>
                <span style="font-size:30px;cursor:pointer; color: black;" class="nav2">☰ Cicilan</span>
            </div>

            <div class="col-div-6">
                <div class="profile">
                    <img src="images/user.png" class="pro-img" />
                    <p style="color: #748DA6;">M fajar dwi p <span>Admin</span></p>
                    <i class="fa fa-regular fa-bell" style="position: relative; right: 30%; bottom: 43px;"></i>
                </div>
            </div>
        </div>
        <style>
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

            form {
                display: flex;
                flex-direction: column;
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
                background-color: #45a049;
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

            <div class="container">
                <form action="proses_cicilan.php" method="post">
                    <div style="display: flex; gap: 16px;">
                        <div style="flex: 1;">
                            <b for="nama">Nama :</b>
                            <input type="text" id="nama" name="nama" required>
                        </div>
                        <div style="flex: 1;">
                            <label style="position: relative; top: 5px;" for="kelas"><b>Kelas:</b></label>
                            <select style="position: relative; top: 5px;" id="kelas" name="kelas" required>
                                <option value="" disabled selected>Pilih Kelas</option>
                                <option value="Kelas 9 SMP">Kelas 9 SMP</option>
                                <option value="Kelas 10 SMA">Kelas 10 SMA</option>
                                <option value="Kelas 11 SMA">Kelas 11 SMA</option>
                                <option value="Kelas 12 SMA">Kelas 12 SMA</option>
                                <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                            </select>
                            <div class="bulan-container">
                                <div class="checkbox-container">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="datepicker">Choose a date:</label>
    <input type="text" id="datepicker" name="datepicker" autocomplete="off">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#datepicker", {
                dateFormat: "Y-m-d",
                maxDate: "today",
                defaultDate: "today",
                onClose: function (selectedDates, dateStr, instance) {
                    // Handle the date selection if needed
                    console.log("Selected Date: ", dateStr);
                }
            });
        });
    </script>
                    <div class="button-container">
                        <button type="button" class="button-periksa">Periksa</button>
                    </div>



                    <div class="bulan-container">
                        <div class="checkbox-container">
                            <input style="position: relative; top: 15px;" type="checkbox" id="include_bunga_jan" name="include_bunga_jan" class="checkbox-input">
                            <label style="position: relative; top: 10px;" for="include_bunga_jan" class="text-bulan">January</label>
                        </div>
                        <input style="position: relative; top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Pembayaran Bulan ini" required>
                    </div>

                    <div class="bulan-container">
                        <div class="checkbox-container">
                            <input style="position: relative; top: 15px;" type="checkbox" id="include_bunga_jan" name="include_bunga_jan" class="checkbox-input">
                            <label style="position: relative; top: 10px;" for="include_bunga_jan" class="text-bulan">Febuary</label>
                        </div>
                        <input style="position: relative; top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Pembayaran Bulan ini" required>
                    </div>

                    <div class="bulan-container">
                        <div class="checkbox-container">
                            <input style="position: relative; top: 15px;" type="checkbox" id="include_bunga_jan" name="include_bunga_jan" class="checkbox-input">
                            <label style="position: relative; top: 10px;" for="include_bunga_jan" class="text-bulan">Maret</label>
                        </div>
                        <input style="position: relative; top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Pembayaran Bulan ini" required>
                    </div>

                    <div class="bulan-container">
                        <div class="checkbox-container">
                            <input style="position: relative; top: 15px;" type="checkbox" id="include_bunga_jan" name="include_bunga_jan" class="checkbox-input">
                            <label style="position: relative; top: 10px;" for="include_bunga_jan" class="text-bulan">April</label>
                        </div>
                        <input style="position: relative; top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Pembayaran Bulan ini" required>
                    </div>

                    <div class="bulan-container">
                        <div class="checkbox-container">
                            <input style="position: relative; top: 15px;" type="checkbox" id="include_bunga_jan" name="include_bunga_jan" class="checkbox-input">
                            <label style="position: relative; top: 10px;" for="include_bunga_jan" class="text-bulan">Mei</label>
                        </div>
                        <input style="position: relative; top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Pembayaran Bulan ini" required>
                    </div>

                    <div class="bulan-container">
                        <div class="checkbox-container">
                            <input style="position: relative; top: 15px;" type="checkbox" id="include_bunga_jan" name="include_bunga_jan" class="checkbox-input">
                            <label style="position: relative; top: 10px;" for="include_bunga_jan" class="text-bulan">Juni</label>
                        </div>
                        <input style="position: relative; top: 10px;" type="text" id="pembayaran_jan" name="pembayaran_jan" class="pembayaran-input" placeholder="Pembayaran Bulan ini" required>
                    </div>

                    <!-- Ganti untuk bulan-bulan lainnya -->
                </form>
                <div class="gambar" style="width: 300px; background-color: #f4f4f4; height: 330px; position: relative; left: 410px; bottom: 580px; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 style="color: black; text-align: center; margin-bottom: 20px;">Pembayaran</h2>

    <div style="margin-bottom: 20px;">
        <label for="total_harga" style="color: black; display: block; margin-bottom: 5px;">Total Harga:</label>
        <input type="text" style="width: 100%; padding: 10px; box-sizing: border-box; border: none; border-radius: 5px;" id="total_harga" name="total_harga" required>
    </div>
    <div style="margin-bottom: 20px;">
    <label for="durasi_cicilan" style="color: black; display: block; margin-bottom: 5px;">Total Bayar:</label>
    <input type="text" style="width: 100%; padding: 10px; box-sizing: border-box; border: none; border-radius: 5px;" id="durasi_cicilan" name="durasi_cicilan" required>
</div>
    <button type="submit" class="button-bayar" style="width: 100%; padding: 10px; box-sizing: border-box; border: none; border-radius: 5px; background-color: #4caf50; color: #fff; cursor: pointer;">Bayar</button>
</div>
            </div>
       
        </body>
        

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
            $(document).ready(function() {
                // Aktifkan datepicker pada semua field dengan class 'pembayaran-input'
                $('.pembayaran-input').datepicker({
                    dateFormat: 'dd-mm-yy', // Sesuaikan dengan format yang diinginkan
                    onSelect: function(dateText, inst) {
                        // Fungsi ini akan dijalankan saat memilih tanggal pada kalender
                        // Anda dapat menyesuaikan apa yang ingin Anda lakukan saat tanggal dipilih
                        $(this).val(dateText);
                    }
                });

                // Tambahkan fungsi untuk tombol kalender
                $('.button-kalender').click(function() {
                    // Temukan input datepicker terkait dan aktifkan kalender
                    $(this).prev('.pembayaran-input').datepicker('show');
                });
            });
        </script>

</body>

</html>