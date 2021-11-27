<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>La vallée des Croisées</title>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      text-decoration: none;
      font-family: 'Josefin Sans', sans-serif;
    }

    .coin {
      background-color: #f9fbfd;
      border: 1px solid #183c5f;
      padding: 5px;
      /*arrondir les coins en haut à gauche et en bas à droite*/
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 10px;
    }
  </style>

</head>

<body>

  
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right col-2" id="sidebar-wrapper" style="position: fixed; padding :0%; text-align: center;">
      <div class="sidebar-heading">
        <h2><b>Vallée des croisées</b></h2>
      </div>
      <img src="../images/valee.jpg" alt="Logo" style="width:60%">
      <div class="list-group list-group-flush" style="width: 100%; text-align: center;">

        <a href="./index.php" class="list-group-item list-group-item-action bg-light">Accueil</a>
        <a href="./destination.php" class="list-group-item list-group-item-action bg-light">Destinations</a>
        <a href="./activite.php" class="list-group-item list-group-item-action bg-light">Activités</a>
        <a href="./client/rechercheReservation.php" class="list-group-item list-group-item-action bg-light">Réserver</a>
        <a href="./client/listReservation.php" class="list-group-item list-group-item-action bg-light">Mes réservations</a>
        <a href="./contacter.php" class="list-group-item list-group-item-action bg-light">Nous contacter</a>
        <div class="profile">
          <div class="div-divider" style="border-top: 3px solid black; text-align: center;"></div>
          <p><?php if (isset($_SESSION['mail'])) {echo $_SESSION['prenom'];} else {echo 'Non connecté';} ?></p>
            <?php
              if (isset($_SESSION['mail'])) {
            ?>
            <a href="./administration/logout.php" class="btn btn-outline-primary" role="button">Se déconnecter</a>
            <?php
            } else {
            ?>
            <a href="./connexion.php" class="btn btn-outline-primary" role="button">Se connecter</a>
            <?php } ?>        </div>
        <div id="langage" style="margin-top: 5%;">
          <select name="forma" onchange=" location= this.value;" id="forma" style="width: 20%;">
            <option value="./index.php">Fr</option>
            <option value="../en/index_en.php">En</option>
          </select>
        </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div class="col-12" style="margin-left: 15%; ">
    <div id="carouselControls" class="carousel slide container col-12" data-ride="carousel">
      <div class="carousel-inner row">
        <div class="col-12 text-center">

          <div class="carousel-item active">
            <img src="../images/home1.jpg" class="d-block w-100" style="height: 100vh; object-fit: cover;">
          </div>
          <div class="carousel-item">
            <img src="../images/home2.jpeg" class="d-block w-100" style="height: 100vh; object-fit: cover;">
          </div>
          <div class="carousel-item">
            <img src="../images/home3.webp" class="d-block w-100" style="height: 100vh; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev" style="margin-left:15%;">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="color:#183c5f;">
      <span class="sr-only">Previous</span>
    </span>
  </a>
  <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next" style="margin-right:0%;">
    <span class="carousel-control-next-icon" aria-hidden="true" style="color:#183c5f;">
      <span class="sr-only">Next</span>
    </span>
  </a>
  </div>
  <div style=" margin-left: 17%; width: 83%; " >
  <div class="container" style="padding-top: 5%;">
    <div class="row ">
      <div class="col-10 col-md-10  text-center coin" style="margin-left:7%; text-align: center">


        <p></b>Bienvenue dans la vallée des croisés ! <br> 
          Ici vous trouverez le meilleur camping des Etats-unis, avec des activités uniques au monde! <br>
          Des activités en plein air avec vos héros de films préférés, une piscine comptant des jeux en association avec les films Universal
          et plein d'autres encore (à découvrir sur notre rubrique activités). Des maisonnettes en rapport avec les films que ce soit la maison
          des nains, la maison des ogres et enfin la maison des elfes.<br>
          Notre camping se situe à côté du parc d'attraction universal studio. de plus, en réservant un mobil-home dans ce camping, vous aurez 
          une réduction de 20% sur les places d'entrées du parc. C'est une affaire en or! <br></b>
        </p>

      </div>
    </div>
  </div>

  <div class="container" style=" margin-left: 10%;">
    <div class="row " style="padding-top: 5%;">
      <div class="col-5 coin" style="margin-right: 1%;">
        <a href="./activite.php" class=" text-center " style="margin-left: auto; text-align: center; ">
          <h2>Les activités</h2>
        </a>
      </div>
      <div class="col-5 coin" style="margin-left: 1%;">
        <a href="./destination.php" class=" text-center " style="margin-left: auto; text-align: center;">
          <h2>Les destinations</h2>
        </a>

      </div>
    </div>
  </div>
  <div class="container">
    <div class="row text-center" style="padding-top: 5%;">
      <div style="margin-left: 44%;">
      <a href="./client/rechercheReservation.php" class="btn btn-outline-primary" role="button">Réserver</a>
      </div>
    </div>
  </div>

  <div class="container " style="margin-top: 2%;">
    <div class="row coin">

      <div class="col-6 col-lg-6"  style="margin: auto;">
        <img src="../images/news1.png" alt="..." class="col-12">
      </div>
      <div class="col-6 col-lg-6">
        <h2 style="margin-top: 5%;">Maintenance</h2>
        <p style="margin-top: 1%;">Une maintenance du site surviendra le 30/05 à 16h. Le site ne sera plus accessible durant 2 à 3 heures.</p>
      </div>

    </div>
  </div>
  <div class="container " style="margin-top: 2%;">
    <div class="row coin ">

      <div class="col-6 col-lg-6" style="margin: auto;">
        <img src="../images/news2.jpg" alt="..." class="col-12">
      </div>
      <div class="col-6 col-lg-6">
        <h2 style="margin-top: 5%;">Activité</h2>
        <p style="margin-top: 1%;">Serait-ce des animaux que nous voyons-là ? Eh oui ! Avec le film Dr Doolittle, nous avons créé un zoo avec les animaux apparus dans 
          le film, vous pourrez les nourrir, voir un vétérinaire en action et plein d’autres choses !</p>
      </div>

    </div>
  </div>
  <div class="container " style="margin-top: 2%;">
    <div class="row coin">

      <div class="col-6 col-lg-6"  style="margin: auto;">
        <img src="../images/news3.jpg" alt="..." class="col-12">
      </div>
      <div class="col-6 col-lg-6">
        <h2 style="margin-top: 5%;">Recherche salarié</h2>
        <p style="margin-top: 1%;">Nous recherchons, pour notre équipe, une personne ayant les connaissances et compétences pour effectuer du front, veuillez envoyer 
          un message, si vous êtes intéressés, dans l’onglet nous contacter.</p>
      </div>

    </div>
  </div>
  </div>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <footer class="footer" style="margin-top: 2%; margin-left: 17%; background-color: black;">
    <div class="container text-center">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-google-plus"></i></a>
      <a href="#"><i class="fa fa-skype"></i></a>
    </div>
  </footer>

</body>

</html>