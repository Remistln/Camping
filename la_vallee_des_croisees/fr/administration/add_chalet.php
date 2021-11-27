<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';
ajout_chalet($_POST['type']);
header('location: ./admin.php?montre=chalet&fait=lire')

?>