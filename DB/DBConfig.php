<?php

$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=localhost:3306;dbname=excellent_taste",$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>