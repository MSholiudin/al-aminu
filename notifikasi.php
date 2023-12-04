<!Doctype HTML>
<html>

<head>
	<title>Notifikasi</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div id="mySidenav" class="sidenav">
		<p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
		<a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
		<a href="jadwal.php" class="icon-a"><i class="fa fa-calendar icons"></i> Jadwal</a>
		<a href="murid.php" class="icon-a"><i class="fa fa-users icons"></i> Murid</a>
		<a href="cicilan.php" class="icon-a"><i class="fa fa-credit-card"></i> Cicilan</a>
		<a href="riwayat.php" class="icon-a"><i class="fa fa-list-alt icons"></i> Riwayat</a>
		<a href="notifikasi.php" class="icon-a"><i class="fa fa-regular fa-bell"></i> Notifikasi</a>

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
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav">Notifikasi</span>
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav2">☰ Notifikasi</span>
			</div>
			<div class="col-div-6">
				<div class="profile">
				</div>
			</div>
		</div>
		<div id="popup" class="popup">
			<div class="popup-content">
				<span class="close" onclick="closePopup()">&times;</span>
				<p>Tekan ini</p>
			</div>
		</div>

		<?php

		// Include your database connection file
		include('php/koneksi.php');

		// Your SQL query
		$sql = "SELECT data_pengguna.nama, cicilan.bulan, cicilan.tanggal_nyicil, cicilan.nyicil, cicilan.status
		FROM data_pengguna JOIN cicilan ON data_pengguna.id_pengguna=cicilan.id_pengguna";

		// Execute the query
		$result = mysqli_query($conn, $sql);

		// Check if the query was successful
		if ($result) {
			echo '
			<div class="col-div-81" style="position: relative; top: 30px; left: 20px;">
			<div class="box-9" style="height: 630px;">
				<div class="content-box">
			<table style="top: 10px; position: relative;">
			<tr>
			<th>Nama</th>
			<th>Bulan</th>
			<th>Tanggal Cicilan</th>
			<th>Pembayaran Cicilan</th>
			<th>Action</th>
			</tr>';


			// Fetch data and generate table rows
			while ($row = mysqli_fetch_assoc($result)) {
				echo '
				<tr>
				<td>' . $row['nama'] . '</td>
				<td>' . $row['bulan'] . '</td>
				<td class="tanggal-nyicil">' . $row['tanggal_nyicil'] . '</td>
				<td>' . $row['nyicil'] . '</td>
				<td>
				<button class="view-button" onclick="konfirmasiRow(this)">Konfirmasi</button>
				<button class="delete-button" onclick="hapusRow(this)">Hapus</button>
				</td>
				</tr>';
			}

			echo '</table>';
		} else {

			// Handle the case where the query fails
			echo 'Error executing the query: ' . mysqli_error($conn);
		}

		// Close the database connection (assuming you have a $conn variable in koneksi.php)
		mysqli_close($conn);
		?>

		<script>
			function konfirmasiRow(button) {
    // Dapatkan data baris yang sesuai dengan tombol Konfirmasi yang diklik
    var row = button.parentNode.parentNode;

    // Dapatkan data dari kolom ketiga (tanggal_nyicil)
    var tanggalNyicil = row.cells[2].innerHTML;
    // Konfirmasi sebelum mengonfirmasi cicilan
    var confirmKonfirmasi = confirm("Apakah Anda yakin ingin mengonfirmasi cicilan ini?");

    if (confirmKonfirmasi) {
        // Kirim permintaan AJAX untuk mengonfirmasi cicilan
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        	if (xhr.readyState == 4 && xhr.status == 200) {
                // Tanggapi dari server setelah mengonfirmasi
                console.log(xhr.responseText);
                // Refresh halaman atau lakukan tindakan lain jika diperlukan
                location.reload();
            }
        };
        xhr.open('GET', 'cicilan_konfirmasi.php?tanggal_nyicil=' + tanggalNyicil, true);
        xhr.send();
    }
}


function hapusRow(button) {
    // Dapatkan data baris yang sesuai dengan tombol Hapus yang diklik
    var row = button.parentNode.parentNode;

    // Dapatkan data dari kolom ketiga (tanggal_nyicil)
    var tanggalNyicil = row.cells[2].innerHTML;

    // Konfirmasi sebelum menghapus cicilan
    var confirmDelete = confirm("Apakah Anda yakin ingin menghapus cicilan ini?");

    if (confirmDelete) {
        // Kirim permintaan AJAX untuk menghapus cicilan
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        	if (xhr.readyState == 4 && xhr.status == 200) {
                // Tanggapi dari server setelah menghapus
                console.log(xhr.responseText);
                // Refresh halaman atau lakukan tindakan lain jika diperlukan
                location.reload();
            }
        };
        xhr.open('GET', 'cicilan_hapus.php?tanggal_nyicil=' + tanggalNyicil, true);
        xhr.send();
    }
}

</script>




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

</body>

</html>