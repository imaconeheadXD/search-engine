<?php
ob_start();

try {
    $con = new PDO("mysql:host=149.4.211.180;dbname=lidi5680", "lidi5680", "23135680");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOExeption $e) {
    echo "Error: " . $e->getMessage();
}
?>