<?php  
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera3.php';
?>




<?php 
print_r($_GET);

$ClientID="AUB6NVEP93ifzV8v985s9IGvez-8VE2iyieZGfhY4-1ADwEnvTZ6WgbORZFRgSBG4WkNmRVpRw_yS-lq";
$Secret="EPVbmj5Jy0SwrQjSUlkru58JerT8a0hRdncZjhE4mckU5oe6DRSitwcJWdS-NF0zd9uG9KUL8TAUXsk6";

$Login= curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");

curl_setopt($Login,CURLOPT_RETURNTRANSFER,TRUE);

curl_setopt($Login,CURLOPT_USERPWD,$ClientID.":".$Secret);

curl_setopt($Login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

$Respuesta=curl_exec($Login);



$objRespuesta=json_decode($Respuesta);

$AccessToken=$objRespuesta->access_token;

print_r($AccessToken);

$venta= curl_init("https://api.sandbox.paypal./v2/payments/authorizations/{authorization_id}");

curl_setopt($venta,CURLOPT_HTTPHEADER,array("Content-Type: application/json","Authorization:Bearer".$AccessToken));

curl_setopt($Venta,CURLOPT_RETURNTRANSFER,TRUE);

$RespuestaVenta=curl_exec($venta);

//print_r($RespuestaVenta);
$objRespuestaTransaccion=json_decode($RespuestaVenta);

print_r($objRespuestaTransaccion);

print_r($objDatosTransaccion->payer->payer_info->email);

$state=$objDatosTransaccion->state;
$email=$objDatosTransaccion->payer->payer_info->email;

$total = $objDatosTransaccion->transaccion[0]->amount->total;
$currency = $objDatosTransaccion->transaccion[0]->amount->currency;
$custom = $objDatosTransaccion->transaccion[0]->custom;

print_r($custom);

$clave=explode("#", $custom);

$SID=$clave[0];
$claveVenta=openssl_decrypt($clave[1],COD,KEY);

curl_close($venta);
curl_close($Login);

echo $state;

print_r($claveVenta);

if($state=="approved"){
    $mensajePaypal="<h3>Pay was approved</h3>";
}else{
    $mensajePaypal="<h3>Something is wrong with the purchase</h3>";
}
echo $mensajePaypal;

?>
