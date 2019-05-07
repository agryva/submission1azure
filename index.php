<?php
include 'connection.php';

$query = "SELECT * FROM dbo.gudang";
$stmt = sqlsrv_query($conn, $query);
if ($stmt) {} else {
    echo "<script>window.alert(\"Gagal Get Data\")</script>";
}

if (isset($_POST['submit'])) {
    $barang = $_POST['barang'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO dbo.gudang (nama_barang, harga, deskripsi) VALUES ('$barang', $harga, '$deskripsi')";
    $stmt = sqlsrv_query($conn, $query);
    if ($stmt) {
        echo "<script>window.alert(\"Sukses\")</script>";
        $querySelect = "SELECT * FROM dbo.gudang";
        $data = sqlsrv_query($conn, $querySelect);
        if ($data) {} else {
            echo "<script>window.alert(\"Gagal Get Data\")</script>";
        }
    } else {
        echo "<script>window.alert(\"Gagal Insert\")</script>";
    }
    sqlsrv_free_stmt( $stmt);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .content {
            margin: 20px 30px
        }
    </style>
</head>
<body>
<div class="content">
    <h2>Form Input Barang Gudang</h2>
    <p>Input barang yang akan masuk gudang dengan sesuai yang ada pada faktur!!</p>
    <form action="index.php" method="POST">
        <table>
            <tr>
                <td>Nama Barang :</td>
                <td><input type="text" name="barang"></td>
            </tr>
            <tr>
                <td>Harga :</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Deskripsi :</td>
                <td><textarea name="deskripsi" id="" cols="30" rows="10"></textarea></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit">
        <button type="button" name="reload" onclick="reloadClick()">Load Data</button>
    </form>


    <table style="margin-top: 20px; visibility: hidden;" border="1" id="reload">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Deskripsi Barang</th>
        </tr>
        <?php while ($row = sqlsrv_fetch_array($stmt)) : ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['nama_barang']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['deskripsi']?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<script>
    let reload = document.getElementById('reload');

    function reloadClick() {
        reload.style.visibility = "visible";
    }
</script>

</body>
</html>