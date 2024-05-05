<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
  <script src="js/maps.js"></script>
  <script src="js/traductor.js"></script>
  <script src="js/sss.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" /> 
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn a new language</title> 
    <link rel="icon" type="image/png" href="LoginPTC/images/logo.jpg">    
   
</head>
<body>
<style type="text/css">
  body{
    top: 0  !important;
    }
    .goog-te-banner-frame{
      display: none;
        }
</style>  
<?php include("includes/menu.php") ?>
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
    <li data-target="#carousel-example-2" data-slide-to="3"></li>
    <li data-target="#carousel-example-2" data-slide-to="4"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100 slider-slide"  src="Fotos/carrusel1.jpg"
          alt="First slide" width="400 px" height="500 px">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
          <h3 class="h3-responsive" style="color:#05400">Share your experience</h3>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100 slider-slide"  src="Fotos/carrusel2.png"
          alt="Second slide" width="400 px" height="500 px">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
          <h3 class="h3-responsive" style="color:#05400">Make friends all around the world</h3>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100 slider-slide" src="Fotos/carrusel3.webp"
          alt="Third slide" width="400 px" height="500 px" type="image/webp">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive" style="color:#05400">Better opportunities</h3>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100 slider-slide"  src="Fotos/carrusel4.jpg"
          alt="Third slide" width="400 px" height="500 px">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive" style="color:#05400">Learn new skills</h3>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100 slider-slide"  src="Fotos/carrusel5.jpg"
          alt="Third slide" width="400 px" height="500 px">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive" style="color:#FFF">Career opportunities</h3>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<br><br><br><br><br><br>
<section id ="carousell">
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
      <div class="buttons">
        <center>
      <button class="btn-prev" href="#multi-item-example" data-slide="prev">&larr;</button>
      <button class="btn-next" href="#multi-item-example" data-slide="next">&rarr;</button>
      </center>
      <br>
    </div>
    <style type="text/css">
      .btn-prev,
