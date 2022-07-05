<?php
ini_set('display_errors', 1);

$updateData = $_POST['array'];

$ip = "localhost";
$userName = "root";
$dbName = "test1";
$pass = "root";
   
$dbconn = mysqli_connect($ip, $userName, $pass, $dbName) or die("Unable to connect to DB");



$sql = "UPDATE form SET name = '{$updateData[0][0]}', 
                        lastName = '{$updateData[0][1]}', 
                        birthday = '{$updateData[0][2]}',
                        IIN = '{$updateData[0][3]}', 
                        telephone = '{$updateData[0][4]}', 
                        email = '{$updateData[0][5]}',
                        adress = '{$updateData[0][6]}' WHERE id = '{$updateData[0][7]}'"; 

$query = mysqli_query($dbconn, $sql);
echo mysqli_error($dbconn);



?>