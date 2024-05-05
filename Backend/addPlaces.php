<?php

    function uploadPlace(){  
        if(isset($_POST['enviar'])){
            if(count($_FILES) > 0){
                include('db.php');
        $imgData = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $imageProperties = getimageSize($_FILES['image']['tmp_name']);
        $name = mysqli_real_escape_string($connection, utf8_decode(htmlspecialchars($_POST['name'])));
        $description = mysqli_real_escape_string($connection, utf8_decode(htmlspecialchars($_POST['description'])));
        $info = mysqli_real_escape_string($connection, utf8_decode(htmlspecialchars($_POST['info'])));
        $location = mysqli_real_escape_string($connection, htmlspecialchars($_POST['location']));
        $category = mysqli_real_escape_string($connection, htmlspecialchars($_POST['category']));
        $category = strtolower($category);
        $query = "Insert into placesen (name, description, image, rating, location, category) VALUES ('$name', '$description', '$info' '$imgData', 5.0, '$location', '$category');";
        $result = mysqli_query($connection, $query);
            if($result){
                echo '<div class="alert alert-success">Place added successfully.</div>';
            }else
                die("Query failed". mysqli_error($connection)); 
            }else{
                echo "image not found";
            }
         
        }
         
    }
?>