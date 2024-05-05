    <?php 
     
     include('Backend/db.php');

     $name = mysqli_real_escape_string($connection, utf8_decode($_POST['name']));
      $ubicacion = mysqli_real_escape_string($connection, utf8_decode($_POST['location']));
      $descripcion = mysqli_real_escape_string($connection, utf8_decode($_POST['description']));
     $info = mysqli_real_escape_string($connection, urlencode($_POST['info']));
     $cat = mysqli_real_escape_string($connection, utf8_decode($_POST['cat']));
     $id = $_POST['id'];
     $img = $_FILES["image"];

 if(empty($_FILES["image"]) || $_FILES["image"]["size"] == 0){
     if (isset($_POST['actualizar']))
     {

       mysqli_query($connection,"UPDATE placesen SET name = '$name', location = '$ubicacion', description = '$descripcion', 
         info = '$info', category= '$cat' WHERE id = $id");

       echo $id;

       echo "<script>
               if(confirm('Site successfully updated')){
                   window.location.href='editSitios.php';
               }
               </script>";
        
     }
 }else{
     if($img["size"]> 1*10e6){
         echo "<script>
         alert('The image's size must be under 2 mb');
         </script>
         ";
     }else{
         $imageData = getimagesize($img["tmp_name"]);
         if(!$imageData){
             echo "<script>
             alert('Invalid image');
             </script>
             ";
         }else{
             $mimeType = $img["type"];
             $allowedMimeTypes = ["image/jpg", "image/png", "image/jpeg"];
        if(!in_array($mimeType, $allowedMimeTypes)){
            echo "Please, use .jpg or .png formats (Your format: $mimeType)";
        }else{
                 $imagen = addslashes(file_get_contents($img["tmp_name"]));
               $result =  mysqli_query($connection,"UPDATE placesen SET name = '$name', location = '$ubicacion', description = '$descripcion', 
         info = '$info', category= '$cat', image='$imagen' WHERE id = $id");

        if($result){
       echo $id;

       echo "<script>
               if(confirm('Successfully updated.')){
                   window.location.href='editSitios.php';
               }
               </script>";
            }else{
                $error = mysqli_error($connection);
                echo "<script>
                if(confirm('$error, please contact the administrator.')){
                    window.location.href='editSitios.php';
                }
                </script>";
            }
             }
         }
     }
 }
 ?>