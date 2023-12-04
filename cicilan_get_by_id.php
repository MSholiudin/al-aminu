<?php
include "php/koneksi.php";

if (isset($_GET['id_pembayaran'])) {
    $idPembayaran = $_GET['id_pembayaran'];

    $query = "SELECT nyicil, bulan, tanggal_nyicil FROM cicilan WHERE id_pembayaran='$idPembayaran'";
    $result = $conn->query($query);

    echo "<table id='tableCicilan'>";
    echo "<h2>Tabel Cicilan</h2>";
    echo "<thead>";
    echo "<tr><th>Bulan</th> <th>Jumlah Bayar</th> <th>Tanggal Bayar</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["bulan"] . "</td>";
        echo "<td>" . $row["nyicil"] . "</td>";
        echo "<td>" . $row["tanggal_nyicil"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

$conn->close();
?>
