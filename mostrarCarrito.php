<?php  
include 'Tienda/global/config.php';
include('Tienda/global/conexion.php');
include 'Tienda/carrito.php';
include 'Tienda/templates/cabecera8.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    
<link rel="stylesheet" href="css/bootstrap.min.css">
  <br/>
    <br/>
      <br/>
<h3>Your cart</h3>
<?php if(!empty($_SESSION['CARRITO'])){?>
<table class="table table-light, table-bordered">
    <tbody>
        <tr>
            <th width="40%">NAME</th>
            <th width="15%" class="text-center">Quantity</th>
            <th width="20%" class="text-center">Price</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
        <tr>
            <td width="40%"><?php echo $producto['NAME'] ?></td>
            <td width="15%"  class="text-center"><?php echo $producto['QUANTITY'] ?></td>
            <td width="20%"  class="text-center">$<?php echo $producto['PRICE'] ?></td>
            <td width="20%"  class="text-center">$<?php echo number_format($producto['PRICE']* $producto['QUANTITY'],2);?></td>
            <td width="5%">
            
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
            <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Delete</button></td>
            </form>
         
        </tr>
        <?php $total=$total+($producto['PRICE']* $producto['QUANTITY']); ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">

                <form action="pagar.php" method="post">
                <div class="alert alert-success">
                <div class="form-group">
                    <label for="my-input">Email:</label>
                    <input id="email" name="email" type="email"  placeholder="Type in your email" class="form-control" required>
                </div>
                <small id="emailHelp" class="form-text text-muted">Use an email</small>
                </div>
                 <button name="btnAccion" class="btn btn-primary btn-lg btn-block" type="submit" value="Proceder">Pay</button>
        
                </form>
    

            </td>
        </tr>




    </tbody>
</table>
<?php }else{ ?>
<div class="alert alert-success">
   Your Trips SV Cart is empty...
</div>



<?php } ?>    

</div>
<br>
<br>

<?php include 'Tienda/templates/pie.php';?>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/editCats.js"></script>


</body>
</html>    
