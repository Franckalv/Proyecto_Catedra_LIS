    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="iniciarSesion.php" method="post">
        
            <button type="submit" name="enviar">Crear Cookie</button>
        
        </form>
    </body>
    </html>



<?php
if(isset($_POST['enviar'])){
    $name="username";
    $value=true;
    $expiration = time() + 60*60*30;
    setcookie($name, $value, $expiration);
    header("Location: index.php");
}

?>