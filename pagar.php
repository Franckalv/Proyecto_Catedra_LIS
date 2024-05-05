<?php  
include 'Tienda/global/config.php';
include 'Tienda/global/conexion.php';
include 'Tienda/carrito.php';
include 'Tienda/templates/cabecera4.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Packages</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
 <?php  
if($_POST){
    $total=0;
    $SID=session_id();
    $Correo=$_POST['email'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $total=$total+($producto['PRICE']*$producto['QUANTITY']);
    
    
    }
    $sentencia=$pdo->prepare("INSERT INTO `tblventas` 
                        (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
    VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');");


    $sentencia->bindParam(":ClaveTransaccion",$SID);
    $sentencia->bindParam(":Correo",$Correo);
    $sentencia->bindParam(":Total",$total);
    $sentencia->execute();
    $idVenta=$pdo->lastInsertId();

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $sentencia=$pdo->prepare("INSERT INTO
         `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `IDPRODUCT`) 
         VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, :IDPRODUCT);");

        $sentencia->bindParam(":IDVENTA",$idVenta);
        $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
        $sentencia->bindParam(":IDPRODUCT",$producto['ID']);
        $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRICE']);
        $sentencia->bindParam(":CANTIDAD",$producto['QUANTITY']);
        $sentencia->execute();

    }
    //echo "<h3>".$total."</h3>";
}
?>


<script src="https://www.paypalobjects.com/api/checkout.js"></script>


<style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }
        
        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
                display: inline-block;
            }
        }
</style>


<div class="jumbotron text-center">
    <h1 class="display-4">¡Final step!</h1>
    <hr class="my-4">
    <p class="lead">Pay with paypal:
        <h4>$<?php echo number_format($total,2); ?></h4>
        <div id="paypal-button-container"></div>
    </p>
  
   
    <strong>(To report issues: Tripssv2020@gmail.com )</strong>
</div>


<script> 
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
        label: 'checkout', // checkout | credit | pay | buynow | generic
        size: 'responsive', // small | medium | large | responsive
        shape: 'pill', // pill | rect
        color: 'white', // gold | blue | silver | black 
    },

    client: {
        sandbox: 'AUB6NVEP93ifzV8v985s9IGvez-8VE2iyieZGfhY4-1ADwEnvTZ6WgbORZFRgSBG4WkNmRVpRw_yS-lq',
        production: '<insert production client id>',
    },

    payment: function(data, actions){
        return actions.payment.create({
            payment:{
                transactions:[
                {
                 amount: { total: '<?php echo $total;?>', currency: 'USD'},
                 description: "Compra de productos a Trips SV:$<?php echo number_format($total,2);?>",
                 custom: "<?php echo $SID;?>#<?php echo openssl_encrypt($idVenta,COD,KEY);?>"
                }
                ]
           }
        });
    },

    onAuthorize: function(data, actions){
          return actions.payment.execute().then(function(){
            console.log(data);
            //window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID"+data.paymentID;
            window.location="mensaje.php"
          
        });
    }
}, '#paypal-button-container');      


</script>    


    <?php include 'Tienda/templates/pie.php';?>

    <script src="js/jquery-3.4.1.min.js"></script>
<script src="js/editCats.js"></script>




</body>
</html>    
