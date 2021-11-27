<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesinsc.css">
    <title>Inscription</title>
    <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">
  <link href='../dist/toastifier.min.css' rel="stylesheet">
    <style>
    
        @import 
      url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');
      
       *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          list-style:none; 
          text-decoration: none;
          font-family: 'Josefin Sans', sans-serif;
       }
       .coin {
        background-color:#f9fbfd;
        border:1px solid #183c5f;
        padding:5px;
        width:auto ; 
        height:auto;
        /*arrondir les coins en haut à gauche et en bas à droite*/
        -moz-border-radius:10px ;
        -webkit-border-radius:10px ;
        border-radius:10px ;
       
        }
        </style>
</head>
<body> 
<?php
include('./connexionBDD.php');

require('./client/fonctions.php');

## Inscription du client

#verification du nom
if (isset($_POST['nom'])) {
	if (!empty($_POST['nom'])) { #Si le champ est vide
		$nom=$_POST['nom'];
	} else {
		die("le nom est obligatoire");
	}
}

#verification du prenom
if (isset($_POST['prenom'])) { 
	if (!empty($_POST['prenom'])) { #Si le champ est vide
		$prenom=$_POST['prenom'];
	} else {
		die("le prenom est obligatoire");
	}
}

#verification de la date de naissance
if (isset($_POST['date'])) 
	if (!empty($_POST['date'])) { #si le champ est vide
		if (verifDate($_POST['date'])) { #si l'age a le bon format
			if (verifAge($_POST['date'])) { #si age legal
				$date=$_POST['date'];
			} else {
				die("l'âge minimal pour s'inscrire est de 16 ans");
			}
		} else {
			die("la date n'est pas valide");
		}
	} else {
		die("la date est obligatoire");
}

#verification de l'adresse mail
if (isset($_POST['mail'])) {
	if (!empty($_POST['mail'])) {
		if (strlen($_POST['mail'])<=150) {

			if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
				if (nonUniqueMail($_POST['mail'])) {
					$mail=$_POST['mail'];
				} else {
					die("ce mail est déjà utilisé");
				}
			} else {
				die("mauvais format du mail");
			}
		} else {
                        echo var_dump(strlen($_POST['mail']));
			die("le mail est trop grand, taille invalide");
		}
	} else {
		die("le mail est obligatoire");
	}
}

#verification du téléphone
if (isset($_POST['telephone'])) {
	if (strlen($_POST['telephone'])<=50) {
		$telephone=$_POST['telephone'];
	} else {
		die("le telephone est trop grand, taille invalide");
	}
}

#verification de l'adresse
if (isset($_POST['adresse'])) {
	$adresse=$_POST['adresse'];
}

#verification du code postal
if (isset($_POST['cp'])) {
	if (!empty($_POST['cp'])) {
		if (strlen($_POST['cp'])<=50) {
			$cp=$_POST['cp'];
		} else {
			die("le code postal est trop grand, taille invalide");
		}
	} else {
		die("le code postal est obligatoire");
	}
}

#verification du mot de passe
if (isset($_POST['mdp']) && isset($_POST['mdp2'])) {
	if (!empty($_POST['mdp']) && (!empty($_POST['mdp2']))) {
		if ($_POST['mdp']==$_POST['mdp2']) { 
			if (strlen($_POST['mdp'])<=30) {
				$mdp=$_POST['mdp'];
			} else {
				die("le mot de passe est trop grand, taille invalide");
			}
		} else {
			die("le mot de passe ne correspond pas au mot de passe retapé");
		}
	} else {
		die("le mot de passe est obligatoire");
	}
} else {
}

#verification de la ville
if (isset($_POST['ville'])) {
	if (!empty($_POST['ville'])) {  
		if (strlen($_POST['ville'])<=58) {
			$ville=$_POST['ville'];
		} else {
			die("la longueur du champ ville est trop grande, taille invalide");
		}
	} else {
		die("la ville est obligatoire");
	}
}
#AJout du client dans la base de données
if (isset($_POST['ville'])) {
	$message = ajoutClient($nom, $prenom, $date, $mail, $telephone, $adresse, $cp, $mdp, $ville);
}
?>

    <div style="margin-top:5%;margin-left:2%;">

        <div class="container coin text-center">
        <h1>S'inscrire</h1>
        <form action="./inscription.php" method="POST" class="formulaire">
        <div class="formulaire">
            <label for="name">nom:</label>
            <input type="text" name="nom" id="name" required>
        </div>
        <div class="formulaire">
            <label for="prénom">prénom:</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div class="formulaire">
            <label for="date de naissance">date de naissance:</label>
            <input type="date" name="date" id="date-de-naissance" required>
        </div>
        <div class="formulaire">
            <label for="tel">téléphone:</label>
            <input type="text" name="telephone" id="tel" required>
        </div>
        <div class="formulaire">
            <label for="login">adresse mail:</label>
            <input type="text" name="mail" id="login" required>
        </div>
        <div class="formulaire">
            <label for="password">mot de passe:</label>
            <input type="password" name="mdp" id="password" required>
        </div>
        <div class="formulaire">
            <label for="password">confirmation mot de passe:</label>
            <input type="password" name="mdp2" id="password" required>
        </div>
        <div class="formulaire">
            <label for="adresse">adresse:</label>
            <input type="text" name="adresse" id="adresse" required>
        </div>
        <div class="formulaire">
            <label for="ville">ville:</label>
            <input type="text" name="ville" id="ville" required>
        </div>
        <div class="formulaire">
            <label for="cp">code postal:</label>
            <input type="text" name="cp" id="cp" required>
        </div>

        <div style="margin-top:1cm;">
            <input type="submit" value="S'inscrire"> 

        </div>
    <p><?php if (isset($message)) { echo $message;} ?></p> 
        <div style="margin-top:1cm;">
            <input type="button" onclick="window.location.href = './connexion.php';" value="Se connecter">
        </div>
        </form>
    </div>
</div>
</body>
</html>
