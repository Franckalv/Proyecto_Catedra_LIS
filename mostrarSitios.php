<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="https://drive.google.com/open?id=1HzBJzHhBEac8Vxx_KiCSk3RJl5TtmNiD" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons</title>
    <link rel="icon" type="image/png" href="LoginPTC/images/logo.jpg">
</head>
<body> 
    <?php include("Tienda/templates/cabecera6.php") ?>
    <input type="hidden" id="category" value="<?php echo $_GET['cat']; ?>">
    <div class="container py-3">
        <h2><?php echo $_GET['cat']; ?></h2>
        <div class="row" id="places">
          

        </div>
<!-- Row -->    
    </div>
<!--Container -->

<?php include("includes/footer.php") ?>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/fecthPlaces.js"></script>
</body>
</html>
