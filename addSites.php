<?php
session_start();
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
    <title>Create lesson</title>
</head>
<body>
    <div id="alert"></div>
    <form id="addPlaces" class="form-group">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group p-3">
                     <p><label for="nombre"> <h4>Lesson's name</h4></label></p>
                     <input type="text" name="name" id="nombre" placeholder="Nombre" class="form-control txt"  required onpaste="return false">
                 </div>
                 <div class="row pl-3">
                     <div class="col-lg-4 col-sm-4 col-md-3">
                         <div class="form-group pt-3">
                             <label for="category"><h4>Course</h4></label>
                        </div>
                     </div>
                     <div class="col-lg-7 col-sm-6 col-md-7">
                         <div class="form-group">
                            <select id="category" name="category" class="form-control"> </select>
                         </div>
                     </div>
                 </div>   
                 <div class="form-group p-3">
                    <p><label for="depart"><h4>Keyword</h4></label></p>
                    <input type="text" name="location" id="location" class="form-control txt">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-ms-8">
            <div class="form-group p-3">
                        <p><label for="description"><h4>Description</h4></label></p>
                        <textarea name="description" id="description" placeholder="" class="form-control" cols="40">
                        
                        </textarea>
            </div>
            <div class="form-group p-3">
                        <input type="file" name="image" id="image" class="form-control-file pt-2">
                    </div>
            </div>
        </div>
        <div class="form-group p-3">
                        <p><label for="description"><h4>Content</h4></label></p>
                        <textarea name="informacion" id="informacion" class="ckeditor" placeholder="Type in all the information of the site" class="form-control" cols="30" rows="10">
                        </textarea>
            </div>

        <button type="submit" class="btn btn-danger p-3" name="enviar" id="addEvent" style="pading-right:2%; width:15%; margin-left:82%; margin-bottom: 20px;">Add Lesson</button>

    </form>
    <?php include('includes/footer.php') ?>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/places.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
</body>
</html>