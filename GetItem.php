<?php

require "ConnectionSettings.php";

//variables submitted by user


$itemID = $_POST["itemID"];


if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

//echo "Connected Successfully <br>";


$sql = "SELECT name, description, price, imgver FROM items WHERE id = '".$itemID."'";

$result = $conn->query($sql);

$result = $conn->query($sql);

if($result->num_rows > 0){
    $rows = array();
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    echo json_encode($rows);
}else{
    echo "0 results";
}
$conn->close();
?>