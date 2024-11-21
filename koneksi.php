<?php
$host = "DESKTOP-7J8U2B0"; // Ganti dengan host server SQL Anda
$connInfo = array("Database" => "prakwebdb", "UID" => "", "PWD" => "");
$conn = sqlsrv_connect($host, $connInfo);

if (!$conn) {
    die("Koneksi gagal: " . print_r(sqlsrv_errors(), true));
}
?>
