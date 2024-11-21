<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB1', 'prakwebdb');

// Create the connection
$koneksi = new mysqli(HOST, USER, PASS, DB1);

// Check for connection errors
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>
