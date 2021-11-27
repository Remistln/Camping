<?php
session_start();
include('./fonctions.php');
include('../connexionBDD.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Réservation</title>
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




<div class="col-10" style="margin-left: 16%; ">
<h1>Réservation</h1>
<?php
#partie réservation d'un chalet
if (isset($_POST['id'])) {
  if (!isset($_SESSION['mail']) ){
      header('location: ../connexion.php');
  }
	if (etatChalet($_SESSION['mail'],$_POST['id'],$_POST['idS'],False)) {
		ajoutReservation($_SESSION['mail'],$_POST['id'],$_POST['idS']);
	} else {
		echo "<br><a href='./rechercheReservation.php?date_debut=" . $_POST['date_debut'] . "&date_fin=" . $_POST['date_fin'] . "&nbre=" . $_POST['nbre'] . "'>Revenir dans votre recherche de chalet</a>";
	}
}

#partie recherche des chalets


#verification de la credibilité des champs
if (isset($_GET['nbre'])) {
	if (!empty($_GET['date_debut']) && !empty($_GET['date_fin'])) {
		if ($_GET['date_debut']<=$_GET['date_fin']) {
			if ($_GET['date_debut']>=date('Y-m-d')) {
				$date_debut=$_GET['date_debut'];
				$date_fin=$_GET['date_fin'];
			} else {
				die('les chalets ne sont plus réservables à ces dates');
			}
		} else {
			die('La date de début doit être avant la date de fin');
		}
	} else {
		die("L'une des dates est vide");
	}
	#requete sql pour récupérer les informations selon les critéres de la recherche
	$semaines=listSemaine($date_debut, $date_fin);
  $chalets=listChalet($_GET['nbre']);
	#affichage des resultats par blocs


  foreach ($semaines as $semaine) {
    foreach ($chalets as $chalet) {
		?>
		<div class="col-9" style="border:1px solid #183c5f;border-radius:10px">
		    <p>DU : <?php echo $semaine['date_debut']; ?> <br>
		    AU : <?php echo $semaine['date_fin']; ?> <br>
		    Chalet : <?php echo $chalet['libelle']; ?> <br>
		    <?php imageChalet($chalet['id_type_chalet']); ?><br></p>
			<div style="overflow: auto; display: flex; vertical-align: left; padding-left: 2%">
			    <p>Descriptif : <?php descriptionChalet($chalet['id_type_chalet']); ?></p><br>
			    <div style="width:30%; padding: 1%; margin-left: 15%;">
			    	<p>Prix : <?php echo prix_total($chalet['id_chalet'], $semaine['id_semaine']); ?> €</p> <br>
				    <strong style="color:red;"> 
            <?php 
            if (isset($_SESSION['mail'])) {
              etatChalet($_SESSION['mail'], $chalet["id_chalet"], $semaine['id_semaine'], True);
            } else {
              if (!chaletreserve($chalet['id_chalet'], $semaine['id_semaine'])) {
                echo "Libre";
              } else {
                echo "Déjà réservé";
              }
            }
            ?>
              
            </strong>
				    <form action="./rechercheReservation.php" method="POST">
				        <input type="hidden" name="id" value="<?php echo $chalet["id_chalet"]; ?>"/>
				        <input type="hidden" name="idS" value="<?php echo $semaine['id_semaine']; ?>"/>
				        <input type="hidden" name="date_debut" value="<?php echo $_GET['date_debut']; ?>"/>
				        <input type="hidden" name="date_fin" value="<?php echo $_GET['date_fin']; ?>"/>
				        <input type="hidden" name="nbre" value="<?php echo $_GET['nbre']; ?>"/>
				        <input type="submit" value="Réserver ce chalet"/>
				    </form>
				</div>
			</div>
		</div>
<?php
	
    }
  }


} else {
	echo '<br>Effectuez une recherche...';
}
?>
	</div>


<?php
#partie formulaire de recherche
?>
<div class="bg-light border-right" style="width: 20%; height: 100%; margin-left: 80%; position: fixed; text-align: center;">
            <div class="sidebar-heading">Recherche :</div>
            <br>
			<form action="./rechercheReservation.php" method="get">
            <label>Du :
                <input type="date" name="date_debut" <?php if (isset($_GET['date_debut']))  { echo 'value="'.$_GET['date_debut'].'"' ; }?> min="<?php echo date('Y-m-d'); ?>" />
            </label>
            <label>Au :
                <input type="date" name="date_fin" <?php if (isset($_GET['date_fin']))  { echo 'value="'.$_GET['date_fin'].'"' ; }?> min="<?php echo date('Y-m-d'); ?>">
            </label>
            <br>
            <select name="nbre" id="personnes">
<?php		
		for ($i=1 ; $i<7 ; $i++) {
			if (isset($_GET['nbre'])) {
				if ($_GET['nbre']==$i) {
					echo "<option value='$i' selected>$i personnes</option>";
				} else {
					echo "<option value='$i'>$i personnes</option>";
				}
			} else {
				echo "<option value='$i'>$i personnes</option>";
			}		
		}
	?>
            </select>
            <br>
            <br>
            <input type="submit" value="Envoyer"class="btn btn-outline-primary" role="submit">
        	</form>
            <br>
            <br>
            <div class="div-divider" style="border-top: 3px solid black; text-align: center;"></div>
            <img src="../../images/forest.jpg" alt="photo" style="height: 100%; object-fit: cover;">
</div>
</div>

</body>
</html>