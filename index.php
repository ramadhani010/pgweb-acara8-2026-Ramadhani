<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihan8";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    $sql = "SELECT * FROM penduduk";
    $result = $conn->query($sql);

    echo "<h1>Data Penduduk</h1>";    
    // Input dari modul sebelumnya
    echo "<a href='input/index.html'>Input</a>";

    // Tabel dari modul Delete dan Edit
    if ($result->num_rows > 0) {

        echo "<table border='1px'><tr>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
        <th colspan='2'>Aksi</th>";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["kecamatan"]."</td>".
            "<td>".$row["longitude"]."</td>".
            "<td>".$row["latitude"]."</td>".
            "<td>".$row["luas"]."</td>".
            "<td align='right'>".$row["jumlah_penduduk"]."</td>".
            "<td><a href=delete.php?id=".$row["id"].">hapus</a></td>".
            "<td><a href=edit/index.php?id=".$row["id"].">edit</a></td>".
            "</tr>";
        }

        echo "</table>";

    } else {
        echo "0 results";
    }
?>