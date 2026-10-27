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

    echo "<a href='input/index.html'>Input</a>";
    if ($result->num_rows > 0) {
        echo "<table border='1px'><tr>
        <th>Kecamatan</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["kecamatan"]."</td><td>".
            $row["luas"]."</td><td align='right'>".
            $row["jumlah_penduduk"]."</td></tr>";
            }
        echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>