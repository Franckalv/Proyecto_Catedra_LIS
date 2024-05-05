<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$errores = '';

	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores .= '<li> Fill the data correctly </li>';
	} else {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .= '<li> The username already exists</li>';
		}

		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		if ($password != $password2) {
			$errores .= '<li>Passwords do not match</li>';
		}
	}

	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass, privilegio) VALUES (null, :usuario, :pass, 0)');
		$statement->execute(array(
			':usuario' => $usuario,
			':pass' => $password
		));

		header('Location: login.php');
	}
}

require 'views/registrate.view.php';

?>