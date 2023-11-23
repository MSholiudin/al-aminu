<!Doctype HTML>
<html>

<head>
	<title>Jadwal Bimbel</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div id="mySidenav" class="sidenav">
		<p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
		<a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
		<a href="jadwal.php" class="icon-a"><i class="fa fa-user icons"></i> Jadwal</a>
		<a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
		<a href="pemesanan.php" class="icon-a"><i class="fa fa-list icons"></i> Pemesanan</a>
		<a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>
		<script>
			// Fungsi untuk menampilkan data pada baris tabel
			function viewRow(button) {
				document.getElementById("popup").style.display = "block";
			}

			// Fungsi untuk mengedit baris tabel
			function editRow(button) {
				// Dapatkan data baris yang akan diubah
				var row = button.parentNode.parentNode;

				// Misalnya, Anda dapat mengambil nilai dari kolom-kolom tabel
				var nama = row.cells[0].innerHTML;
				var nohp = row.cells[1].innerHTML;
				var kelas = row.cells[2].innerHTML;
				var cicilan = row.cells[3].innerHTML;
				var status = row.cells[4].innerHTML;

				// Lakukan operasi edit sesuai dengan kebutuhan Anda
				// Contoh: Tampilkan data yang akan diubah di popup
				document.getElementById("popup").style.display = "block";
				// Misalnya, isi nilai-nilai input di popup dengan data yang telah diambil
				// document.getElementById("namaInput").value = nama;
				// document.getElementById("nohpInput").value = nohp;
				// document.getElementById("kelasInput").value = kelas;
				// document.getElementById("cicilanInput").value = cicilan;
				// document.getElementById("statusInput").value = status;
			}

			// Fungsi untuk menghapus baris tabel
			function deleteRow(button) {
				// Dapatkan baris yang akan dihapus
				rowToDelete = button.parentNode.parentNode;
				// Tampilkan popup konfirmasi
				document.getElementById("popup").style.display = "block";
			}

			// Fungsi untuk menutup popup
			function closePopup() {
				document.getElementById("popup").style.display = "none";
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

		<div class="head">
			<div class="col-div-6">
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav">Jadwal</span>
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav2">☰ Jadwal</span>
			</div>


			<div class="col-div-6">
				<div class="profile">

					<img src="images/user.png" class="pro-img" />
					<p style="color: #748DA6;">M fajar dwi p <span>Admin</span></p>
					<i class="fa fa-regular fa-bell" style="position: relative; right: 30%; bottom: 43px;"></p></i>
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


			<div style="text-align: left; position: relative; bottom: 16px;" id="tanggal">Tanggal: </div>
			<div id="jam" style="position: relative; bottom: 16px;">Jam: </div>
		</div>
		<div class="clearfix"></div>
		<!-- buat sebuah button dengan id="btn-kalender" -->
		<!-- buat sebuah input dengan type="date" dan id="input-kalender" -->
		<button style="position: relative; left: 1050px;" class="tombol">Tambah Jadwal</button>
		<div class="col-div-8" style="position: relative; bottom: 40px;">
			<div class="box-8">
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
                    module ON jadwal.id_module = rps.id_module";

				$resultJadwal = $conn->query($queryJadwal);

				?>

				<div class="content-box">
					<p>Jadwal Harian <span>Tambah jadwal</span></p>
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

</body>


</html>