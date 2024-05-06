<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "to-do-list";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Sélectionner la base de données
    $conn->query("USE $db_name");
} catch(PDOException $e) {
    echo "Connection failed! : " . $e->getMessage();
}
?>
