<?php
include("db.php");
if(isset($_POST)){
$token = mysqli_real_escape_string($connection, $_POST["token"]);
$newPassword = mysqli_real_escape_string($connection, utf8_decode($_POST["newPass"]));
$newPassword = hash('sha512', $newPassword);

$validateToken = "SELECT * from pwdrecovery where Token = '$token';";
$tokenInfo = mysqli_query($connection, $validateToken);
$rows = mysqli_num_rows($tokenInfo);
if($rows>0){
    $tokeninfo = mysqli_fetch_array($tokenInfo);
    if($tokeninfo['used'] == 0){
        $updateTokenStatus = "UPDATE pwdRecovery SET used = true where Token = '$token';";
        $update = mysqli_query($connection, $updateTokenStatus);
        $username = $tokeninfo["username"];
        $pwdQuery = "UPDATE usuarios SET pass = '$newPassword' WHERE usuario = '$username';";
        $updatequery= mysqli_query($connection, $pwdQuery);
        echo "Password updated successfully";
    }else{
        //if token is used
        echo "This request has been used already.";
    }
}else{
    echo "Sorry, we couldn't find this recovery request.";
}
}
?>