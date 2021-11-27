<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';
$erreur = "";
if(test_string($_POST['log'],50) and test_log_admin($_POST['log'])){
    if(test_string($_POST['mdp'],30)){
        ajout_admin($_POST['log'],$_POST['mdp']);
        header('location: ./admin.php?montre=admin&fait=lire');
    }else{
        $erreur = "Le mots de passe n'est pas valide.";
    }
}else {
    $erreur = "Le nom d'utilisateur n'est pas valide.";
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
</head>
<body>
<form name="form_erreur" action="./admin.php?montre=admin&fait=ajout" method="post">
<input type="hidden" id="erreur" name="erreur" value= "<?php echo $erreur; ?>" >
</form>
<script type="text/javascript"> 
 document.form_erreur.submit(); 
</script> 
</body>
</html>