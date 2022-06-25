<?php
ini_set('display_errors', 1);

$sendData = $_POST['array'];

$ip = "localhost";
$userName = "root";
$dbName = "test1";
$pass = "root";
   
$dbconn = mysqli_connect($ip, $userName, $pass, $dbName) or die("Unable to connect to DB");


$sql = "SELECT * FROM form";
$result = mysqli_query($dbconn, $sql);

$q = mysqli_fetch_all($result);

echo json_encode($q);


?>