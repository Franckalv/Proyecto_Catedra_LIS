<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: ../index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);

	try {
		$conexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');
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
		$value=$resultado['rol_id'];
		$expiration = time() + 60*60*30;
		setcookie($name, $value, $expiration);
		header('Location: ../index.php');
	} else {
		$errores .= 'The data you entered does not match! ';
	}
}

require 'views/login.view.php';

?>