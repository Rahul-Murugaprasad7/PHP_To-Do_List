<?php

$sName = "localhost";
$uName = "root";
$pass = "Rahul@2003";
$db_name = "to_do_list";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name",
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Failed !!! ". $e->getMessage();
}

?>