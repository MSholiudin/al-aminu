<!Doctype HTML>
<html>

<head>
	<title>Jadwal Bimbel</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<style>
		/* Styling untuk popup Tambah Jadwal */
		.popup-mentor {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			z-index: 2;
			border-radius: 8px;
			max-width: 400px;
			width: 100%;
		}

		.popup-mentor h2 {
			color: #333;
			text-align: center;
		}

		.popup-mentor label {
			display: block;
			margin: 10px 0;
		}

		.popup-mentor input {
			width: calc(100% - 20px);
			padding: 8px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}

		.popup-mentor button {
			background-color: #4caf50;
			color: white;
			padding: 10px 15px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			display: inline-block;
			margin-right: 5px;
		}

		.popup-mentor button.cancel {
			background-color: #ccc;
		}

		.button-container-mentor {
			text-align: center;
		}
	</style>

	<style>
		/* Styling untuk popup */
		.popup {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			z-index: 2;
			border-radius: 8px;
			max-width: 400px;
			width: 100%;
		}

		.popup h2 {
			color: #333;
			text-align: center;
		}

		.popup label {
			display: block;
			margin: 10px 0;
		}

		.popup input {
			width: 100%;
			padding: 8px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}

		.popup button {
			background-color: #4caf50;
			color: white;
			padding: 10px 15px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}

		/* Styling untuk latar belakang layar saat popup muncul */
		.overlay {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 1;
		}
		.overlay1 {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 1;
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

		<div class="popup" id="popupJadwal">
			<!-- Konten Popup -->
			<h2>Isi Jadwal</h2>
			<label for="hari">Hari:</label>
			<input type="text" id="hari" name="hari" required>
			<label for="jam">Jam:</label>
			<input type="text" id="jam" name="jam" required>
			<label for="mentor">Mentor:</label>
			<input type="text" id="mentor" name="mentor" required>
			<label for="mapel">Mata Pelajaran:</label>
			<input type="text" id="mapel" name="mapel" required>

			<button onclick="simpanJadwal()">Simpan</button>
			<button style="position: relative; top: 10px; background-color: red;" onclick="tutupPopup()">Tutup</button>

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
				<div class="popup-mentor popup" id="popupMentor">
					<!-- Konten Popup -->
					<h2>Tambah Mentor</h2>
					<label for="namaMentor">Nama Mentor:</label>
					<input type="text" id="namaMentor" name="namaMentor" required>
					<label for="mapelMentor">Mata Pelajaran:</label>
					<input type="text" id="mapelMentor" name="mapelMentor" required>

					<div class="button-container">
						<button onclick="simpanMentor()">Simpan</button>
						<button style="position: relative; top: 10px; background-color: red;" class="cancel" onclick="tutupPopupMentor()">Tutup</button>
					</div>
				</div>
				<div class="content-box" style="position: relative;">
					<p>Jadwal Harian <button style="position: relative; left: 600px; height: 30px; " onclick="tampilkanPopup()">Tambah Jadwal</button></p>
					<br />
					<table>
						<tr>
							<th>Hari</th>
							<th>Jam</th>
							<th>Mentor</th>
							<th>Mapel</th>
							<th>Materi</th>
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
						// ...

						function tampilkanPopupMentor() {
							document.getElementById('popupMentor').style.display = 'block';
							document.getElementById('overlay').style.display = 'block';

							// Menambahkan event listener untuk menutup pop-up saat mengklik di luar area pop-up
						}

						function tutupPopupMentor() {
							document.getElementById('popupMentor').style.display = 'none';
							document.getElementById('overlay').style.display = 'none';
						}

						function tutupPopupMentorOutside(event) {
							console.log('Mentor disimpan');
							tutupPopupMentor();
							}

						// ...
					</script>

</body>


</html>