<?php
session_start();
require('./fonctions.php');
include('../connexionBDD.php');
if (!isset($_SESSION['mail'])) {
  header('Location:../connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 <title>Mes Réservations</title>
  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/simple-sidebar.css" rel="stylesheet">

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
    <div class="bg-light border-right col-2" id="sidebar-wrapper" style="position: fixed; padding :0%; text-align: center;">
      <div class="sidebar-heading">
        <h2><b>Vallée des croisées</b></h2>
      </div>
      <img src="../../images/valee.jpg" alt="Logo" style="width:60%">
      <div class="list-group list-group-flush" style="width: 100%; text-align: center;">

        <a href="../index.php" class="list-group-item list-group-item-action bg-light">Accueil</a>
        <a href="../destination.php" class="list-group-item list-group-item-action bg-light">Destinations</a>
        <a href="../activite.php" class="list-group-item list-group-item-action bg-light">Activités</a>
        <a href="./rechercheReservation.php" class="list-group-item list-group-item-action bg-light">Réserver</a>
        <a href="./listReservation.php" class="list-group-item list-group-item-action bg-light">Mes réservations</a>
        <a href="../contacter.php" class="list-group-item list-group-item-action bg-light">Nous contacter</a>
        <div class="profile">
          <div class="div-divider" style="border-top: 3px solid black; text-align: center;"></div>
          <p><?php if (isset($_SESSION['mail'])) {echo $_SESSION['prenom'];} else {echo 'Non connecté';} ?></p>
            <?php
              if (isset($_SESSION['mail'])) {
            ?>
            <a href="../administration/logout.php" class="btn btn-outline-primary" role="button">Se déconnecter</a>
            <?php
            } else {
            ?>
            <a href="../connexion.php" class="btn btn-outline-primary" role="button">Se connecter</a>
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

	
<div class="col-12" style="margin-left: 16%">

<?php 
	if (isset($_POST['id_chalet'])) {
		supprimeReservation($_POST['id_chalet'],$_POST['id_semaine']);	
	}
?>
	<h1>Mes réservations :</h1>
<?php
	$resultat=listReservation($_SESSION['mail']);
	while ($donnees = $resultat->fetch()) {
?>
		<div class="col-9" style="border:1px solid #183c5f;border-radius:10px">
		    <p>DU : <?php echo $donnees['date_debut']; ?> <br>
		    AU : <?php echo $donnees['date_fin']; ?> <br>
		    Chalet : <?php echo $donnees['libelle']; ?> <br>
		    <?php imageChalet($donnees['id_type_chalet']); ?><br></p>
			<div style="overflow: auto; display: flex; vertical-align: left; padding-left: 2%">
			    <p>Descriptif : <?php descriptionChalet($donnees['id_type_chalet']); ?></p><br>
			    <div style="width:30%; padding: 1%; margin-left: 15%;">
			    	<p>
			    		Prix : <?php echo prix_total($donnees['id_chalet'], $donnees['id_semaine']); ?> € <br>
						<?php
			    			if ($donnees['valide']) {
			    				echo '<strong style="color:red">Réservation validée</strong>';
			    			} else {
			    				echo '<strong style="color:red">Réservation en attente de paiement</strong>';
			    			}
			    		?>
			    	</p>
					    <form action="./listReservation.php" method="POST">
					        <input type="hidden" name="id_chalet" value="<?php echo $donnees["id_chalet"]; ?>"/>
					        <input type="hidden" name="id_semaine" value="<?php echo $donnees["id_semaine"]; ?>"/>
					        <input type="submit" value="Annuler la réservation" />
					    </form>
				</div>
			</div>
		</div>
<?php
	
    }
?>
</div>
</div>
</body>

</html>