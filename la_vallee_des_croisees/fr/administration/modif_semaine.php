<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';

if ($_POST['date_d']>$_POST['date_f']) {
	$erreur='la date du début doit être avant la date de fin';
} else {
	modif_semaine($_POST['numero'], $_POST['date_d'],$_POST['date_f'] ,$_POST['annee'],$_POST['saison'],$_POST['id']);
	header('location: ./admin.php?montre=semaine&fait=lire');
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
</head>
<body>
<form name="form_erreur" action="./admin.php?montre=semaine&fait=modif&i=<?php echo $_POST['id']; ?>" method="post">
<input type="hidden" id="erreur" name="erreur" value= "<?php echo $erreur; ?>" >
</form>
<script type="text/javascript"> 
document.form_erreur.submit(); 
</script> 
</body>
</html>