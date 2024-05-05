<?php 


session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);

	try {
		$conexion = new PDO('mysql:host=localhost;dbname=id20669269_test', 'Franckalv', 'Francisco.1810');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();;
	}

	$statement = $conexion->prepare('
		SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'
	);
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

	$resultado = $statement->fetch(PDO::FETCH_ASSOC);
	if ($resultado !== false) {
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['rolid'] = $resultado['privilegio'];
		$name="username";
		$value=$resultado['privilegio'];
		$expiration = time() + 60*60*30;
		setcookie($name, $value, $expiration);
		echo "<script>parent.self.location='index.php';</script>";
	} else {
		$errores .= '<li>The data you entered does not match! </li>';
	}
}


?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<link rel="icon" type="image/jpg" href="LoginPTC/images/logo.jpg">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
		<script src="js/traductor.js"></script>
		<title>Sign in</title>
	</head>
    <body oncopy="return false" onpaste="return false">
	<?php 	include 'Tienda/templates/cabecera2.php'; ?>
    <link rel="icon" type="image/png" href="LoginPTC/images/logoicono.png">
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
		<h4> Sign in:</h4> 
		<br><br><br>
				
		<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
		<fieldset>
			<center>
						
		    <input type="text" class="form-control inputs" id="" name="usuario" placeholder="User" autofocus="" required minlength="4" maxlength="24"/>
		    <br><br><br>
														
			<input type="password" name="password" class="form-control inputs" id="inputs" placeholder="Password" required="" minlength="8" maxlength="35" />
			<br>		
			<style type="text/css">
				.inputs{
					max-width:90%;
					width: 450px;
					height: 60px;
					border-radius: 9px 9px 9px 9px;
				}
			</style>	
			<br><br>																		
			<button type="submit" id="ingresar" class="width-35 pull-right btn btn-sm btn-danger" name="aceptar">
			<style type="text/css">
				#ingresar{
					max-width:90%;
					width: 450px;
					height: 60px;
					font-size: 13px;
				}
			</style>	
		    Login
			</button>
			<br>
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
			<center>
			<br><br>
			<center>				
			<a href="password.php" class="float-left">
				Forgot your password?
			</a>
		 </center>
			<style type="text/css">
				.float-left{
					color: #008FFF;
				}
			</style>

		    	<br>
		<br>
		<br>
		<br>
		    <style type="text/css">
				.float-right{
					color: #008FFF;
				}
				</style>
		<br>
		<br>
		<br>
		<br>
			
	     </center>
		</div>	
			<script>googleTranslateElementInit()</script> 
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</body>
</html>
