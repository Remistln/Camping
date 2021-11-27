<?php
include '../ConnexionBDD.php';
include './fonction_sql.php';

if (isset($_POST['id_chalet'])) {
	validation_reservation($_POST['id_chalet'], $_POST['id_semaine']);
	header('location: ./admin.php?montre=chalet&fait=modif&i='.$_POST['id_chalet'].'');
}