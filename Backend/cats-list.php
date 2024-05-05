<?php

    include("db.php");
    $query = "Select * from categoriesen;";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query failed. ". mysqli_error($connection));
    }
    $json = [];
    while($row = mysqli_fetch_array($result)){
        $json[]= array(
            'id' => $row['id'],
            'name' => ucfirst(utf8_encode($row['name'])),
            'description' => utf8_encode($row['description'])
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
?>