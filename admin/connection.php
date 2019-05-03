<?php
$servername = "localhost";
$username = "root";
$password = "";
//https://sg2nlsmysqladm1.secureserver.net/grid55/3/index.php?lang=en-utf-8&token=941ba4c9762388f9932f6f79c0ff11b8
// $username = "acenroll";
// $password = "ACenroll@123";

try {
    $con = new PDO("mysql:host=$servername;dbname=enroll", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
