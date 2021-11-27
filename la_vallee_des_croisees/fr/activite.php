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
 <title>Activités</title>
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
        <h1 style="margin: 5%;">Les activités du camping</h1>
      </div>
      <div class="descriptif" style="width: 55%; margin: auto; padding: 10% 0 10% 0;">
        <p>
          Vous voici dans la rubrique activité.
          Dans cette rubrique vous trouverez toute les activités en rapport avec l’univers d’Universal studio, ces
          activités sont totalement gratuites (elles sont comprises dans le prix des maisons), <br>
          ces activités sont toute originales et différente, en passant par la rencontre avec les raptor dans jurassique
          world à une balade dans les voitures les plus emblématiques de Fast and Furious. <br>
          Pour plus de renseignement sur les autres activités, veuillez trouvez ci-dessous le détail de chaque activités
          que nous proposons. <br>
          Et si par quelconque problèmes, veuillez nous contacter directement sur le site internet avec la rubrique «
          nous contacter »

        </p>
      </div>

      <div class="activite1" style="overflow: auto; display: flex;">
        <img src="../images/R21fb76905419aa6e1474a864e4123490.jfif" alt="" style=" width: 50%; float: left;">
        <div class="texte1" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">Balade avec les Raptors</h2>
          <p>
            Voyagez dans une voiture tout terrain et suivez les raptors dans leur chasse quotidienne. Cette activité est
            disponible 1 fois par jour (les dates seront mises sur le tableau des activités à l’accueil du camping),
            elle
            peut convenir aux plus jeunes et même aux plus âgés. Cette activité se déroule dans une cage de plus de 5
            km²,
            vous serrez en plein milieu de l’habitat naturel des raptors, des spécialistes vous parleront de la
            nourriture donnée aux raptors, les systèmes de chasse qu’utilisent les raptors et plein d’autres
            informations croustillantes.
          </p>
        </div>
      </div>

      <div class="activite2" style="overflow: auto; display: flex;">
        <div class="texte2" style="word-wrap : break-word; width: 50%; margin: auto;">
          <h2 style="margin-bottom: 5%;">Visitez Londres de "Mortal Engines"</h2>
          <p>
            Visitez Londres après l’apocalypse, une ville mobile fonctionnant grâce à une énergie encore inconnue.
            Parcourez la ville, dont la partie supérieure est destinée aux riches et la partie inférieure destinée pour
            les plus démunies. Découvrez tous les secrets qui s'y cachent et défendez la ville de ses envahisseurs.
          </p>
        </div>
        <img src="../images/0414603-jpg-r_1920_1080-f_jpg-q_x-xxyxx.jpg" alt="" style=" width: 50%; float: right;">
      </div>

      <div class="activite3" style="overflow: auto; display: flex;">
        <img src="../images/fast-and-furious-5-tmc-combien-coutent-les-voitures-mythiques-de-la-saga-photos.jpg"
          alt="" style=" width: 50%; float: right;">
        <div class="texte3" style="word-wrap : break-word; width: 50%;  margin: auto;">
          <h2 style="margin-bottom: 5%;">Course avec DOM et Bryan</h2>
          <p>
            Participez à une course poursuite contre la police avec Dom et Bryan, au travers d’une voiture mythique de
            Fast and Furious que vous choisirez au préalable sur place, nous avons dans le camping une reconstitution
            d’une ville qui est inspirée de Los-Angeles même, et vous serez poursuivi pour un durée de 15 min où un
            pilote professionnelle se baladera dans la ville tout en évitant les obstacle qui est la police, et DOM et
            Bryan seront votre guide tout au long de votre péril.
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