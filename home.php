<?php  
include 'Tienda/global/config.php';
include 'Tienda/global/conexion.php';
include 'Tienda/carrito.php';

//include 'includes/menu.php';

?>

 <?php 

      if (!isset($_SESSION['usuario'])) {
         echo "Debe Iniciar Sesión para realizar compras";
         header('Location: index.php');
      }

    ?>


<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <title>Packages</title>
  <link rel="icon" type="image/jpg" href="LoginPTC/images/logo.jpg">

  <style>
    .card{
      padding:0 2%;
    }
    .row{
      max-width: 100vw;
    }
    </style>
<head>
  <body>
  <?php include 'Tienda/templates/cabecera3.php'; ?>
  <br/>
    <br/>
      <br/>
    <?php if($mensaje!=""){?>
    <div class="alert alert-success">
    <?php echo $mensaje; ?>

        <a href="mostrarCarrito.php"  class="badge badge-success" >go to Cart</a>
    </div>
    <?php } ?>

    <div class="row">
    <?php  
        $sentencia=$pdo->prepare("SELECT * FROM `tblproductosen`");
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        //print_r($listaProductos);
    
    ?>    
    <?php foreach($listaProductos as $producto){ ?>
        
        <div class="col-sm-8 col-md-4 col-lg-4">
           <div class="card">
            <style type="text/css">
              .card{
                height: 550px;
                width: 325px;
                max-width: 1000%;
              }
            </style>
               <img 
               data-placement="right"
               title="<?php echo $producto['Name'];?>" 
               alt="<?php echo $producto['Name'];?>"
               class="card-img-top"
               src="data:image/jpg;base64,<?php  echo base64_encode($producto['Image']);?>"
               data-toggle="popover"
               data-trigger="hover"
               data-content="<?php echo $producto['Description'];?>"
               height="300px"
               width="100px"
               >
               <style type="text/css">
                 img{
                   max-width: 1000%;
                 }
               </style>
               <div class="card-body">
                   <center><h5><?php echo $producto['Name'];?></h5></center>
                   <br><br>
                   <span class="card-precio">Price: $<?php echo $producto['Price'];?></span>
                   <br>
                   <span class="card-lugar">Place: <?php echo $producto['Place'];?></span>
                   <br>
                   <span class="card-fecha">Date: <?php echo $producto['Date'];?></span>
                   <br>
                   <style type="text/css">
                     .card-body{
                      max-width: 1000%;
      
                     }
                   </style>
                   <br>

                   <form action="" method="POST">

                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY );?>">
                    <input type="hidden" name="name" id="name" value="<?php echo openssl_encrypt($producto['Name'],COD,KEY);?>">
                    <input type="hidden" name="price" id="price" value="<?php echo openssl_encrypt($producto['Price'],COD,KEY);?>">
                    <input type="hidden" name="quantity" id="quantity" value="<?php echo openssl_encrypt(1,COD,KEY);?>">

                   <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Add to cart</button>
                   </form>                
               </div>
           </div>
        </div>
       
       <?php } ?>
        </div>
        <script>
          $(function () {
            $('[data-toggle="popover"]').popover()
    })
    </script>
   


  </div>
   <br>
   <br>
   <br> 

    <?php include 'Tienda/templates/pie.php';?>



</body>
</html>    
