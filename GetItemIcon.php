<?php
require "ConnectionSettings.php";

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}


$itemID = $_POST["itemID"];

$path = "http://localhost/UnityBackendTutorial/ItemsIcons/".$itemID.".png";


$image = file_get_contents($path);
echo($image);

$conn->close();
?>
