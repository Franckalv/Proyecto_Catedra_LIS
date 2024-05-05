<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos.css">
	<title>Log in</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/Login_Registro.css">
</head >

<body style="font: Rale">

<center>


	<style type="text/css">

		body{
			border-top: 0;
			border-spacing: 0;
			margin-top: 0%;
			border-top: 0;

		}

	.todo{
		    background-image: url(img/turismo1.png) ; 
		    background-size: 100% 100%;
		    position: absolute;;
		    height: 100%;
		    width: 100%;
			border-left: 20%;
		}

    .bandera{
		width: 45%;
		height: 20%;   
		top: 0;
    }	

    .container{
    	margin-left: 0%;
    }


	</style>

	<div class="todo" >
		<div id="fullscreen_bg"  class="fullscreen_bg"/>
		<div id="regContainer" class="container" >
		<div class="row" >
		<div class="col-md-6 col-md-offset-3" >
		<div class="panel panel-login" >
		<div class="panel-heading">
		<div class="row">
		<div class="col-xs-6" style="background-color: rgba(225,239,254,0.6); 	width: 65%;  height: 669px;	"><br>
			  <img src="img/bandera-el-salvador-animada-1.gif" class="bandera"><br><br>
		<div class="contenedor">
	
		<center>
			<h1 class="titulo">Log in</h1><br><br>

			<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login" style="display: block;">

				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i>&nbsp &nbsp<input type="text" required size="10" class="form-control" name="usuario" class="usuario" placeholder="Username" autofocus  style="width: 300px" class="fa-lock" maxlength="30" required="">
				</div>

		        

				<div class="form-group">
					<i class="icono izquierda fa fa-lock"></i>&nbsp &nbsp<input type="password" class="form-control" name="password" id="pass" class="password_btn" placeholder="Password" style="width: 300px" maxlength="30" required="" > <br><br>
					<input type="checkbox" onclick="myFunction()">Show Password
					<script type="text/javascript">
						function myFunction() {
                        var x = document.getElementById("pass");
                          if (x.type === "password") {
                           x.type = "text";
                           } else {
                            x.type = "password";
                       }
                          }
					</script>
					<br><br>

	
					<a href="registrate.php">Don't you have an account?</a> <br>
					<a href="registrate.php">Sign up</a>	<br><br>

					<button  class="btn btn-primary" type="submit" >Log in</button><br>
					<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
				</div>

				<?php if(!empty($errores)): ?>
				<div class="error">
				<ul>
				<?php echo $errores; ?>
				</ul>
				</div>
				<?php endif; ?>
			</form>
		    <br><br>
			<p class="text-white bg-dark" >
			<p class="texto-registrate">
			</p>
			</p>
			</p>
		    </div>
		</center>
	</div>
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
          <img src="img/3.png"/>
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
</center> 
</html>