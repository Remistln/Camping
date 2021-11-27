<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';
if(test_string($_POST['mdp'],30))
{
    modif_admin($_POST['id'],$_POST['mdp']);
    header('location: ./admin.php?montre=admin&fait=lire');
}

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
</head>
<body>
<form name="form_erreur" action="<?php echo "./admin.php?montre=admin&fait=modif&i=" . $_POST['id']; ?>" method="post">
<input type="hidden" id="erreur" name="erreur" value= "Le mots de passe n'est pas valide." >
</form>
<script type="text/javascript"> 
 document.form_erreur.submit(); 
</script> 
</body>
</html>