<?php

include 'php/koneksi.php';

// submit module
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_module'])) {
	// Ambil nilai dari formulir
	$idModule = $_POST['idModule'];
	$namaModule = $_POST['namaModule'];
	$materi = $_POST['materi'];
	$idMapel = $_POST['mapelMentor'];

	// Lakukan query untuk menyimpan data ke database
	$query = "INSERT INTO `module` (`id_module`, `nama_module`, `materi`, `id_mapel`) VALUES ('$idModule', '$namaModule', '$materi', '$idMapel')";

	// Jalankan query
	$result = mysqli_query($conn, $query);

	// Periksa apakah query berhasil
	if ($result) {
		echo "Data berhasil disimpan ke database.";
	} else {
		echo "Error: " . mysqli_error($conn);
	}
}

// submit jadwal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_jadwal'])) {
	// Ambil nilai dari formulir
	$idJadwal = $_POST['idJadwal'];
	$hari = $_POST['hari'];
	$jam = $_POST['jam'];
	$idModule = $_POST['mapelMentor'];

	// Lakukan query untuk menyimpan data ke database
	$query = "INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`, `id_module`) VALUES ('$idJadwal', '$hari', '$jam', '$idModule')";

	// Jalankan query
	$result = mysqli_query($conn, $query);

	// Periksa apakah query berhasil
	if ($result) {
		echo "Data berhasil disimpan ke database.";
	} else {
		echo "Error: " . mysqli_error($conn);
	}
}

if (isset($_POST['submit_mentor'])) {
	// Ambil data dari formulir
	$idMentor = $_POST['id_mentor'];
	$namaMentor = $_POST['nama_mentor'];
	$jkMentor = $_POST['jk_mentor'];
	$waMentor = $_POST['wa_mentor'];
	$mapelMentor = $_POST['mapelMentor'];

	// Lakukan operasi INSERT ke database
	$query = "INSERT INTO `mentor` (`id_mentor`, `nama`, `jenis_kelamin`, `no_wa`, `id_mapel`) VALUES ('$idMentor', '$namaMentor', '$jkMentor', '$waMentor', '$mapelMentor')";

	if ($conn->query($query) === TRUE) {
		echo "Data berhasil disimpan!";
	} else {
		echo "Error: " . $query . "<br>" . $conn->error;
	}
}

$queryMapel = "SELECT id_mapel, nama FROM mapel";
$resultMapel = $conn->query($queryMapel);

$queryModule = "SELECT id_module, nama_module FROM module";
$resultModule = $conn->query($queryModule);

