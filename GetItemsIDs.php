<?php

require "ConnectionSettings.php";

//user submitted variables
$userID = $_POST["userID"];

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}




$sql = "SELECT id, itemid FROM usersitems WHERE userid = '".$userID."'";

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