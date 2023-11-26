<!Doctype HTML>
<html>

<head>
	<title>Jadwal Bimbel</title>
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
			z-index: 2;
			padding: 30px;
			max-width: 1300px;
			/* Ganti nilai sesuai kebutuhan Anda */
			width: 100%;
			/* Pastikan lebar maksimum diterapkan sepanjang waktu */
			animation: fadeIn 0.5s ease-out;
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
	<style>
		.popup-mentor {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 2;
			padding: 30px;
			max-width: 600px;
			/* Adjust the maximum width as needed */
			width: 100%;
			/* Set background color */
			border-radius: 8px;
			/* Add border radius for rounded corners */
			/* Add box shadow for depth */
			animation: fadeIn 0.5s ease-out;
		}

		.popup-mentor form {
			display: grid;
			grid-template-columns: 1fr;
			grid-gap: 10px;
		}

		.popup-mentor label {
			font-size: 16px;
			color: #333;
		}

		.popup-mentor input {
			width: 100%;
			padding: 12px;
			box-sizing: border-box;
			margin-top: 8px;
			border: 1px solid #ccc;
			border-radius: 6px;
			font-size: 16px;
		}

		.popup-mentor .button-container {
			margin-top: 20px;
			display: flex;
			justify-content: space-between;
		}

		.popup-mentor button {
			padding: 12px 24px;
			border: none;
			border-radius: 6px;
			cursor: pointer;
			font-size: 16px;
		}

		.popup-mentor .save-button {
			background-color: #4caf50;
			color: white;
		}

		.popup-mentor .cancel-button {
			background-color: #ccc;
			color: #333;
		}

		.popup-container select {
			width: 100%;
			padding: 12px;
			box-sizing: border-box;
			margin-top: 8px;
			border: 1px solid #ccc;
			border-radius: 6px;
			font-size: 20px;
			/* Sesuaikan dengan ukuran yang diinginkan */
		}

		.popup-container label[for="mapelMentor"] {
			font-size: 20px;
			/* Sesuaikan dengan ukuran yang diinginkan */
		}

		/* Gaya untuk membesarkan combo box di popupModule */
		.popup-container select#mapelModule {
			width: 100%;
			padding: 12px;
			box-sizing: border-box;
			margin-top: 8px;
			border: 1px solid #ccc;
			border-radius: 6px;
			font-size: 20px;
			/* Sesuaikan dengan ukuran yang diinginkan */
		}

		/* Gaya untuk membesarkan tulisan "Mapel" di popupModule */
		.popup-container label[for="mapelModule"] {
			font-size: 50px;
			/* Sesuaikan dengan ukuran yang diinginkan */
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
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav">Jadwal</span>
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav2">☰ Jadwal</span>
			</div>


			<div class="col-div-6">
				<div class="profile">
				</div>
			</div>
		</div>
		<div class="content-box">
			<div id="popup" class="popup">
				<!-- Konten pop-up di sini -->
			</div>
			<div id="popup" class="popup">
				<!-- Konten pop-up pengeditan di sini -->
				<input type="text" id="namaInput" placeholder="Nama">
				<input type="text" id="nohpInput" placeholder="No HP">
				<input type="text" id="kelasInput" placeholder="Kelas">
				<input type="text" id="cicilanInput" placeholder="Cicilan">
				<input type="text" id="statusInput" placeholder="Status">
				<button onclick="saveChanges()">Simpan</button>
				<button onclick="closePopup()">Batal</button>
			</div>


			<div style="font-size: 5mm; text-align: left; position: relative; top: 26px;" id="tanggal">Tanggal: </div>
			<div id="jam" style="font-size: 5mm; position: relative; top: 26px;">Jam: </div>
		</div>
		<div class="clearfix"></div>
		<!-- buat sebuah button dengan id="btn-kalender" -->
		<!-- buat sebuah input dengan type="date" dan id="input-kalender" -->
		<div class="popup-container" id="popupJadwal">
			<div style="border-radius: 10px;" class="popup-content">
				<span class="popup-close" onclick="tutupPopup()">&times;</span>
				<h2>Isi Jadwal</h2>
				<form>
					<label for="hari">Hari:</label>
					<input type="text" id="hari" name="hari" required>
					<label for="jam">Jam:</label>
					<input type="text" id="jam" name="jam" required>
					<div class="button-container">
						<button class="save-button" onclick="simpanJadwal()">Simpan</button>
						<button class="cancel-button" onclick="tutupPopup()">Batal</button>
					</div>
				</form>
			</div>
		</div>
		<div class="overlay" id="overlay" onclick="tutupPopup()"></div>
		<div class="col-div-8" style="position: relative; top: 30px;">
			<div class="box-8">
				<style>
					.col-div-9 {
						flex-basis: 800px;
						height: 50px;
						width: 10px;
					}

					.box-9 {
						background-color: #f4f4f4;
						padding: 20px;
						border-radius: 8px;
						width: 300px;
						position: relative;
						left: 950px;
					}

					.table1 {
						width: 50%;
						border-collapse: collapse;
						margin-top: 20px;
					}

					.th1,
					.td1 {
						border: 1px solid #ddd;
						padding: 8px;
						text-align: left;
					}

					.th1 {
						background-color: #f2f2f2;
					}
				</style>
				<?php
				// Misalkan koneksi.php sudah ada
				include 'php/koneksi.php';

				// Query untuk mendapatkan data jadwal
				$queryJadwal = "SELECT 
                    jadwal.hari,
                    jadwal.jam,
                    mentor.nama AS nama_mentor,
                    mapel.nama AS nama_mapel,
                    module.materi
                FROM	
                    jadwal
                JOIN
                    mentor ON jadwal.id_mentor = mentor.id_mentor
                JOIN
                    mapel ON jadwal.id_mapel = mapel.id_mapel
                JOIN
                    module ON jadwal.id_module = module.id_module";

				$resultJadwal = $conn->query($queryJadwal);

				?>
				<div class="popup-container" id="popupModule">
					<div style="border-radius: 10px;" class="popup-content">
						<span class="popup-close" onclick="tutupPopupModule()">&times;</span>
						<h2>Isi Module</h2>
						<form>
							<label for="namaMateri">id:</label>
							<input type="text" id="namaMateri" name="namaMateri" required>
							<label for="namaMateri">Nama :</label>
							<input type="text" id="namaMateri" name="namaMateri" required>
							<label for="namaMateri">Materi:</label>
							<input type="text" id="namaMateri" name="namaMateri" required>
							<label style="font-size: medium;" for="mapelMentor">Pilih Mapel:</label>
							<select style="font-size: large;" id="mapelMentor" name="mapelMentor">
									<option style="font-size: large;" value="Matematika">Matematika</option>
									<option style="font-size: large;" value="Bahasa Indonesia">Bahasa Indonesia</option>
									<option style="font-size: large;" value="Bahasa Indonesia">IPA</option>
									<option style="font-size: large;" value="Bahasa Indonesia">Bahasa Inggris</option>
									<!-- Add more options as needed -->
								</select>
							<!-- Tambahkan elemen-elemen lain sesuai kebutuhan -->
							<div class="button-container">
								<button class="save-button" onclick="simpanModule()">Simpan</button>
								<button class="cancel-button" onclick="tutupPopupModule()">Batal</button>
							</div>
						</form>
					</div>
				</div>
				<div class="popup" id="popupJadwal">
					<div class="popup-mentor popup" id="popupMentor">
						<div style="border-radius: 10px;" class="popup-content">
							<span class="popup-close" onclick="tutupPopupMentor()">&times;</span>
							<h2 style="text-align: center;">Tambah Mentor</h2>
							<form>
								<label for="namaMentor">id:</label>
								<input type="text" id="namaMentor" name="namaMentor" required>
								<label for="mapelMentor">Nama:</label>
								<input type="text" id="mapelMentor" name="mapelMentor" required>
								<label for="mapelMentor">jenis kelamin:</label>
								<input type="text" id="mapelMentor" name="mapelMentor" required>
								<label for="mapelMentor">no wa:</label>
								<input type="text" id="mapelMentor" name="mapelMentor" required>
								<label for="mapelMentor">Pilih Mapel:</label>
								<select style="font-size: large;" id="mapelMentor" name="mapelMentor">
									<option style="font-size: large;" value="Matematika">Matematika</option>
									<option style="font-size: large;" value="Bahasa Indonesia">Bahasa Indonesia</option>
									<option style="font-size: large;" value="Bahasa Indonesia">IPA</option>
									<option style="font-size: large;" value="Bahasa Indonesia">Bahasa Inggris</option>
									<!-- Add more options as needed -->
								</select>
								<label style="position: relative; top: 10px;" for="image">Upload Foto:</label>
								<input type="file" id="image" name="image" accept="image/*">
								<div class="button-container">
									<button class="save-button" onclick="simpanMentor()">Simpan</button>
									<button class="cancel-button" onclick="tutupPopupMentor()">Batal</button>
								</div>
							</form>
						</div>
					</div>
					<div class="content-box" style="position: relative; bottom: 20px;">
						<button style="position: relative; top: 30px; left: 600px; height: 30px; " onclick="tampilkanPopupModule()">Tambah Module</button>
						<p>Jadwal Harian <button style="position: relative; bottom: 1px; left: 600px; height: 30px; " onclick="tampilkanPopup()">Tambah Jadwal</button></p>
						<br />
						<table>
							<tr>
								<th>Mapel</th>
								<th>Module</th>
								<th>Mentor</th>
								<th>Jadwal</th>

							</tr>
							<?php
							// Mengecek apakah query menghasilkan hasil
							if ($resultJadwal->num_rows > 0) {
								// Menampilkan data dalam tabel
								while ($row = $resultJadwal->fetch_assoc()) {
									echo "<tr>";
									echo "<td>" . $row["hari"] . "</td>";
									echo "<td>" . $row["jam"] . "</td>";
									echo "<td>" . $row["nama_mentor"] . "</td>";
									echo "<td>" . $row["nama_mapel"] . "</td>";
									echo "<td>" . $row["materi"] . "</td>";
									echo "</tr>";
								}
							} else {
								// Jika tidak ada hasil
								echo "<tr><td colspan='5'>Tidak ada data jadwal.</td></tr>";
							}
							?>
						</table>
						<div class="content-box" style="position: relative; background-color: #f2f2f2; bottom: 165px; left: 950px; width: 30%;">
							<p>Mentor <button style="position: relative; height: 30px; left: 80px;" onclick="tampilkanPopupMentor()">Tambah Mentor</button></p>
							<br />
							<table>
								<tr>
									<th>Mentor</th>
									<th>Mapel</th>
								</tr>
							</table>
						</div>


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
							function updateDateTime() {
								var today = new Date();
								var options = {
									year: 'numeric',
									month: 'long',
									day: 'numeric'
								};
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
						<script>
							function tampilkanPopup() {
								document.getElementById('popupJadwal').style.display = 'block';
								document.getElementById('overlay').style.display = 'block';
							}

							function tutupPopup() {
								document.getElementById('popupJadwal').style.display = 'none';
								document.getElementById('overlay').style.display = 'none';
							}

							function simpanJadwal() {
								// Logika untuk menyimpan jadwal ke database atau melakukan tindakan lainnya
								console.log('Jadwal disimpan!');
								tutupPopup();
							}
						</script>

						<script>
							function tampilkanPopupMentor() {
								document.getElementById('popupMentor').style.display = 'block';
								document.getElementById('overlay').style.display = 'block';
							}

							function tutupPopupMentor() {
								document.getElementById('popupMentor').style.display = 'none';
								document.getElementById('overlay').style.display = 'none';
							}

							// ...
						</script>

						<script>
							function tampilkanPopupModule() {
								document.getElementById('popupModule').style.display = 'block';
								document.getElementById('overlay').style.display = 'block';
							}

							function tutupPopupModule() {
								document.getElementById('popupModule').style.display = 'none';
								document.getElementById('overlay').style.display = 'none';
							}

							// ...
						</script>

</body>


</html>