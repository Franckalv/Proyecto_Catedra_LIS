<?php
    session_start();
    if(isset($_SESSION["usuario"])){
    setcookie("username", false, time()-100);
    session_destroy();
    }
    header("Location: index.php");
?>