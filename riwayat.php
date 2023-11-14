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
	<span style="font-size:30px;cursor:pointer; color: black;" class="nav"  >Riwayat</span>
	<span style="font-size:30px;cursor:pointer; color: black;" class="nav2"  >☰ Riwayat</span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">

			<img src="images/user.png" class="pro-img" />
			<p style="color: #748DA6;">M fajar dwi p <span>Admin</span></p>
			<i class="fa fa-regular fa-bell"style="position: relative; right: 30%; bottom: 43px;"></p></i>
		</div>
	</div>
	</div>
	<div id="popup" class="popup">
		<div class="popup-content">
			<span class="close" onclick="closePopup()">&times;</span>
		  <p>Tekan ini</p>
		</div>
	  </div>

		<div class="clearfix"></div>
		<div class="col-div-81" style="position: relative; bottom: 20px; left: 20px;">
			<div class="box-9" style="height: 630px;">
			<div class="content-box">
				<p>Murid <span>Cari</span></p>
				<br/>
				<table >
	  <tr>
	    <th>Nama</th>
	    <th>No.hp</th>
	    <th>Kelas</th>
		<th>Cicilan</th>
		<th>Status</th>
	  </tr>
	  <tr>
	    <td>Alfreds Futterkiste</td>
	    <td>Maria Anders</td>
	    <td>Germany</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>
		  </td>
	  </tr>
	  <tr>
	    <td>Centro comercial Moctezuma</td>
	    <td>Francisco Chang</td>
	    <td>Mexico</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>
		  </td>
	  </tr>
	  <tr>
	    <td>Ernst Handel</td>
	    <td>Roland Mendel</td>
	    <td>Austria</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>
		  </td>
	  </tr>
	  <tr>
	    <td>Island Trading</td>
	    <td>Helen Bennett</td>
	    <td>UK</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>
		  </td>
	  </tr>
      <tr>
	    <td>Island Trading</td>
	    <td>Helen Bennett</td>
	    <td>UK</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>
		  </td>
	  </tr>
      <tr>
	    <td>Island Trading</td>
	    <td>Helen Bennett</td>
	    <td>UK</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>
		  </td>
	  </tr>
      <tr>
	    <td>Island Trading</td>
	    <td>Helen Bennett</td>
	    <td>UK</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>
	  </tr>
      <tr>
	    <td>Island Trading</td>
	    <td>Helen Bennett</td>
	    <td>UK</td>
		<td>Germany</td>
		<td>
			<button class="view-button" onclick="viewRow(this)">Cetak</button>
			<button class="delete-button" onclick="deleteRow(this)">Hapus</button>

		  </td>
	  </tr>
	  
	</table>
			</div>
		</div>
		</div>


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

	</body>


	</html>