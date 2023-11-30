<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cicilan</title>
    <style>
        /* Gaya CSS sesuai kebutuhan Anda */
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
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
                            <th>Status</th>
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
            <span class="popup-close" onclick="hidePopup()">&times;</span>
            <h2>Form Cicilan</h2>
            <form action="update_cicilan.php" method="post">
            <div class="input-box">
            <label for="id_pembayaran">ID Pembayaran:</label>
            <input type="text" name="id_pembayaran" id="id_pembayaran" value="${idPembayaran}" readonly>
            </div>
            <div class="input-box">
            <label for="id_pengguna">ID Pengguna:</label>
            <input type="text" name="id_pengguna" id="id_pengguna" value="${idPengguna}" readonly>
            </div>
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
            <div class="input-box">
            <label for="totTanggungan">Total Tanggungan : Rp</label>
            <input type="number" name="totTanggungan" id="totTanggungan" value="${status}" readonly>
            </div>
            <div class="input-box">
            <label for="jumlah_bayar">Jumlah Bayar: Rp</label>
            <input type="number" name="jumlah_bayar" required>
            </div>
            <div class="button-container">
            <button class="save-button" type="submit">Simpan</button>
            <button class="cancel-button" type="button" onclick="hidePopup()">Batal</button>
            </div>   
            </form>
            `;

            // Tampilkan tabel cicilan di dalam popup
            $.ajax({
                url: 'get_cicilan_by_id.php',
                type: 'GET',
                data: { id_pembayaran: idPembayaran },
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
