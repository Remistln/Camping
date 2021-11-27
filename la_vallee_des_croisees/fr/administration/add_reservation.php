<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';

if (reservation($_POST['chalet'],$_POST['semaine'])) {
	$erreur="Ce chalet est déjà réservé pour cette semaine";
} else {
	ajout_reservation($_POST['client'], $_POST['chalet'], $_POST['semaine'], $_POST['date']);
	header('location: ./admin.php?montre=reserv&fait=lire');
}
?>


<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
</head>
<body>
<form name="form_erreur" action="./admin.php?montre=reserv&fait=ajout" method="post">
<input type="hidden" id="erreur" name="erreur" value= "<?php echo $erreur; ?>" >
</form>
<script type="text/javascript"> 
 document.form_erreur.submit(); 
</script> 
</body>
</html>