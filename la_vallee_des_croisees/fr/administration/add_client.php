<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';

$valide = True;
$erreur = "";
if ( ! test_mail($_POST['mail'])){
    $valide = False;
    $erreur .= "Le mail n'est pas valide. <br>";
}
if ( ! test_string($_POST['tel'],50)){
    $valide = False;
    $erreur .= "Le numero de téléphone n'est pas valide. <br>";
}
if ( ! test_string($_POST['cp'],50)){
    $valide = False;
    $erreur .= "Le code postal n'est pas valide. <br>";
}
if ( ! test_string($_POST['mdp'], 30)){
    $valide = False;
    $erreur .= "Le mots de passe n'est pas valide. <br>";
}
if ( ! test_string($_POST['ville'],58)){
    $valide = False;
    $erreur .= "La ville n'est pas valide. <br>";
}
if ($valide){
    ajout_client($_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['cp'], $_POST['mdp'], $_POST['ville']);
    header('location: ./admin.php?montre=client&fait=lire');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
</head>
<body>
<form name="form_erreur" action="./admin.php?montre=client&fait=ajout" method="post">
<input type="hidden" id="erreur" name="erreur" value= "<?php echo $erreur; ?>" >
</form>
<script type="text/javascript"> 
 document.form_erreur.submit(); 
</script> 
</body>
</html>