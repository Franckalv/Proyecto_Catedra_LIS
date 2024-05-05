<?php
include('db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

/* Exception 7class. */
//Si lo probarán en Windows descomenten la línea de abajo (Línea 9) y comenten la línea de Linux (Línea 11)
// require 'C:\xampp\htdocs\PTCen\Backend\Exception.php'; 
//Linux
require '/var/www/html/PTCen/Backend/Exception.php';

/* The main PHPMailer class. */
//Si lo probarán en Windows descomenten la línea de abajo (Línea 15) y comenten la línea de Linux (Línea 16)
// require 'C:\xampp\htdocs\PTCen\Backend\PHPMailer.php';
require '/var/www/html/PTCen/Backend/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
//Si lo probarán en Windows descomenten la línea de abajo (Línea 20) y comenten la línea de Linux (Línea 21)
// require 'C:\xampp\htdocs\PTCen\Backend\SMTP.php';
require '/var/www/html/PTCen/Backend/SMTP.php';


if (isset($_POST['email'])) {

    //Configuración del envío de corre Pt. 1 
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "trips.sv2020@gmail.com"; // GMAIL username
    $mail->Password = "tripssv2020"; // GMAIL password
    $email_from = "trips.sv2020@gmail.com";
    $name_from = "Trips SV";

    
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
   
    $query = "SELECT * from usuarios where correo = '$email'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result)>0){

    //Creación de token
    $token = openssl_random_pseudo_bytes(16); //crea una cadena aleatoria de bits
    $token = bin2hex($token); //convierte la cadena anterior en sistema hexadecimal
    
    //almacenar el token
    $ObtainUser = mysqli_fetch_array($result);
    $username = $ObtainUser["usuario"];
    
    $saveTokenInfo = "INSERT into pwdrecovery (Token, used, email, username, Timestamp) VALUES('$token', false, '$email', '$username', NOW())";
    $insertTokenInfo = mysqli_query($connection, $saveTokenInfo);
    //Configuración del envío de corre Pt. 2
    $mail->AddAddress($email, "");
    $mail->SetFrom($email_from, $name_from);
    $mail->Subject = utf8_decode("Recuperación de contraseña");
    $mail->Body = "
        <h3>Hello, $username. Click on the following link to recover change your password</h3>
        <a href='http://978cfbe72bc2.ngrok.io/PTCen/formRecuperar.php?account=$token'>Change password</a>
    
    ";
    $mail->IsHTML(true);
    try {
        $mail->Send();
        // echo "Success! $result";
        echo("An email has been sent to you.");
    } catch (Exception $e) {
        //Something went bad
        echo "Fail - ";
    }
    }else {
    echo "Sorry, we did not find this email in our accounts.";
}
}else
{
    echo "Invalid email.";
}
}else{
    echo "Please, fill in the blank.";
}
?>
