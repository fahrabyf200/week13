<?php
include('koneksi.php');

$aksi = $_GET['aksi'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

if ($aksi == 'tambah') {
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
    $params = array($nama, $jenis_kelamin, $alamat, $no_telp);

    $stmt = sqlsrv_query($conn, $query, $params);
    if ($stmt) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan data: " . print_r(sqlsrv_errors(), true);
    }
} elseif ($aksi == 'ubah') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "UPDATE anggota SET nama = ?, jenis_kelamin = ?, alamat = ?, no_telp = ? WHERE id = ?";
        $params = array($nama, $jenis_kelamin, $alamat, $no_telp, $id);

        $stmt = sqlsrv_query($conn, $query, $params);
        if ($stmt) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal mengupdate data: " . print_r(sqlsrv_errors(), true);
        }
    } else {
        echo "ID tidak valid.";
    }
} elseif ($aksi == 'hapus') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM anggota WHERE id = ?";
        $params = array($id);

        $stmt = sqlsrv_query($conn, $query, $params);
        if ($stmt) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menghapus data: " . print_r(sqlsrv_errors(), true);
        }
    } else {
        echo "ID tidak valid.";
    }
} else {
    header("Location: index.php");
}

sqlsrv_close($conn);
?>
