<?php

require "ConnectionSettings.php";

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

echo "Connected Successfully, Here are the users: <br><br>";


$sql = "SELECT username, level FROM users";

$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "username: " .$row["username"]. " - level: ".$row["level"]. "<br>";
    }
}else{
    echo "0 results";
}
$conn->close();
?>