.btn-next {
  width: 60px;
  height: 60px;
  margin-left: 10px;
  border: none;
  outline: none;
  border-radius: 60px;
  color: #FFFFFF;
  background: -webkit-linear-gradient(top, #2D2E2E, #2D2E2E);
  background: linear-gradient(to bottom, #2D2E2E, #2D2E2E);
  box-shadow: 0px 3px 15px 2px;
  cursor: pointer;
}

    </style>
      <!--/.Controls-->

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
        <li data-target="#multi-item-example" data-slide-to="1"></li>
        <li data-target="#multi-item-example" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">

          <div class="row">
            <div class="col-md-4 cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/gramatica-basica.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center" >Basic english grammar</h4>
                  <p class="card-text clamp" align="justify">Here you will find the basics of grammar to learn english.</p>
                  <a class="btn btn-primary " style="color: #FFF" href="mostrarSitios.php?cat=Basic English Grammar">View more</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/gramatica-intermedia.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center">Intermediate English Grammar</h4>
                  <p class="card-text clamp" align="justify">Once completed the basic grammar, you can take more advanced lessons.</p>
                  <a  class="btn btn-primary" style="color: #FFF" href="mostrarSitios.php?cat=Intermediate English Grammar">View more</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/gramatica-avanzada.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center">Advanced English Grammar</h4>
                  <p class="card-text clamp" align="justify">Here you'll learn many new advanced topics from english grammar.</p>
                  <a class="btn btn-primary" style="color: #FFF" href="mostrarSitios.php?cat=Advanced English Grammar">View more</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--/.First slide-->

        <!--Second slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4 cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/carrusel-cursos1.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center">Basic French Grammar</h4>
                  <p class="card-text clamp" align="justify">French can be quite difficult, but here we can help you understand the basis.</p>
                  <a class="btn btn-primary" href="mostrarSitios.php?cat=Archaeological sites" style="color: #FFF">View more</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/carrusel-cursos2.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center">Intermediate French Grammar</h4>
                  <p class="card-text clamp" align="justify">Moving into steeper terrain, the intermediate course reinforce the basis of french grammar.</p>
                  <a class="btn btn-primary" href="mostrarSitios.php?cat=necrotourism" style="color: #FFF">View more</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/carrusel-cursos3.jpeg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center">Advanced French Grammar</h4>
                  <p class="card-text clamp" align="justify">Master french grammar and become fluent on it. Learning many new topics and tuning the last details.</p>
                  <a class="btn btn-primary" href="mostrarSitios.php?cat=Agrotourism" style="color: #FFF">View more</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--/.Second slide-->

        <!--Third slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4 cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/carrusel-cursos4.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center">Basic English Speaking</h4>
                  <p class="card-text clamp" >Speaking can be the hardest part of learning a new language, but we can help you!</p>
                  <a class="btn btn-primary"href="mostrarSitios.php?cat=ecotourism" style="color: #FFF">View more</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/carrusel-cursos5.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title " align="center">Basic French Speaking</h4>
                  <p class="card-text clamp" align="justify" >French is confusing at first, but here you will learn more about it.</p>
                  <a class="btn btn-primary" href="mostrarSitios.php?cat=ethno-tourism"style="color: #FFF">View more</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block cats-slides">
              <div class="card mb-2">
                <img class="card-img-top cats-slide" src="Fotos/carrusel-cursos6.jpg"
                  alt="Card image cap" width="45 px" height="250">
                <div class="card-body">
                  <h4 class="card-title" align="center"  >Advanced English Speaking</h4>
                  <p class="card-text clamp" align="justify" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, autem.</p>
                  <a class="btn btn-primary"href="mostrarSitios.php?cat=Community tourism" style="color: #FFF">View more</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--/.Third slide-->

      </div>
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->
    </section>

  </div>
<!-- <div id="map-example-container"></div>
<input type="search" id="input-map" class="form-control" placeholder="Find your ideal site" /> -->

<style>
  #map-example-container {height: 500px};
</style>

<script src="https://cdn.jsdelivr.net/npm/places.js@1.18.1"></script>
<div class="p-5" style="position: absolute">
  <script>
  //maps();
</script>
</div>
<head>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<center>
<button class="btn-prev2" href="#client-testimonial-carousel" data-slide="prev">&larr;</button>
<button class="btn-next2" href="#client-testimonial-carousel" data-slide="next">&rarr;</button>
<br><br>
</center>
<div class="text-dark">
  <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active text-center p-4"  >
        <blockquote class="blockquote text-center" >
          <p class="mb-0"><i class="fa fa-quote-left"></i>" Great job. "
          </p>
          <footer class="blockquote-footer">Carlos Miranda </footer>
        </blockquote>
      </div>
      <div class="carousel-item text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i>" Amazing lessons!  "
          </p>
          <footer class="blockquote-footer">María Abrego</footer>
        </blockquote>
      </div>
      <div class="carousel-item text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i>" This site helped me to learn a second language. "
          </p>
          <footer class="blockquote-footer">Julian Herrera</footer>
        </blockquote>
      </div>
    </div>
    <ol class="carousel-indicators">
      <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
      <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
    </ol>
  </div>
</div>
<style type="text/css">
  body { 
  margin: 0;
  padding: 0;
}
.btn-prev2,
.btn-next2 {
  width: 60px;
  height: 60px;
  margin-left: 10px;
  border: none;
  outline: none;
  border-radius: 60px;
  color: #FFFFFF;
  background: -webkit-linear-gradient(top, #2D2E2E, #2D2E2E);
  background: linear-gradient(to bottom, #2D2E2E, #2D2E2E);
  box-shadow: 0px 3px 15px 2px;
  cursor: pointer;
}
#client-testimonial-carousel {
  min-height: 200px;
}
</style>

<!-- Footer -->
 <?php include("includes/footer.php") ?>
 
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>googleTranslateElementInit()</script>
</body>
</html>