<!DOCTYPE html>
<html>
<head>
	<title>Bimbingan Belajar Al-Amin</title>

	<!--Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

	<!-- feather icon -->
	<script src="https://unpkg.com/feather-icons"></script>
	

	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

	<!-- my style -->
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<!-- Navbar start -->
	<nav  class="navbar">
		<a href="#" class="navbar-logo" ><img src="img/Vector 161.png" style="height: 50px; position: relative; right: 20px; top: 8px;"><span style="color: #444E96;">Al</span>-Amin</a>
		

		<div class="navbar-nav">
			<a href="#home">Home</a>
			<a href="#about">Tentang Kami</a>
			<a href="#slide">Program</a>
			<a href="#swiper">Kata Mereka</a>
			<a href="#contact">Kontak</a>
		</div>

		<div class="navbar-extra">
			<a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
		</div>
		

	</nav>
	<!-- Navbar End -->

	<!-- Hero section start -->
	<section class="hero" id="home" style="background-image: url('img/Desktop\ -\ 3.png');">
		<main class="content">
			<div class="hero-content">
				<h1 class="home1">Mari Belajar di Bimbel <span style="color: #444E96;">Al-Amin</span></h1>
				<a href="daftar.php" class="cta" style="position: relative; bottom: 40px; right:20px ; height: 100px; width: 430px; font-size: 10mm;">Daftar Sekarang</a>
			</div>
		</main>
	</section>
	<!-- Hero section end -->
	<style>
		.changing-text {
			font-size: 20px;
		}
	</style>

	<div class="changing-text" id="text-container">
		<span id="text1" style="font-size: 15mm; position: relative; top: 65px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: #068FFF;"><b>SELAMAT DATANG DI BIMBLE AL-AMIN</b></span>
		<span id="text2" style="display: none; position: relative; top: 65px; font-size: 15mm; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: #068FFF;">BIMBEL TERBAIK DAN TERPECAYA</span>
	</div>
	<script>
    // JavaScript to switch between sentences
    document.addEventListener('DOMContentLoaded', function () {
    	var textContainer = document.getElementById('text-container');
    	var text1 = document.getElementById('text1');
    	var text2 = document.getElementById('text2');

    	setInterval(function () {
    		if (text1.style.display === '' || text1.style.display === 'block') {
    			text1.style.display = 'none';
    			text2.style.display = 'block';
    		} else {
    			text1.style.display = 'block';
    			text2.style.display = 'none';
    		}
        }, 5000); // Change sentences every 5 seconds (adjust as needed)
    });
</script>
<!-- About section start -->
<section id="about" class="about">
	<h2 style="color: black;">Tentang <span style="color: black;">Kami</span></h2>

	<div class="row">
		<div class="about-img">
			<img src="img/tentang-kami.jpg" alt="Tentang Kami">
		</div>
		<div class="content">
			<h3>Kenapa memilih bimbel kami?</h3>
			<p>"Bimbingan belajar adalah proses yang membantu siswa mencapai potensi akademiknya melalui metode pembelajaran yang terstruktur dan dukungan guru yang berpengalaman."</p>
			<p>"Bimbingan belajar adalah proses pendampingan siswa dalam memahami materi pelajaran, meningkatkan keterampilan, dan mencapai prestasi akademik yang maksimal melalui metode belajar yang efektif dan motivasi yang tinggi."</p>
		</div>
	</div>
</section>
<!-- About section end -->

<!-- Menu geser start -->
<section id="slide" class="slide">
	<h2 style="color: black;"><span style="color: black;">Pogram</span> Kami</h2>
	<div class= "card-row">
		<?php
		// Sertakan file koneksi
		include 'php/koneksi.php';

		// Ambil data dari tabel paket_program
		$query = "SELECT id_program, nama_program, harga, deskripsi FROM paket_program";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
		// Ambil nilai dari setiap kolom
				$id_program = $row['id_program'];
				$nama_program = $row['nama_program'];
				$harga = $row['harga'];
				$deskripsi = $row['deskripsi'];

		// Tampilkan data dalam format HTML
				echo "<div class='card' href='bayar.php'>";
				echo "<a href='pembayaran.php?id_program=$id_program'>";
				echo "<img src='img/1.jpg' style='height: 250px;'>";
				echo "<h3>$nama_program</h3>";
				echo "<h4>Rp $harga</h4>";
				echo "<p>$deskripsi</p>";
				echo "</div>";
			}
		} else {
			echo "Tidak ada data yang ditemukan.";
		}

// Tutup koneksi
		$conn->close();
		?>

	</div>
</section>

<!-- Menu geser end -->

