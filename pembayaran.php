<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            background-image: url('img/Desktop - 14.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 400px;
            background: rgba(255, 255, 255, 0.7);
            /* Warna latar belakang dengan tingkat kejernihan */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        select,
        input,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        select {
            appearance: none;
            background: url('https://img.icons8.com/android/24/000000/expand-arrow.png') no-repeat right #fff;
            background-size: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
        }

        h2 {
            color: #333;
        }

        .content {
            margin-top: 20px;
        }

        .input-box {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            text-align: left;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .gender-title {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #666;
        }

        .gender-category {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .gender-category input {
            margin-right: 5px;
        }

        .alert {
            margin-top: 15px;
            color: #666;
        }

        .alert a {
            color: #007bff;
            text-decoration: none;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 40px;
        }

        .back-button:hover {
            background-color: #999;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 0px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <?php
        // Memasukkan file koneksi.php
        include 'php/koneksi.php';

        // Query untuk mendapatkan data program
        $queryPrograms = "SELECT id_program, nama_program, harga FROM paket_program";
        $resultPrograms = $conn->query($queryPrograms);
        ?>

        <form action="proses_pembayaran.php" method="post" enctype="multipart/form-data" id="formPembayaran">
            <h2>Form Pembayaran</h2>
            <label for="program">Nama Program:</label>
            <select id="program" name="program" onchange="updateHarga()">
                <?php
                // Menampilkan nama program dari database
                while ($row = $resultPrograms->fetch_assoc()) {
                    echo "<option value='" . $row['id_program'] . "' data-harga='" . $row['harga'] . "'>" . $row['nama_program'] . "</option>";
                }
                ?>
            </select>

            <label for="harga">Harga (Rp):</label>
            <input type="number" id="harga" name="harga" placeholder="Masukkan harga program" required readonly>

            <label for="bayar">Jumlah Bayar (Rp):</label>
            <input type="number" id="bayar" name="bayar" placeholder="Masukkan jumlah pembayaran" required>

            <label for="file">Unggah File:</label>
            <input type="file" id="file" name="file">

            <button type="submit">Proses Pembayaran</button>
            <a href="beranda.php" class="button">Kembali</a>
        </form>

        <script>
            // Fungsi untuk mengupdate harga saat memilih program
            function updateHarga() {
                var programSelect = document.getElementById("program");
                var selectedOption = programSelect.options[programSelect.selectedIndex];
                var hargaInput = document.getElementById("harga");

                // Mengambil data-harga dari atribut data pada opsi terpilih
                var harga = selectedOption.getAttribute("data-harga");

                // Menyimpan harga pada input harga
                hargaInput.value = harga;
            }
        </script>
    </div>
</body>

</html>