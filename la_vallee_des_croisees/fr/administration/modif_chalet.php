<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';
if (!is_numeric($_POST['prix'])) {
	$erreur='La valeur doit être numérique';
} else {
	modif_prix($_POST['id_chalet'], $_POST['id_semaine'],$_POST['prix']);
	header('location: ./admin.php?montre=chalet&fait=modif&i='.$_POST['id_chalet'].'');
}

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
</head>
<body>
<form name="form_erreur" action="<?php echo "./admin.php?montre=chalet&fait=modif&i=" . $_POST['id_chalet']; ?>" method="post">
<input type="hidden" id="erreur" name="erreur" value= "<?php echo $erreur; ?>" >
</form>
<script type="text/javascript"> 
 document.form_erreur.submit(); 
</script> 
</body>
</html>