<!-- Kata guru -->
<section id="swiper" class="swiper mySwiper">
	<h2 style="color: black;"><span style="color: black;">Kata</span> Mereka</h2>
	<div class="swiper-wrapper">
		<div class="card swiper-slide">
			<div class="card_image">
				<img src="img/1.jpg" alt="card image">
			</div>

			<div class="card_content">
				<span class="card_title">Web Designer</span>
				<span class="card_name">Joko Suteno</span>
				<p class="card_text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sapiente distinctio laboriosam debitis nesciunt amet omnis perferendis velit totam. Ullam?
				</p>
			</div>
		</div>
		<div class="card swiper-slide">
			<div class="card_image">
				<img src="img/1.jpg" alt="card image">
			</div>

			<div class="card_content">
				<span class="card_title">Web Designer</span>
				<span class="card_name">Joko Suteno</span>
				<p class="card_text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sapiente distinctio laboriosam debitis nesciunt amet omnis perferendis velit totam. Ullam?
				</p>
			</div>
		</div>
		<div class="card swiper-slide">
			<div class="card_image">
				<img src="img/1.jpg" alt="card image">
			</div>

			<div class="card_content">
				<span class="card_title">Web Designer</span>
				<span class="card_name">Joko Suteno</span>
				<p class="card_text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sapiente distinctio laboriosam debitis nesciunt amet omnis perferendis velit totam. Ullam?
				</p>
			</div>
		</div>
		<div class="card swiper-slide">
			<div class="card_image">
				<img src="img/1.jpg" alt="card image">
			</div>

			<div class="card_content">
				<span class="card_title">Web Designer</span>
				<span class="card_name">Joko Suteno</span>
				<p class="card_text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sapiente distinctio laboriosam debitis nesciunt amet omnis perferendis velit totam. Ullam?
				</p>
			</div>
		</div>
		<div class="card swiper-slide">
			<div class="card_image">
				<img src="img/1.jpg" alt="card image">
			</div>

			<div class="card_content">
				<span class="card_title">Web Designer</span>
				<span class="card_name">Joko Suteno</span>
				<p class="card_text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Et sapiente distinctio laboriosam debitis nesciunt amet omnis perferendis velit totam. Ullam?
				</p>
			</div>
		</div>
	</div>
</section>
<!-- Kata guru -->

<!-- Contact Section start -->
<section id="contact" class="contact">
	<h2 style="color: black;">Kontak <span style="color: black;">Kami</span></h2>
	<p>Program bimbel menyediakan guru terampil, materi berkualitas, latihan intensif, dan dukungan</p>

	<div class="row">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.8768413754265!2d112.78839377401002!3d-7.588381774976909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7db93e860a927%3A0x8c3581b946529457!2sBimbel%20Al%20Amin!5e0!3m2!1sid!2sid!4v1696431174104!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

		<form action="">
			<div class="input-group">
				<i data-feather="user"></i>
				<input type="text" placeholder="nama">
			</div>
			<div class="input-group">
				<i data-feather="mail"></i>
				<input type="text" placeholder="e-mail">
			</div>
			<div class="input-group">
				<i data-feather="phone"></i>
				<input type="text" placeholder="No HP">
			</div>
			<button type="submit" class="btn">kirim pesan</button>
		</form>
	</div>
</section>
<!-- Contact Section end -->

<!-- Footer start -->
<footer>
	<div class="socials">
		<a href="https://www.instagram.com/bimbel.al.amin?igshid=MW9qdjhxOXp5aG9ubQ%3D%3D"><i data-feather="instagram"></i></a>
		<a href="#"><i data-feather="twitter"></i></a>
		<a href="#"><i data-feather="facebook"></i></a>
	</div>

	<div class="links">
		<a href="#home">Home</a>
		<a href="#about">Tentang Kami</a>
		<a href="#slide">Program</a>
		<a href="#swiper">Kata Mereka</a>
		<a href="#contact">Kontak</a>
	</div>

	<div class="credit">
		<p>Created by <a href="">Choll</a>. | &copy; 2023.</p>
	</div>
</footer>
<!-- Footer end -->

<!-- feather icon -->
<script>
	feather.replace();
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".mySwiper", {
		effect: "coverflow",
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: "auto",
		coverflowEffect: {
			rotate: 0,
			stretch: 0,
			depth: 300,
			modifier: 1,
			slideShadows: false,
		},
		pagination: {
			el: ".swiper-pagination",
		},
	});
</script>

<!-- My Javascript -->
<script src="js/script.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	document.addEventListener('DOMContentLoaded', function () {
		var swiper = new Swiper(".mySwiper", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			coverflowEffect: {
				rotate: 0,
				stretch: 0,
				depth: 300,
				modifier: 1,
				slideShadows: false,
			},
			autoplay: {
        delay: 5000, // Ganti dengan durasi yang diinginkan (dalam milidetik)
        disableOnInteraction: false,
    },
    pagination: {
    	el: ".swiper-pagination",
    },
});
	});
</script>