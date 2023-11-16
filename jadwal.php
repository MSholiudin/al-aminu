<!Doctype HTML>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>
		
		<div id="mySidenav" class="sidenav">
			<p class="logo" style="position: relative; right: 5px;"><span>AL</span>-AMIN</p>
			<a href="index.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   Dashboard</a>
			<a href="jadwal.php"class="icon-a"><i class="fa fa-user icons"></i>   Jadwal</a>
			<a href="murid.php"class="icon-a"><i class="fa fa-users icons"></i>   Murid</a>
			<a href="pemesanan.php"class="icon-a"><i class="fa fa-list icons"></i>   Pemesanan</a>
			<a href="riwayat.php"class="icon-a"><i class="fa fa-list-alt icons"></i>  Riwayat</a>
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
			  var options = { year: 'numeric', month: 'long', day: 'numeric' };
			  var formattedDate = today.toLocaleDateString(undefined, options);
			  document.getElementById('tanggal').textContent += formattedDate;
			};
		  </script>
	

	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: black;" class="nav"  >Jadwal</span>
	<span style="font-size:30px;cursor:pointer; color: black;" class="nav2"  >☰ Jadwal</span>
	</div>
	
		
		<div class="col-div-6">
		<div class="profile">

			<img src="images/user.png" class="pro-img" />
			<p style="color: #748DA6;">M fajar dwi p <span>Admin</span></p>
			<i class="fa fa-regular fa-bell"style="position: relative; right: 30%; bottom: 43px;"></p></i>
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
		<div id="container">
			<!-- tambahkan tabel jadwal yang telah dibuat sebelumnya -->
			<table class="tabel-jadwal">
			<thead>
			<tr>
			<th>Hari</th>
			<th>Jam</th>
			<th>Mapel</th>
			<th>Aksi</th>
			</tr>
			</thead>
			<tbody id="isi-tabel">
			<tr>
			<td>Senin</td>
			<td>08.00 - 09.40</td>
			<td>Matematika</td>
			<td><button class="tombol">Hapus</button></td>
			</tr>
			<tr>
			<td>Senin</td>
			<td>10.00 - 11.40</td>
			<td>Bahasa Indonesia</td>
			<td><button class="tombol">Hapus</button></td>
			</tr>
			<tr>
			<td>Selasa</td>
			<td>08.00 - 09.40</td>
			<td>IPA</td>
			<td><button class="tombol">Hapus</button></td>
			</tr>
			<tr>
			<td>Selasa</td>
			<td>10.00 - 11.40</td>
			<td>IPS</td>
			<td><button class="tombol">Hapus</button></td>
			</tr>
			</tbody>
			</table>
			<!-- tambahkan tag <select> dengan atribut id="select_1" dan onchange="ubahTabel()" -->
			
			</div>
         <script>

            function saveChanges() {
                // Dapatkan nilai dari input
                const day = document.getElementById("dayInput").value;
                const time = document.getElementById("timeInput").value;
                const activity = document.getElementById("activityInput").value;

                // Validasi input di sini jika diperlukan
                // Misalnya, pastikan input tidak kosong

                // Perbarui jadwal dengan nilai-nilai yang diambil
                const currentSchedule = scheduleData[currentIndex];
                currentSchedule.day = day;
                currentSchedule.time = time;
                currentSchedule.activity = activity;

                // Perbarui tampilan tabel
                const rows = schedule
				function ubahTabel() {
  // mengambil nilai yang dipilih
  var pilihan = document.getElementById("select_1").value;
  // menghapus semua baris yang ada
  document.getElementById("isi-tabel").innerHTML = "";
  // menambahkan baris-baris baru sesuai dengan pilihan
  if (pilihan == "a") {
    // jika pilihan adalah Senin
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Senin</td><td>08.00 - 09.40</td><td>Matematika</td><td><button class='tombol'>Hapus</button></td></tr>");
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Senin</td><td>10.00 - 11.40</td><td>Bahasa Indonesia</td><td><button class='tombol'>Hapus</button></td></tr>");
  } else if (pilihan == "b") {
    // jika pilihan adalah Selasa
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Selasa</td><td>08.00 - 09.40</td><td>IPA</td><td><button class='tombol'>Hapus</button></td></tr>");
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Selasa</td><td>10.00 - 11.40</td><td>IPS</td><td><button class='tombol'>Hapus</button></td></tr>");
  } else if (pilihan == "c") {
    // jika pilihan adalah Rabu
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Rabu</td><td>08.00 - 09.40</td><td>PKN</td><td><button class='tombol'>Hapus</button></td></tr>");
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Rabu</td><td>10.00 - 11.40</td><td>Seni Budaya</td><td><button class='tombol'>Hapus</button></td></tr>");
  } else if (pilihan == "d") {
    // jika pilihan adalah Kamis
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Kamis</td><td>08.00 - 09.40</td><td>Agama</td><td><button class='tombol'>Hapus</button></td></tr>");
    document.getElementById("isi-tabel").insertAdjacentHTML("beforeend", "<tr><td>Kamis</td><td>10.00 - 11.40</td><td>Penjas</td><td><button class='tombol'>Hapus</button></td></tr>");
  }
  // menyesuaikan warna latar belakang, teks, dan tombol pada setiap baris
  var baris = document.getElementById("isi-tabel").rows;
  for (var i = 0; i < baris.length; i++) {
    // warna latar belakang bergantian antara putih dan abu-abu
    if (i % 2 == 0) {
      baris[i].style.backgroundColor = "#fff";
    } else {
      baris[i].style.backgroundColor = "#f0f0f0";
    }
    // teks pada kolom mapel berwarna biru
    baris[i].cells[2].style.color = "#00f";
    // tombol pada kolom aksi berwarna merah dan memiliki fungsi hapusBaris
    baris[i].cells[3].children[0].style.backgroundColor = "#f00";
    baris[i].cells[3].children[0].setAttribute("onclick", "hapusBaris(this)");
  }
}

// fungsi untuk menghapus baris yang dipilih
function hapusBaris(tombol) {
  // mendapatkan indeks baris yang akan dihapus
  var indeks = tombol.parentNode.parentNode.rowIndex;
  // menghapus baris dari tabel
  document.getElementById("isi-tabel").deleteRow(indeks);
}

			}

		
			changeScheduleButton.addEventListener("click", changeSchedule);
		</script>
		
		
	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>

	  $(".nav").click(function(){
	    $("#mySidenav").css('width','70px');
	    $("#main").css('margin-left','70px');
	    $(".logo").css('visibility', 'hidden');
	    $(".logo span").css('visibility', 'visible');
	     $(".logo span").css('margin-left', '-10px');
	     $(".icon-a").css('visibility', 'hidden');
	     $(".icons").css('visibility', 'visible');
	     $(".icons").css('margin-left', '-8px');
	      $(".nav").css('display','none');
	      $(".nav2").css('display','block');
	  });

	$(".nav2").click(function(){
	    $("#mySidenav").css('width','300px');
	    $("#main").css('margin-left','300px');
	    $(".logo").css('visibility', 'visible');
	     $(".icon-a").css('visibility', 'visible');
	     $(".icons").css('visibility', 'visible');
	     $(".nav").css('display','block');
	      $(".nav2").css('display','none');
	 });

	</script>
	<script>
		function updateDateTime() {
			var today = new Date();
			var options = { year: 'numeric', month: 'long', day: 'numeric' };
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