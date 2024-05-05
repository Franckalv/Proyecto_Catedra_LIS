<?php

    include('db.php');
    if(isset($_POST['id']))
    $id=$_POST['id'];
    $query= "DELETE from categoriesen where id = $id;";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query failed.". mysqli_error($connection));
    }
    echo "Task deleted successfully.";
?>