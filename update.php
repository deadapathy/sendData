<?php
ini_set('display_errors', 1);

$sendData = $_POST['array'];

$ip = "localhost";
$userName = "root";
$dbName = "test1";
$pass = "root";
   
$dbconn = mysqli_connect($ip, $userName, $pass, $dbName) or die("Unable to connect to DB");


if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM form WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $username = $row["name"];
                $userlastName = $row["lastName"];
            }
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Имя:
                    <input type='text' name='name' value='$username' /></p>
                    <p>Возраст:
                    <input type='text' name='lastName' value='$userlastName' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["lastName"])) {
      
    $userid = $conn->real_escape_string($_POST["id"]);
    $username = $conn->real_escape_string($_POST["name"]);
    $userlastName = $conn->real_escape_string($_POST["lastName"]);
    $sql = "UPDATE form SET name = '$username', lastName = '$userlastName' WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        header("Location: index.html");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
?>