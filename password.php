

<!DOCTYPE html>
<html>
<head>
	<title>Recuperar Contraseña</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="LoginPTC/images/logoicono.png">
	<script src="js/traductor.js"></script>
</head>
<body>
<?php 
	
	include 'Tienda/templates/cabecera2.php';


?>
    <img src="LoginPTC/images/logo.jpg" class="rounded float-left" alt="Logo TRIPS SV" style="width: 850px">
    <style type="text/css">
    	img{
    		max-width: 100%;
    	}
    </style>
    <style type="text/css">
  body{
    top: 0  !important;
    }
    .goog-te-banner-frame{
      display: none;
        }
</style> 
    <div>
        <center>
        	<br><br><br><br>
			<h4>
			Password assistance
			</h4>
			<br><br>
			<p>
			Enter the email address associated <br>
			with your Trips SV account.
			</p>
			<br><br>
			<form id="recuperarForm">
				<fieldset>
				<input type="email" name="correo" class="form-control" placeholder="Email" id="email" autofocus="" />
				<br><br>
				<style type="text/css">
					#email{
						width: 95%;
						height: 62px;
						border-radius: 9px 9px 9px 9px;
					    
					}
				</style>
				<button type="submit" id="enviar" class="width-35 pull-right btn btn-sm btn-danger">
					<style type="text/css">
					#enviar{
						width: 90%;
						height: 50px;
						font-size: 11px;
					}
				</style>
				Reset password with email
				</button>
				<br><br>
			</div>
			</fieldset>
		</form>
		<center>
		<p> Or, your username.</p>
		<form id="recuperarByUser">
		<fieldset>
				<input type="text"  class="form-control" placeholder="Username" id="username" />
				<br><br>
				<style type="text/css">
					#username{
						width: 95%;
						height: 62px;
						border-radius: 9px 9px 9px 9px;
					    
					}
				</style>
				<button type="submit" id="enviar2" class=" btn btn-danger">
					<style type="text/css">
					#enviar2{
						width: 90%;
						height: 50px;
						font-size: 11px;
					}
				</style>
				Reset password with username
				</button>
				<br><br>
			</div>
			</fieldset>
		</form>
		</center>
		<br><br>
		<center>
		<a class="backlogin" href="login.php">
			Back to Login
		</a>
		<style type="text/css">
			.backlogin{
				color: #008FFF;
			}
		</style>
		<br>
		<br>
		<br>
		<br>
		</center>
        </center>	
    </div>
    
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/enviarEmail.js"></script>
	<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script>googleTranslateElementInit()</script>
</body>
</html>