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
            background-image: url('img/pembayaran.png');
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
            height: auto;
            background: rgba(255, 255, 255, 0.7);
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            font-size: 10mm;
            margin-top: 10px;
            margin-bottom: 50px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 6mm;
            text-align: left;
        }

        select,
        input,
        button {
            width: 100%;
            height: 60px;
            padding: 10px;
            margin-bottom: 22px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 20px;

        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
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
            <h2 style="font-size: 10mm; text-align: center;">Form Pembayaran</h2>
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

            
            <button style="font-size: 6mm; margin-top: 30px;" type="submit">Proses Pembayaran</button>
            <p style="text-align: center; font-size: 5mm;">Apakah ingin kembali ke beranda? <a style="text-align: center; font-size: 5mm; " href="beranda.php" >kembali</a></p>
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