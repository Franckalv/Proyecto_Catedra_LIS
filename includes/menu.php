<nav class="navbar  navbar-expand-sm navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php" style="font-size: 130%;">Bobbies Language</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="catEN.php">Courses</a>
      </li>
 
      
      <?php 

      if(isset($_SESSION['usuario'])){
        echo "
        <li class='nav-item'>
              <a class='nav-link' href='cerrarSesion.php'>Log Out</a>
        </li>
        ";

        if(isset($_SESSION['rolid']) && $_SESSION['rolid'] == 1){
          echo"
          <li class=\"nav-item dropdown\">
          <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            Manage
          </a>
          <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                <a class=\"dropdown-item\"  href=\"addSites.php\">Create lesson</a>
                <a class=\"dropdown-item\" href=\"editSitios.php\">Modify Lesson</a>
                <a class=\"dropdown-item\" href=\"editCats.html\">Manage Courses</a>
         </div>
          </li>
          ";
        }else{
          echo "";
        }
        }else{
          echo"
           <li class=\"nav-item\">
                  <a class=\"nav-link\"  href=\"login.php\">Sign In</a>
                  </li>
                  <li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"register.php\">Sign Up</a>
                  </li>
          ";
          
       } 
     ?>
      
      
       <li class="nav-item">
      </li>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
   </ul> 
   <?php
      include('Backend/db.php');
      if (isset($_SESSION['usuario']))
      {
        $usuario = mysqli_real_escape_string($connection, utf8_decode($_SESSION['usuario']));
        
        echo "
        <form class=\"form-inline\">
        <li class=\"nav-item\">
        <a class=\"nav-link\">$usuario</a>
        </li>
        </form>
        ";

        echo "<img src=\"Fotos/user3.png\" style=\"width:3%;\">";
      }
      ?>
  </div>
</nav>