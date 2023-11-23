<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Form Pembayaran</h2>

    <?php
    // Memasukkan file koneksi.php
    include 'php/koneksi.php';

    // Query untuk mendapatkan data program
    $queryPrograms = "SELECT id_program, nama_program, harga FROM paket_program";
    $resultPrograms = $conn->query($queryPrograms);
    ?>

    <form action="proses_pembayaran.php" method="post" enctype="multipart/form-data" id="formPembayaran">
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

</body>
</html>
