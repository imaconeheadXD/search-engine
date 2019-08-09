<?php
ob_start();

try {
    $con = new PDO("mysql:dbname=search;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOExeption $e) {
    echo "Error: " . $e->getMessage();
}
?>