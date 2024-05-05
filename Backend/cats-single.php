<?php

include("db.php");
$id = $_POST['id'];
$query = "SELECT * from categoriesen where id = '$id'";

$result = mysqli_query($connection, $query);
if(!$result){
    die("Query failed". mysqli_error($connection));
}else
$json = [];
    while($row = mysqli_fetch_array($result)){
        $json[]= array(
            'id' => $row['id'],
            'name' => ucfirst(utf8_encode($row['name'])),
            'description' => utf8_encode($row['description'])
        );
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
?>