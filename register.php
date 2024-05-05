<?php 
	

	session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
	$correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$errores = '';

	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores .= '<li> Fill the data correctly </li>';
	} else {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=id20669269_test', 'Franckalv', 'Francisco.1810');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .= '<li> this user already exist. Try another</li>';
		}

		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		if ($password != $password2) {
			$errores .= '<li>Passwords are not the same/li>';
		}
		if($correo == false){
			$errores .= '<li>Invalid email address.</li>';
		}
	}

	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, correo, pass, privilegio) VALUES (null, :usuario, :correo, :pass, 0)');
		$statement->execute(array(
			':usuario' => $usuario,
			':correo' => $correo,
			':pass' => $password
		));

		header('Location: login.php');
	}
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
	<link rel="icon" type="image/jpg" href="LoginPTC/images/logo.jpg">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/traductor.js"></script>
	<script>

		function validarEmail(elemento){
		  var texto = document.getElementById(elemento.id).value;
		  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

		  if (!regex.test(texto)) {
		      document.getElementById("resultado").innerHTML = "Invalid email";
		  } else {
		    document.getElementById("resultado").innerHTML = "The email is correct";
		  }
		}

	</script>
</head>
<body oncopy="return false" onpaste="return false">
<?php include 'Tienda/templates/cabecera7.php'; ?>
	<div>
	<br>
	<br>
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
  
				<br>
				<br>
				<center>
				<h4 class="header green lighter bigger">
				   Create account: 
				</h4>
				</center>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
			<fieldset>
			<center>	

						<br>
			<br>
			<input type="text" id="inputs" class="form-control" name="usuario" placeholder="User" minlength="4" maxlength="24" autofocus="" required />
			<br>	       
		    <input type="email" id="inputs" class="form-control" name="correo" onkeyup="validarEmail(this)" placeholder="Email" minlength="8" maxlength="40" required />
            <br>   
           	<a id='resultado'></a>
           	<br><br>                                    					
		    <input type="password" id="inputs" class="form-control" name="password" placeholder="Password" minlength="8" maxlength="35" required />
			<br>
			<input type="password" id="inputs" class="form-control" name="password2" placeholder="Confirm password " minlength="8" maxlength="35" required />

			<style type="text/css">
				#inputs{
					max-width:90%;
					height: 50px;
					width: 450px;
					border-radius: 9px 9px 9px 9px;
					position: relative;
				}
			</style>

			<br>
			<br>
			<br>
		    <button type="submit" name="registrar" id="botonRegistro" class="width-65 pull-right btn btn-sm btn-danger">
					<style type="text/css">
						#botonRegistro{
							width: 450px;
							height: 50px;
							font-size: 12px;
							max-width:90%;
						}
					</style>	
						<span>Create</span>
						<br>							
					</button>
					 </div>
					</center>
			</fieldset>
		</form>
		<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
		<br>
		<br>
		<center>
			<div class="regresar">
				<a class="backlogin" href="login.php">
						Back to login
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
		<br>
		<br>
		</div>
	</center>			
	</div>		
	<script>googleTranslateElementInit()</script> 
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>

