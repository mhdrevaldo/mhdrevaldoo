<!DOCTYPE html>
<html lang="en">
    <center><head> TUGAS KELOMPOK WEB1 </head></center>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Kelompok</title>
    <style>
        header {
            background-color: #4682b4;
            color: #fff;
            padding: 30px;
            text-align: center;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            width: 200px;
            height: 100%;
            background-color: #333;
            padding-top: 20px;
            position: fixed;
            top: 80px;
        }

        #sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            cursor: pointer;
        }

        #content {
            margin-left: 190px;
            padding: 16px;
        }

        #menu1-content,
        #menu2-content,
        #menu3-content{
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #713333;
            color: white;
        }
    </style>
    <script>
        function showContent(menuId) {
            // Menyembunyikan semua konten menu
            document.getElementById('menu1-content').style.display = 'none';
            document.getElementById('menu2-content').style.display = 'none';
            document.getElementById('menu3-content').style.display = 'none';
            // Menampilkan konten menu yang dipilih
            document.getElementById(menuId + '-content').style.display = 'block';
        }
    </script>
</head>
<body>

<div id="sidebar">
    <a onclick="showContent('menu1')">Input Data Barang</a>
    <a onclick="showContent('menu2')">Input Data Pelanggan</a>
    <a onclick="showContent('menu3')">Input Data Transaksi</a>
</div>

<div id="content">
    <center>
        <div id="menu1-content">
            <h3>DATA BARANG</h3>

            <form action="" method="post">
                <table>
                    <tr>
                        <td width="130">Kode Barang</td>
                        <td><input type="text" name="kode_barang"></td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td><input type="text" name="nama_barang"></td>
                    </tr>
                    <tr>
                        <td>Harga Barang</td>
                        <td><input type="text" name="harga_barang"></td>
                    </tr>
                    <tr>
                        <td>Satuan Barang</td>
                        <td>
                            <select name="satuan_barang">
                                <option value="unit">Unit</option>
                                <option value="kg">Kg</option>
                                <option value="liter">Liter</option>
                                <option value="box">Box</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="simpan" name="proses"></td>
                    </tr>
                </table>
            </form>

            <?php
            include "koneksi.php";

            if (isset($_POST['proses'])) {
                mysqli_query($koneksi, "INSERT INTO tbbarang SET
                kodebarang = '$_POST[kode_barang]',
                namabarang = '$_POST[nama_barang]',
                hargabarang = '$_POST[harga_barang]',
                satuan = '$_POST[satuan_barang]'");
                echo "Data Barang Baru Telah Di Input";
            }

            // Menampilkan data dari database
            $result = mysqli_query($koneksi, "SELECT * FROM tbbarang");
            ?>

            <table>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Satuan Barang</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['kodebarang']}</td>";
                    echo "<td>{$row['namabarang']}</td>";
                    echo "<td>{$row['hargabarang']}</td>";
                    echo "<td>{$row['satuan']}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <div id="menu2-content">
            <h3>DATA PELANGGAN</h3>
            <form action="" method="post">
                <table>
                    <tr>
                        <td width="130">Id Pelanggan</td>
                        <td><input type="text" name="id_pelanggan"></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td><input type="text" name="nama_pelanggan"></td>
                    </tr>
                    <tr>
                        <td>No hp</td>
                        <td><input type="text" name="no_hp"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="simpan" name="proses_pelanggan"></td>
                    </tr>
                </table>
            </form>

            <?php
            include "koneksi.php";

            if (isset($_POST['proses_pelanggan'])) {
                mysqli_query($koneksi, "INSERT INTO tbpelanggan SET
                idpelanggan = '$_POST[id_pelanggan]',
                namapelanggan = '$_POST[nama_pelanggan]',
                nohp = '$_POST[no_hp]'");
                echo "Data Pelanggan Baru Telah Di Input";
            }
            
            $result = mysqli_query($koneksi, "SELECT * FROM tbpelanggan");
            
            ?>

            <table>
                <tr>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>No hp</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['idpelanggan']}</td>";
                    echo "<td>{$row['namapelanggan']}</td>";
                    echo "<td>{$row['nohp']}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <div id="menu3-content">
        <h3>DATA TRANSAKSI</h3>
<form action="" method="post">
    <table>
        <tr>
            <td width="130">No Faktur</td>
            <td><input type="text" name="no_faktur"></td>
        </tr>
        <tr>
            <td>Kode Barang</td>
            <td><input type="text" name="kode_barang_transaksi"></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td><input type="text" name="harga_jual"></td>
        </tr>
        <tr>
            <td>Jumlah Jual</td>
            <td><input type="text" name="jumlah_jual"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan" name="proses_transaksi"></td>
        </tr>
    </table>
</form>

<?php
include "koneksi.php";

if (isset($_POST['proses_transaksi'])) {
    // Pastikan untuk menggunakan prepared statement untuk menghindari SQL injection
    $no_faktur = $_POST['no_faktur'];
    $kode_barang_transaksi = $_POST['kode_barang_transaksi'];
    $harga_jual = $_POST['harga_jual'];
    $jumlah_jual = $_POST['jumlah_jual'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO tbtransaksi (nofaktur, kodebarang, hargajual, jumlahjual) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssii", $no_faktur, $kode_barang_transaksi, $harga_jual, $jumlah_jual);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Data Transaksi Baru Telah Di Input";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}

$result_transaksi = mysqli_query($koneksi, "SELECT * FROM tbtransaksi");
?>

<table>
    <tr>
        <th>No Faktur</th>
        <th>Kode Barang</th>
        <th>Harga Jual</th>
        <th>Jumlah Jual</th>
    </tr>
    <?php
    while ($row_transaksi = mysqli_fetch_assoc($result_transaksi)) {
        echo "<tr>";
        echo "<td>{$row_transaksi['nofaktur']}</td>";
        echo "<td>{$row_transaksi['kodebarang']}</td>";
        echo "<td>{$row_transaksi['hargajual']}</td>";
        echo "<td>{$row_transaksi['jumlahjual']}</td>";
        echo "</tr>";
    }
    ?>
</table>

        </div>
        <footer>
      <p>&copy; Created BY **MHD>REVALDO**  **LILIS SABRINA HABIBAH** **Ari Purnawan**</p>
    </footer>