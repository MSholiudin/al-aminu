<?php
// Sambungkan ke database
include "php/koneksi.php";

// Ambil query dari parameter GET
$query = $_GET["query"];

// Lakukan query pencarian
$result = $conn->query($query);

// Tampilkan hasil query sebagai tabel HTML
echo "<tr>
<th>Id_Pengguna</th>
<th>Nama</th>
<th>Email</th>
<th>Username</th>
<th>Password</th>
<th>No.Wa</th>
<th>Nama Program</th>
<th>Aksi </th>
</tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id_pengguna"] . "</td>";
    echo "<td>" . $row["nama"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["username"] . "</td>";
    echo "<td>" . $row["password"] . "</td>";
    echo "<td>" . $row["no_wa"] . "</td>";
    echo "<td>" . $row["nama_program"] . "</td>";
    echo "<td><button class='edit-button' onclick='editRow(this)'>Edit</button> <button class='delete-button' onclick='deleteRow(this)'>Hapus</button></td>";
    echo "</tr>";
}

// Tutup koneksi
$conn->close();
?>
