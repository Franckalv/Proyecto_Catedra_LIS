<?php

include("db.php");

    if(isset($_POST['name'])){

        $name = strtolower(utf8_decode(mysqli_real_escape_string($connection,$_POST['name'])));
        $description = $_POST['description'];
        $query ="INSERT INTO categoriesen (name, description) VALUES ('$name', '$description');";

        $result= mysqli_query($connection, $query);
        if(!$result){
            die("Query failed");
        }
        echo "Task added successfully";
    }

?>