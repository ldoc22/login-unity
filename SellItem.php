<?php

require "ConnectionSettings.php";

$itemID = $_POST["itemID"];
$id = $_POST["id"];
$userID = $_POST["userID"];

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$sql = "SELECT price FROM items WHERE id = '".$itemID."'";

$result = $conn->query($sql);

if($result->num_rows > 0){

    $itemPrice = $result->fetch_assoc()["price"];

    $sql = "DELETE FROM usersitems WHERE id = '".$id ."'";
    
    $result2 = $conn->query($sql);
    if($result2){
        $sql = "UPDATE `users` SET `coins` = coins + '".$itemPrice."' WHERE `id` = '" .$userID."'";
        $conn->query($sql);
    }else{
        echo "Could Not delete item";
    }
    
}
?>