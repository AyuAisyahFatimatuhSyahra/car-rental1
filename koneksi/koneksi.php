<?php
declare(strict_types=1);
    $user = 'root';
    $pass = 'root';

    try {
    $koneksi = new PDO("mysql:host=localhost:8889;dbname=mobing", $user, $pass);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

    global $url;
    $url = "http://localhost:8000/";

    $sql_web = "SELECT * FROM infoweb WHERE id = 1";
    $row_web = $koneksi->prepare($sql_web);
    $row_web->execute();
    global $info_web;
    $info_web = $row_web->fetch(PDO::FETCH_OBJ);

    error_reporting(0);
?>