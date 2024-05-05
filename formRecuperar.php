<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="image/jpg" href="LoginPTC/images/logo.jpg">
</head>
<style>
input[type="password"]{
    width: 50%;
}
</style>
<body>
<header id="">
    <nav class="navbar  navbar-expand-sm navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">El Salvador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="catsEN.php">Back</a>
      </li>
  </div>
</nav>
</header>
<section id="form">
<form id="updatePassword">
<div class="row mt-4">
<div class="col-sm-2"></div>
<div class="col-sm-6">
<div class="form-group">
<span>New password</span>
<input type="password" id="newPassword" class="form-control mx-0 mt-2">
<br>
<span>Repeat your password</span>
<input type="password"  id="repeated" class="form-control mx-0 mt-2">
<br>
<input type="submit" value="Cambiar contraseña" class="btn btn-danger">
</div>

</div>
</div>
</form>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/recuperarForm.js"></script>
</body>
</html>
