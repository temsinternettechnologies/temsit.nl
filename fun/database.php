<?php
$servername = "localhost";
$username = "temsit";
$password = "QuintIan055";



try {
    $conn = new PDO("mysql:host=$servername;dbname=temsit", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
