// Toggle class active
const navbarNav = document.querySelector('.navbar-nav');
// ketika hamburger menu di klik
document.querySelector('#hamburger-menu').onclick = () => {
	navbarNav.classList.toggle('active');
};

// clik diluar sidebar untuk menghilangkan nav

const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click', function (e) {
	if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
		navbarNav.classList.remove('active');
		
	}
});
const tanggalElement = document.querySelector("#tanggal-text");

function updateDate() {
  const currentDate = new Date();
  tanggalElement.innerText = currentDate.toDateString();
}

// Perbarui tanggal secara berkala, misalnya setiap detik
setInterval(updateDate, 1000);
updateDate();

// Fungsi untuk menampilkan popup

 