<?php

  include('database.php');
  if(empty($_FILES["imagen"])){
    echo "A file is missing or can't be sent.";
    print_r($_FILES);
 }else{
     $image = $_FILES["imagen"];
 //Validar el tamaño de la imagen
     $maxSize = 5*10e6;
     if($image["size"] > $maxSize){
         echo "The image size is more than 5MB";
     }else{
 //Validar la imagen
         $imageData = getimagesize($image["tmp_name"]);
         if(!$imageData){
             echo "Image not supported";
         }else{
 //Validar formato de imagen
             $mimeType = $image['type'];
             $allowedMimeTypes = ["image/jpg", "image/png", "image/jpeg"];
             if(!in_array($mimeType, $allowedMimeTypes)){
                 echo "Please, use a .jpg or .png format(Your format: $mimeType)";
             }else{
 //Preparar las variables para ejecutar sql
                    if(isset($_POST['name'])) {
                    $img = addslashes(file_get_contents($image["tmp_name"]));
                    $name = mysqli_real_escape_string($connection, utf8_decode($_POST['name']));
                    $description = mysqli_real_escape_string($connection,utf8_decode($_POST['description']));
                    $price = mysqli_real_escape_string($connection,$_POST['price']);
                    $date = mysqli_real_escape_string($connection, utf8_decode($_POST['date']));
                    $place = mysqli_real_escape_string($connection, utf8_decode($_POST['place']));
                    $query = "INSERT into tblproductosen(Name, Description, Image, Price, Date, Place) VALUES ('$name', '$description','$img', $price, '$date', '$place')";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                      die('Query Failed.'. mysqli_error($connection));
                    }

                    echo "Successfully added";  

                  }
             }                    
         }
     }
 }
?>