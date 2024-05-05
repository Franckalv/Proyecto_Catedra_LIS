<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/Login_Registro.css">

	 <link rel="stylesheet" href="css/estilos.css">
	<title>Register</title>
</head>
<center>
<body>
	<style type="text/css">

	body{
		top: 0;
		margin-top: 0;
	}

	.todo{
	      background-image: url(img/turismo1.png) ; 
	      background-size: 100% 100%;
	      position: absolute;
	      height: 100%;
	      width: 100%;

		  border-left: 20%;
		  top: 0;
		}

    .bandera{
		      width: 45%;
		      height: 20%;   
		      top: 0;
       }

    .container{
    	margin-left: 0%;
  		top: 0;

    }

	</style>
	<div class="todo">
	<div id="fullscreen_bg"  class="fullscreen_bg"/>
	<div id="regContainer"  class="container">
	<div class="row" >
	<div class="col-md-6 col-md-offset-3" >
	<div class="panel panel-login" >
	<div class="panel-heading" >
	<div class="row" >
<div class="col-xs-6" style="background-color: rgba(225,239,254,0.6); 	width: 65%; height: 669px;"><br>
	  <img src="img/bandera-el-salvador-animada-1.gif" class="bandera"><br><br> 
	<div class="contenedor" >
		<h1 class="titulo">Register</h1><br>


		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login" >
			<div class="form-group" >
				<i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="form-control" style="width: 300px" class="usuario" placeholder="User" autofocus minlength="3" maxlength="30" >
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" class="form-control" style="width: 300px" name="password" class="password" placeholder="Password" maxlength="30" id="contra"><input type="checkbox" onclick="myFunction()">Show password
					<script type="text/javascript">
						function myFunction() {
                        var x = document.getElementById("contra");
                          if (x.type === "password") {
                           x.type = "text";
                           } else {
                            x.type = "password";
                       }
                          }
					</script>
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" class="form-control" style="width: 300px"  name="password2" class="password_btn" placeholder="Confirm Password" maxlength="30"><br>
			</div>

			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
		</form>
<p class="text-white bg-dark">
		<p class="texto-registrate">
			 Do you already have an account?
			<a href="login.php">Log in</a><br><br>
		</p>
		<button  class="btn btn-primary" type="submit" onclick="login.submit()" >Log in</button><br>
			
			<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
	</div>
</p>
	</center>
	<div class="todo-slide">
<ul class="slides">
    <input type="radio"  name="radio-btn" id="img-1" checked />
    <li class="slide-container">
		<div class="slide">
			<img src="img/1.jpg" />
        </div>
		<div class="nav">
			<label for="img-6" class="prev">&#x2039;</label>
			<label for="img-2" class="next">&#x203a;</label>
		</div>
    </li>

    <input type="radio" name="radio-btn" id="img-2" />
    <li class="slide-container">
        <div class="slide">
          <img src="img/2.jpg" />
        </div>
		<div class="nav">
			<label for="img-1" class="prev">&#x2039;</label>
			<label for="img-3" class="next">&#x203a;</label>
		</div>
    </li>

    <input type="radio" name="radio-btn" id="img-3" />
    <li class="slide-container">
        <div class="slide">
          <img src="img/3.png" />
        </div>
		<div class="nav">
			<label for="img-2" class="prev">&#x2039;</label>
			<label for="img-4" class="next">&#x203a;</label>
		</div>
    </li>

    <input type="radio" name="radio-btn" id="img-4" />
    <li class="slide-container">
        <div class="slide">
          <img src="img/4.jpg" />
        </div>
		<div class="nav">
			<label for="img-3" class="prev">&#x2039;</label>
			<label for="img-5" class="next">&#x203a;</label>
		</div>
    </li>

    <input type="radio" name="radio-btn" id="img-5" />
    <li class="slide-container">
        <div class="slide">
          <img src="img/5.jpg" />
        </div>
		<div class="nav">
			<label for="img-4" class="prev">&#x2039;</label>
			<label for="img-6" class="next">&#x203a;</label>
		</div>
    </li>

    <input type="radio" name="radio-btn" id="img-6" />
    <li class="slide-container">
        <div class="slide">
          <img src="img/6.jpg" />
        </div>
		<div class="nav">
			<label for="img-5" class="prev">&#x2039;</label>
			<label for="img-1" class="next">&#x203a;</label>
		</div>
    </li>

    <li class="nav-dots">
      <label for="img-1" class="nav-dot" id="img-dot-1"></label>
      <label for="img-2" class="nav-dot" id="img-dot-2"></label>
      <label for="img-3" class="nav-dot" id="img-dot-3"></label>
      <label for="img-4" class="nav-dot" id="img-dot-4"></label>
      <label for="img-5" class="nav-dot" id="img-dot-5"></label>
      <label for="img-6" class="nav-dot" id="img-dot-6"></label>
    </li>
</ul>
</div>
</body>
</html>