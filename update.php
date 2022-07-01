<?php
ini_set('display_errors', 1);

$updateData = $_POST['array'];

$ip = "localhost";
$userName = "root";
$dbName = "test1";
$pass = "root";
   
$dbconn = mysqli_connect($ip, $userName, $pass, $dbName) or die("Unable to connect to DB");
foreach($updateData as $element){
    $sql = "UPDATE `form` SET `name` = '$element[0]',
                              `lastName` = '$element[1]',
                              `birthday` = '$element[2]',
                              `IIN` = '$element[3]',
                              `telephone` = '$element[4]',
                              `email` = '$element[5]',
                              `adress` = '$element[6]'";
    
    $query = mysqli_query($dbconn, $sql);
    echo mysqli_error($dbconn);
}


?>