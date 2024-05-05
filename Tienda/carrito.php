<?php  
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'Agregar':
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY ))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY );
                $mensaje.="Ok ID correcto".$ID."<br/>";

            }else{
                $mensaje.="Upss... ID incorrecto".$ID."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['name'],COD,KEY))){
                $NAME=openssl_decrypt($_POST['name'],COD,KEY);
                $mensaje.="Ok Name".$NAME."<br/>";
            }else{ $mensaje.="Upss... something wrong"."<br/>"; break;}

            
            if(is_numeric(openssl_decrypt($_POST['quantity'],COD,KEY))){
                $QUANTITY=openssl_decrypt($_POST['quantity'],COD,KEY);
                $mensaje.="Ok Cantidad".$QUANTITY."<br/>";
            }else{ $mensaje.="Upss... something wrong"."<br/>"; break;}

            
            if(is_numeric(openssl_decrypt($_POST['price'],COD,KEY))){
                $PRICE=openssl_decrypt($_POST['price'],COD,KEY);
                $mensaje.="Ok Price".$PRICE."<br/>";
            }else{ $mensaje.="Upss... something wrong"."<br/>"; break;}

        if(!isset($_SESSION['CARRITO'])){
            $producto=array(
                'ID' =>$ID,
                'NAME' =>$NAME,
                'QUANTITY' =>$QUANTITY,
                'PRICE' =>$PRICE,
            );
            $_SESSION['CARRITO'][0]=$producto;
            $mensaje= "Product added";
        }else{
            $idProductos=array_column($_SESSION['CARRITO'],'ID');
            
            if(in_array($ID,$idProductos)){
                echo "<script>alert('The product has been selected');</script>";
                $mensaje= "Product added successfully";

            }else{

            
            
            $NumeroProductos=count($_SESSION['CARRITO']);
            $producto=array(
                'ID' =>$ID,
                'NAME' =>$NAME,
                'QUANTITY' =>$QUANTITY,
                'PRICE' =>$PRICE,
            );

            $_SESSION['CARRITO'][$NumeroProductos]=$producto;
            $mensaje= "Product added successfully";
            
        }
    }    
        //$mensaje= print_r($_SESSION, true);
      
        break;
        case "Eliminar":
          if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY ))){
          $ID=openssl_decrypt($_POST['id'],COD,KEY );
                
         foreach($_SESSION['CARRITO'] as $indice=>$producto){
         if($producto['ID']==$ID){
            unset($_SESSION['CARRITO'][$indice]);
           //echo "<script>alert('Elemento borrado');</script>";
    
        }
    
        }
    
      }else{
                $mensaje.="Upss... ID wrong".$ID."<br/>";
        break;
    }
}
}
?>

