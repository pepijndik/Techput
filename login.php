<?php   
    session_start();
    require('src/users.php');
    $user = new User();
    $data = $user->userinfo();
?>

<!DOCTYPE html>
<html lang="NL">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=yes, maximum-scale=5"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta
      name="description"
      content="Groot assortiment Computers en Laptops, maar ook voor uw reparaties bent u bij ons op het juiste adres"
    />
    <meta
      name="keywords"
      content="PC4U, reparaties, Computers, Laptops, Tablets"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700"
      rel="stylesheet"
    />
    <LINK REL="SHORTCUT ICON" HREF="/PC4U Website/Logo.png" />
    <link rel="stylesheet" href="repair/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/PC4U Website/css/pc4u.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>PC4U Informatie</title>
  </head>
  <body>
    <div class="jumbotron text-center header" style="margin-bottom:0">
      <h1 class="naam">Pc4U</h1>
      <img src="/PC4U Website/Logo.png" class="logo" />
      <p class="naam_info">Computer Speciaal zaak</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">Main</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/computers.php">Computers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/reparaties.html">Reparaties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/informatie.html">Informatie</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container" style="margin-top:30px">
      <div class="row">
        <div class="col-sm-4">
          <h2>Over Ons</h2>
          <h5>Foto van onze Prachtige Locatie</h5>
          <div>
            <img
              class="locatie"
              src="/PC4U Website/afbeeldingen/locatie_image.jpg"
              alt="Onze Prachtige Locatie"
            />
          </div>
          <p>Compter speciaal zaak PC4U</p>
          <h3>Onze site</h3>
          <p></p>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Reparaties</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Geplande Repaties</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Computers</a>
            </li>
          </ul>
          <hr class="d-sm-none" />
        </div>
        <div class="col-sm-8 flex-column">
            <center><h2>Maak een Account Of Login<br> om Reparaties te plannen</h2></center><br>
          
            <form class="box " action="login.php" method="post">
              <h1>Login</h1>
              <input type="text" name="" placeholder="Username">
              <input type="password" name="" placeholder="Password">
              <input type="submit" name="" value="Login">
            </form>
      </div>
      
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
      <p class="col-lg-8 col-sm-12 footer-text m-0">
        Copyright &copy;<script>
          document.write(new Date().getFullYear());
        </script>
        All rights reserved |
        <i class="fa fa-heart-o" aria-hidden="true"></i> by
        <a href="https://www.pdik.nl" target="_blank">Pdik systems</a>
      </p>
    </div>
  </body>
</html>
