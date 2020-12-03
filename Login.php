<?php

require "ConnectionSettings.php";

//variables submitted by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];


if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

echo "Connected Successfully <br>";
ob_clean();

//$sql = "SELECT password, id FROM users WHERE username = '".$loginUser."'";

//$result = $conn->query($sql);

//PREPARED STATEMENT
$sql = "SELECT password, id FROM users WHERE username = ?";
$statement = $conn->prepare($sql);
$statement->bind_param("s", $loginUser);

$statement->execute();
$result = $statement->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row["password"] == $loginPass){
            echo $row["id"];
            //Get User Data

        }else{
            echo "Wrong Credentials";
        }
        
    }
}else{
    echo "Username does not exist";
}
$conn->close();
?>