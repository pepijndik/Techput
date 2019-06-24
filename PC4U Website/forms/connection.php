<?php   
$servername = "localhost";
$username = "root";
$password = "Daq1Stappels";
$id= $_SESSION['id'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=pc4u", $username, $password); /* making a new connection witht the database*/
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>