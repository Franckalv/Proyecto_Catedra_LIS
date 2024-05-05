<?php

    include('db.php');
    $place = utf8_decode(htmlspecialchars(mysqli_real_escape_string($connection, ucfirst($_POST['place']))));
    
    //query
    $query = "SELECT * from placesen WHERE name = '$place';";

    $result= mysqli_query($connection, $query);
    if(mysqli_num_rows($result)>0){
        $placeInfo = [];
        while($row = mysqli_fetch_array($result)){
            $placeInfo[] = [
                "id" => $row['id'],
                "name" => utf8_encode($row['name']),
                "description" => utf8_encode($row['description']),
                "rating" => $row['rating'],
                "location" => utf8_encode($row['location']),
                "info" =>  urldecode($row["info"]),
                "category" => utf8_encode($row['category']),
                "image" => base64_encode($row['image']),
            ];
        }
        echo json_encode($placeInfo);
    }else{
        echo "This lecture is not in our system. Please wait while we add it.";
    }
?>