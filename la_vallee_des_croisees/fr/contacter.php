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

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <title>Contact</title>
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

 <!-- <?php

require('./client/fonctions.php');
if (isset($_POST['email'])) {
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
?>
		<script>	
			alert('Nous avons bien reçu votre message. Nous vous remercions de votre retour.'); 
		</script>
<?php
	} else {
	die('Mauvais format du Email');
	}
}
?>-->
        <!-- /#sidebar-wrapper -->
    <div class="col-12" style="margin-top:5%; margin-left: 15%; text-align: center;">
    <div class="container coin text-center" >
        
        <h1>Nous Contacter</h1>
       
        <form action="./contacter.php" method="POST" class="contacte" style="margin-top: 1cm;">
            <div class="contacte">
                <label for="name">Nom:</label>
                <input type="text" name="name" id="nom" required>
            </div>
            <div class="contacte">
                <label for="prénom">Prénom:</label>
                <input type="text" name="prénom" id="prenom" required>
            </div>
            <div class="contacte">
                <label for="mail">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="contacte "  style="overflow : auto ; display :flex; flex:1;">
                <div class="col-4"></div>
                 <div><label for="msg">Message:</label></div> 
            
                 <div ><textarea name="user_message" id="msg" cols="40" rows="10" width="200px" height="300px" style="margin-left:200;"></textarea></div>
            </div>
            <div class="contacte">
                <input type="submit" class="boutton">

            </div>
        </div>
        </form>
    </div>

</body>
</html>