<?php
ini_set('display_errors', 1);

$sendData = $_POST['array'];

$ip = "localhost";
$userName = "root";
$dbName = "test1";
$pass = "root";

$dbconn = mysqli_connect($ip, $userName, $pass, $dbName) or die("Unable to connect to DB");
foreach($sendData as $element){
    $sql = "INSERT INTO `form` (`name`, `lastName`, `birthday`, `IIN`, `telephone`, `email`, `adress`) 
    values ('$element[0]', '$element[1]', '$element[2]', '$element[3]', '$element[4]', '$element[5]', '$element[6]')";
    
    $query = mysqli_query($dbconn, $sql);
    echo mysqli_error($dbconn);
}


?>