$queryMapell = "SELECT id_mapel, nama FROM mapel";
$resultMapell = $conn->query($queryMapell);
?>
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


		#popupJadwal .save-button:hover {
			background-color: #38E54D;
			color: white;
		}

		#popupJadwal .cancel-button:hover{
			background-color: red;
		}

		#popupModule .cancel-button{
			background-color: #C70039;
		}

		#popupModule .cancel-button:hover{
			background-color: red;
		}

		#popupModule .save-button{
			background-color: #4caf50;
		}

		#popupModule .save-button:hover{
			background-color: #38E54D;
		}

		#popupMentor .cancel-button{
			background-color: #C70039;
		}

		#popupMentor .cancel-button:hover{
			background-color: red;
		}

		#popupMentor .save-button{
			background-color: #4caf50;
		}

		#popupMentor .save-button:hover{
			background-color: #38E54D;
		}

		#popupJadwal .cancel-button{
			background-color: #C70039;
		}

		.popup-container .save-button {
			background-color: #4caf50;
			color: white;
		}


		.popup-container .cancel-button {
			background-color: red;
			color: white;
			margin-right: 20px;
			/* Sesuaikan jarak yang diinginkan */
		}

		#overlay {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			z-index: 3;
			/* Ensure the overlay has a higher z-index than the navbar */
		}

		.popup-container {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 4;
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
		.save-button{
			background-color: green;
		}
		.cancel-button{
			background-color: red;
		}

		#popup .save-button{
			background-color: #38E54D;
		}

		#popup .cancel-button{
			background-color: #4caf50;
		}
		.popup-mentor {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 4;
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
			background-color: red;
			color: white;
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

	<div class="overlay" id="overlay"></div>
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
		</div>
		<div class="content-box">
			<div style="font-size: 5mm; text-align: left; position: relative; top: 26px;" id="tanggal">Tanggal: </div>
			<div id="jam" style="font-size: 5mm; position: relative; top: 26px;">Jam: </div>
		</div>
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
				<div class="popup-container" id="popupModule">
					<div style="border-radius: 10px;" class="popup-content">
						<span class="popup-close" onclick="tutupPopupModule()">&times;</span>
						<h2>Isi Modul</h2>
						<form method="post" action="">
							<label for="idModule">ID:</label>
							<input type="text" id="idModule" name="idModule" required>
							<label for="namaModule">Nama:</label>
							<input type="text" id="namaModule" name="namaModule" required>
							<label for="materi">Materi:</label>
							<input type="text" id="materi" name="materi" required>
							<label style="font-size: medium;" for="mapelMentor">Pilih Mata Pelajaran:</label>
							<select style="font-size: large;" id="mapelMentor" name="mapelMentor">
								<?php
								// Tampilkan pilihan program dari database
								while ($row = $resultMapel->fetch_assoc()) {
									echo "<option value=\"" . $row["id_mapel"] . "\">" . $row["nama"] . "</option>";
								}
								?>
							</select>
							<!-- Tambahkan elemen lain sesuai kebutuhan -->
							<div class="button-container">
								<button class="cancel-button" onclick="tutupPopupModule()">Batal</button>
								<button class="save-button" type="submit" name="submit_module">Simpan Modul</button>

							</div>
						</form>
					</div>
				</div>
				<div class="popup-container" id="popupJadwal">
					<div style="border-radius: 10px;" class="popup-content">
						<span class="popup-close" onclick="tutupPopup()">&times;</span>
						<h2>Isi Jadwal</h2>
						<form method="post" action="">
							<label for="idJadwal">ID:</label>
							<input type="text" id="idJadwal" name="idJadwal" required>
							<label for="hari">Hari:</label>
							<input type="text" id="hari" name="hari" required>
							<label for="jam">Jam:</label>
							<input type="text" id="jam" name="jam" required>
							<label for="mapelMentor">Pilih Materi:</label>
							<select style="font-size: large;" id="mapelMentor" name="mapelMentor">
								<?php
								// Tampilkan pilihan program dari database
								while ($row = $resultModule->fetch_assoc()) {
									echo "<option value=\"" . $row["id_module"] . "\">" . $row["nama_module"] . "</option>";
								}
								?>
							</select>
							<div class="button-container">
								<button class="cancel-button" onclick="tutupPopup()">Batal</button>
								<button class="save-button" type="submit" name="submit_jadwal">Simpan Jadwal</button>

							</div>
						</form>
					</div>
				</div>
				<div class="popup-mentor popup" id="popupMentor">
					<div style="border-radius: 10px;" class="popup-content">
						<span class="popup-close" onclick="tutupPopupMentor()">&times;</span>
						<h2 style="text-align: center;">Tambah Mentor</h2>
						<form action="" method="post" enctype="multipart/form-data">
							<label for="id_mentor">ID:</label>
							<input type="text" id="id_mentor" name="id_mentor" required>
							<label for="nama_mentor">Nama:</label>
							<input type="text" id="nama_mentor" name="nama_mentor" required>
							<label for="jk_mentor">Jenis Kelamin:</label>
							<input type="text" id="jk_mentor" name="jk_mentor" required>
							<label for="wa_mentor">Nomor WhatsApp:</label>
							<input type="tel" id="wa_mentor" name="wa_mentor" required>
							<label style="font-size: medium;" for="mapelMentor">Pilih Mata Pelajaran:</label>
							<select style="font-size: large;" id="mapelMentor" name="mapelMentor">
								<?php
								// Tampilkan pilihan program dari database
								while ($row = $resultMapell->fetch_assoc()) {
									echo "<option value=\"" . $row["id_mapel"] . "\">" . $row["nama"] . "</option>";
								}
								?>
							</select>
							<label style="position: relative; top: 10px;" for="image">Upload Foto:</label>
							<input type="file" id="image" name="image" accept="image/*">
							<div class="button-container">
								<button class="cancel-button" onclick="tutupPopupMentor()">Batal</button>
								<button class="save-button" type="submit" name="submit_mentor">Simpan Mentor</button>

							</div>
						</form>
					</div>
				</div>
				<?php

				include 'php/koneksi.php';

				$queryJadwal = "SELECT jadwal.hari, jadwal.jam, mapel.nama AS nama_mapel, module.nama_module, mentor.nama AS nama_mentor
				FROM jadwal
				JOIN module ON jadwal.id_module = module.id_module
				JOIN mapel ON module.id_mapel = mapel.id_mapel
				JOIN mentor ON mapel.id_mapel = mentor.id_mapel";

				$resultJadwal = $conn->query($queryJadwal);
				?>
				<div class="content-box" style="position: relative; bottom: 20px;">
				<p style="position: relative; top: 10px;">Jadwal Pertemuan <button style="position: relative; top: 10px; left: 570px; height: 40px; " onclick="tampilkanPopup()">Tambah Jadwal</button></p>
					<button style="position: relative; bottom: 20px; left: 600px; height: 40px; " onclick="tampilkanPopupModule()">Tambah Module</button>
					<br />
					<table>
						<tr>
							<th>Hari</th>
							<th>Jam</th>
							<th>Mapel</th>
							<th>Materi</th>
							<th>Mentor</th>
						</tr>
						<?php
						if ($resultJadwal->num_rows > 0) {
							while ($row = $resultJadwal->fetch_assoc()) {
								echo "<tr>";
								echo "<td>" . $row["hari"] . "</td>";
								echo "<td>" . $row["jam"] . "</td>";
								echo "<td>" . $row["nama_mapel"] . "</td>";
								echo "<td>" . $row["nama_module"] . "</td>";
								echo "<td>" . $row["nama_mentor"] . "</td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td colspan='5'>Tidak ada data jadwal.</td></tr>";
						}
						?>
					</table>
				</div>

				<?php
				$query = "SELECT mentor.nama AS nama_mentor, mapel.nama AS nama_mapel FROM mentor
				JOIN mapel ON mentor.id_mapel = mapel.id_mapel";

				$result = $conn->query($query);
				?>

				<div class="content-box" style="position: relative; background-color: #f2f2f2; bottom: 165px; left: 950px; width: 30%;">
					<p>Mentor <button style="position: relative; height: 30px; left: 80px;" onclick="tampilkanPopupMentor()">Tambah Mentor</button></p>
					<br />
					<table>
						<tr>
							<th>Mentor</th>
							<th>Mapel</th>
						</tr>
						<?php
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row["nama_mentor"] . "</td>";
							echo "<td>" . $row["nama_mapel"] . "</td>";
							echo "</tr>";
						}
						?>
					</table>
				</div>
			</div>
		</div>
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
	</script>

</body>

</html>