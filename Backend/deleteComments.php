<?php

   include('db.php');

    //Decalración de variables
     if(isset($_POST['commentID']))
     {$id = $_POST['commentID'];

    //Creación de query

    $query = "DELETE from comentarios WHERE id = $id ";

    //Ejecutamos la query
    $result = mysqli_query($connection, $query);

    $message = [];
    if($result){
        $message = [
            'type' => 'success',
            'msg' => 'Comment deleted successfully.'
        ];
    }else{
        $message = [
            'type' => 'error',
            'msg' => 'We are sorry. We have som troubles to delete your comment.' 
        ];
    }
    echo json_encode($message);}

?>