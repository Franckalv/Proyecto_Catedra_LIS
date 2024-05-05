<?php include('Backend/addPlaces.php');
       include('includes/menu.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/styleAddPl.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/testis.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="LoginPTC/images/logo.jpg">
    <title>Modify lesson</title>
</head>
<body>

<?php 

    include('Backend/db.php');


    $cod = $_GET['parametro'];


    $query = "SELECT * FROM placesen WHERE id = $cod";

    $result = mysqli_query($connection, $query);

    $datos = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $datos[]=array(
            "descripcion" => utf8_encode($row["description"]),
            "name" => utf8_encode($row["name"]),
            "info" => urldecode($row["info"]),
            "ubicacion" => utf8_encode($row["location"]),
            "categoria" => utf8_encode($row["category"]),
            "imgData" => utf8_encode($row["image"]),
        );
    }
 ?>

    <div id="alert"><?php uploadPlace(); ?></div>
    <form  method="post" action="prueba.php" enctype="multipart/form-data">
        <div class="row">
           
            <div class="col-lg-6 col-sm-12">
                <div class="form-group p-3">
                    <p><label for="nombre"> <h4>Selected ID</h4></label></p><br>
                    <label style="font-size: 18px;"><?php echo $cod; ?></label>
                    <input type="hidden" name="id" value="<?php echo $cod; ?>">
                 </div>
                <div class="form-group p-3">
                     <p><label for="nombre"> <h4>Lesson's name</h4></label></p>
                     <input type="text" name="name" value="<?php echo $datos[0]['name']; ?>" id="nombre" placeholder="Nombre" class="form-control txt"  required onpaste="return false">
                 </div>
                 <div class="row pl-3">
                     <div class="col-lg-4 col-sm-4 col-md-3">
                         <div class="form-group pt-3">
                             <label for="category"><h4>Course</h4></label>

                        </div>
                     </div>
                     <div class="col-lg-7 col-sm-6 col-md-7">
                         <div class="form-group">
                            <select id="category" name="cat" class="form-control"> 
                            <?php
                                    $catsQuery ="Select name from categoriesen";
                                    $result = mysqli_query($connection, $catsQuery);
                                    if($result){
                                        $cats=mysqli_fetch_assoc($result);
                                        foreach ($cats as $cat) {
                                            echo "<option value=\"$cat\">$cat</option>";
                                        }
                                    }
                                ?>

                            </select>
                         </div>
                     </div>
                 </div>   
                 <div class="form-group p-3">
                    <p><label for="depart"><h4>KeyWord</h4></label></p>
                    <input type="text" name="location" value="<?php echo $datos[0]['ubicacion']; ?>" id="location" class="form-control txt">
                </div>
                
            </div>
            <div class="col-lg-6 col-sm-12 col-ms-8">
            <div class="form-group p-3">
                        <p><label for="description"><h4>Description</h4></label></p>
                        <textarea name="description" id="description" placeholder="Describe brevemente la información del sitio" class="form-control" cols="50">
                        <?php echo $datos[0]['descripcion']; ?>
                        </textarea>
            </div>
            <!--Imagen-->
            <div class="form-group p-3">
                 <input type="file" name="image"  id="image" class="form-control-file pt-2">
                 
            </div>
            </div>
        </div>
        <div class="form-group p-3">
                <p><label for="description"><h4>Content</h4></label></p>
                <textarea name="info" id="info"  class="ckeditor" placeholder="Describe brevemente el sitio turístico" class="form-control" cols="30" rows="10">
                <?php echo $datos[0]['info']; ?>
                </textarea>
            </div>

        <button type="submit" class="btn btn-danger p-3" name="actualizar" id="addEvent" value="modificar" style="pading-right:-10%; width:25%; margin-left:72%; margin-bottom: 20px;">Update information</button>
    
    </form>
    <?php include('includes/footer.php') ?>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/places.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('info');
    </script>
</body>
</html>