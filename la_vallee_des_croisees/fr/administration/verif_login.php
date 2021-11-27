<?php
session_start();
include '../ConnexionBDD.php';
function verification($user, $pwd)
{
    global $conn;
    $requete="select mail, mdp_client from Client where mail = ? and mdp_client = ?;";
    $effet = $conn->prepare($requete);
    $effet->execute(array($user, $pwd));
    $ligne = $effet->fetch();
    if(isset($ligne['mail'])){
        return "client";
    }
    else{
        $requete="select login_administrateur, mdp_administrateur from Administrateur where login_administrateur = ? and mdp_administrateur = ?;";
        $effet = $conn->prepare($requete);
        $effet->execute(array($user, $pwd));
        $ligne = $effet->fetch();
        if(isset($ligne['login_administrateur'])){
            return "admin";
        } else{
            return "inconnu";
        }
    }
}

function prenom($mail) {
    global $conn;
    $sql ="SELECT prenom FROM Client WHERE mail=?";
    $resultat= $conn->prepare($sql);
    $resultat->execute(array($mail));
    $prenom=$resultat->fetch();
    return $prenom['prenom'];
}

$verif = verification($_POST["log"], $_POST["mdp"]);

if ($verif == "inconnu") {

  header('location: ../connexion.php');
}elseif($verif == "client"){
    session_start();
    $_SESSION['prenom']= prenom($_POST["log"]);
    $_SESSION["mail"]= $_POST["log"];
  header('location: ../index.php');
}elseif($verif == "admin"){
    session_start();
    $_SESSION["log"]= $_POST["log"];
    header('location: ./admin.php');

}

?>