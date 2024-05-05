<?php
//Arreglar validaciones para que funcione sin foto

include('database.php');
if(empty($_FILES["imagen"])){
  if(isset($_POST['id'])) {
    $name = mysqli_real_escape_string($connection, utf8_decode($_POST['name']));
    $description = mysqli_real_escape_string($connection,utf8_decode($_POST['description']));
    $price = mysqli_real_escape_string($connection,$_POST['price']);
    $place = mysqli_real_escape_string($connection, utf8_decode($_POST['place']));
    $date = mysqli_real_escape_string($connection, utf8_decode($_POST['date']));

      $id = $_POST['id'];
      $query = "UPDATE tblproductosen SET Name = '$name',  Date = '$date', Place = '$place', Description = '$description',  Price = $price WHERE ID = '$id'";
      $result = mysqli_query($connection, $query);
    
      if (!$result) {
        die('Query Failed.'. mysqli_error($connection));
      }
        echo "Successfully updated";  
      }
}else{
   $image = $_FILES["imagen"];
//Validar el tamaño de la imagen
   $maxSize = 2*10e6;
   if($image["size"] > $maxSize){
       echo "The image size is more than 2MB";
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
                  if(isset($_POST['id'])) {
                  $img = addslashes(file_get_contents($image["tmp_name"]));
                  $name = mysqli_real_escape_string($connection, utf8_decode($_POST['name']));
                  $description = mysqli_real_escape_string($connection,utf8_decode($_POST['description']));
                  $price = mysqli_real_escape_string($connection,$_POST['price']);
                  $place = mysqli_real_escape_string($connection, utf8_decode($_POST['place']));
                  $date = mysqli_real_escape_string($connection, utf8_decode($_POST['date']));

                    $id = $_POST['id'];
                    $query = "UPDATE tblproductosen SET Name = '$name', Description = '$description', Image = '$img', Price = $price, Date = '$date', Place = '$place' WHERE ID = '$id'";
                    $result = mysqli_query($connection, $query);
                  
                    if (!$result) {
                      die('Query Failed.'. mysqli_error($connection));
                    }
                      echo "Successfully updated";  
                    }
           }                    
       }
   }
}









?>