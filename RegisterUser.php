<?php

require "ConnectionSettings.php";

//variables submitted by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];




if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

echo "Connected Successfully <br>";


$sql = "SELECT username FROM users WHERE username = '".$loginUser."'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    //tell user name already taken
    echo "Username is already taken";
    
        
        

}else{
    echo "Creating User...";
    $sql = "INSERT INTO users (username, password, coins) VALUES ('" . $loginUser . "', '" .$loginPass."', 0)";
    //inserty username and password in DB
    if($conn->query($sql) == TRUE){
        echo "New user created Successfully";
    }else{
        echo "Error: " .$sql . "<br>".$conn->error;
    }
}
$conn->close();
?>