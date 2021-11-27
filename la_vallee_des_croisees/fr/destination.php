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
 <title>Destinations</title>
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
            <?php } ?>
        </div>
        <div id="langage" style="margin-top: 5%;">
          <select name="forma" onchange=" location= this.value;" id="forma" style="width: 20%;">
            <option value="./index.php">Fr</option>
            <option value="../en/index_en.php">En</option>
          </select>
        </div>
      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <div id="body" class="col-10" style="margin-left: 17%; text-align: center;">
      <div>
        <h1 style="margin: 5%;">Les destinations proches</h1>
      </div>
      <div class="descriptif" style="width: 55%; margin: auto; padding: 10% 0 10% 0;">
        <p>
          Vous voici dans la rubrique destinations.
          Vous y trouverez toutes les destinations proches du camping, en partant d'un zoo ou encore en visitant le parc Universal, vous serez sûrs et certains de passer
          un moment inoubliable dans ces lieux.

        </p>
      </div>

      <div class="activite1" style="overflow: auto; display: flex;">
        <img src="../images/Universal_Studios_-_Studio_Tour.jfif" alt="" style=" width: 50%; float: left;">
        <div class="texte1" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">Visite d'Universal studio</h2>
          <p>
            Visitez Universal studio à travers un mini-train exclusif au camping et qui va vous amener aux endroits les plus marquants et les plus connus du parc,
             mais surtout vous allez en apprendre plus sur ce lieu mythique avec notre guide privé qui est un ancien employé du parc Universal studio.
          </p>
        </div>
      </div>

      <div class="activite2" style="overflow: auto; display: flex;">
        <div class="texte2" style="word-wrap : break-word; width: 50%; margin: auto;">
          <h2 style="margin-bottom: 5%;">Direction le parc national Yosemite</h2>
          <p>
            Venez, vous ressourcer au parc Yosemite qui est le troisième plus grand parc national de Californie. Avec ses chutes d'eau et ses dômes granitiques 
            spectaculaires, ce parc attire chaque année des milliers de randonneurs. Pour celles et ceux séjournant au camping, nous vous proposons une excursion
            spéciale avec notre guide local.
          </p>
        </div>
        <img src="../images/yosemite-ouest-américain-2-min-1.jpg" alt="" style=" width: 50%; float: right;">
      </div>

      <div class="activite3" style="overflow: auto; display: flex;">
        <img src="../images/20180426-104539-largejpg.jpg"
          alt="" style=" width: 50%; float: right;">
        <div class="texte3" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">Zoo de San Diego </h2>
          <p>
            Baladez vous dans le parc en bus et donnez à manger aux animaux y résidant. Nous proposons une visite du parc à moitié prix pour les résidents du camping, 
            et découvrez les coulisses du parc avec leurs plantations privées pour chaques animaux que dispose le zoo.
          </p>
        </div>
      </div>
      <footer class="footer">
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