<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'dbadmin');
    define('DB_PASS', 'kamiserver');
    define('DB_NAME', 'digitalprintingdb');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    } 
    // else {
    //     echo "Terkoneksi";
    // }
?>