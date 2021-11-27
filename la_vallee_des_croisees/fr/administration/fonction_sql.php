<?php
//Fonction sql : x fait et v idiotproof
/* Les tableaux interactions :
    list des administrateur
        ajout  xv
        modification xv
        suppression x
    liste des chalets
        ajout xv
        suppression x
    liste des clients
        ajout xv
        modification xv
        suppression x
    liste des semaines
        ajout x
        modification x
        suppression x
    liste des reservation
        ajout x
        suppression x
    liste des prix_spéciaux par chalet par semaine
        ajout et modification x
*/
include '../ConnexionBDD.php';

//régle des fonctions test : elle return True si la condition est respectée
function test_string($string, $taille)//testé
{
    if(strlen($string)>0 and strlen($string) <= $taille){
        return True;
    }
    return False;
}

function test_log_admin($log)//testé
{
    global $conn;
    $effet = $conn->query('select login_administrateur from Administrateur');
    $valide=True;
    while($ligne = $effet->fetch())
    {
        if($ligne['login_administrateur'] == $log){
            $valide=False;
        }
    }
    return $valide;
}

function test_mail($mail) //testé
{
    if (filter_var($mail, FILTER_VALIDATE_EMAIL) and test_string($mail, 150)){
        global $conn;
        $effet = $conn->query('select mail from Client');
        $valide=True;
        while($ligne = $effet->fetch())
        {
            if($ligne['mail'] == $mail){
                $valide=False;
            }
        }
        return $valide;
    }
    return False;
}

function ajout_admin($login,$mdp) //testé (vérifié les log existant)
{
    global $conn;
    $requette ="INSERT into Administrateur(login_administrateur, mdp_administrateur) values (?, ?);";
    $effet = $conn->prepare($requette);
    $effet->execute(array($login,$mdp));
}

function suppr_admin($id) //testé
{
    global $conn;
    $requette="DELETE from Administrateur where id = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($id));
}

function modif_admin($id,$mdp) //testé
{
    global $conn;
    $requette="UPDATE Administrateur set mdp_administrateur = ? where id = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($mdp,$id));
}

function ajout_chalet($type) //testé
{
    global $conn;
    $requette ="select id_type_chalet from type_chalet where id_type_chalet = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($type));
    $ligne =$effet->fetch();
    $requette ="INSERT into Chalet(id_type_chalet) values (?);";
    $effet = $conn->prepare($requette);
    $effet->execute(array($ligne['id_type_chalet']));
}

function suppr_chalet($id) //testé
{
    global $conn;
	$requette = "DELETE FROM Reservation WHERE id_chalet=?;";
	$effet = $conn->prepare($requette);
    $effet->execute(array($id));
	$requette = "DELETE FROM Prix_special WHERE id_chalet=?;";
	$effet = $conn->prepare($requette);
    $effet->execute(array($id));
    $requette="DELETE from Chalet where id_chalet = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($id));
}

function ajout_client($nom, $prenom, $date_naissance, $mail, $telephone, $adresse, $cp_ville, $mdp_client, $ville) //testé
{
    global $conn;
    $requette="INSERT into Client(nom, prenom, date_naissance, mail, telephone, adresse, cp_ville, mdp_client, ville) values (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $effet = $conn->prepare($requette);
    $effet->execute(array($nom, $prenom, $date_naissance, $mail, $telephone, $adresse, $cp_ville, $mdp_client, $ville));

}

function modif_client($mail, $nom, $prenom, $date_naissance, $telephone, $adresse, $cp_ville, $mdp_client, $ville) //testé
{
    global $conn;
    $requette="UPDATE Client set nom = ? , prenom = ? , date_naissance = ? , telephone = ?, adresse = ? , cp_ville = ?, mdp_client = ?, ville = ? where mail = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($nom, $prenom, $date_naissance, $telephone, $adresse, $cp_ville, $mdp_client, $ville, $mail));
}

function suppr_client($mail) //testé
{
    global $conn;
    $requette="DELETE Client where mail = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($mail));
}

//ajout_client("Najare", "Aya", "2001-01-01", "fun@prout.com", '0107080905', "572 avenue du mal à la tête", "59126", "rose", "Joie");

function ajout_semaine($numero, $date_d, $date_f, $annee, $saison)//testé
{
    global $conn;
    $requette = "insert into Semaine(numero_semaine, date_debut, date_fin, annee, id_saison) values (?, ?, ?, ?, ?);";
    $effet = $conn->prepare($requette);
    $effet->execute(array($numero, $date_d, $date_f, $annee, $saison));
}

function suppr_semaine($id) //testé
{
    global $conn;
    $requette="DELETE Semaine where id_semaine = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($id));
}

function modif_semaine($numero, $date_d, $date_f, $annee, $saison, $id) //testé
{
    global $conn;
    $requette = "Update Semaine set numero_semaine = ? , date_debut = ?, date_fin = ? , annee = ?, id_saison = ? where id_semaine = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($numero, $date_d, $date_f, $annee, $saison, $id));
}



function date_futur($date_string) //testé
{
    $date_time = new DateTime($date_string);
    $date_now = new DateTime("now");
    if ($date_now <= $date_time) {
        return TRUE;
    }
    return FALSE;
}

function modif_prix($id_chalet, $id_semaine, $prix) //testé
{
    global $conn;
    #on veut savoir si un prix modifié a déjà été créé
    $requette = "select prix_modifie from prix_special where id_chalet = ? and id_semaine = ? ;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($id_chalet, $id_semaine));

    #modification dans la base de données
    if ($effet->rowCount() != 0){
        $requette = "update prix_special set prix_modifie = ? where id_chalet = ? and id_semaine = ? ;";
        $effet = $conn->prepare($requette);
        $effet->execute(array($prix, $id_chalet, $id_semaine));
    }else{
        $requette = "insert into prix_special(prix_modifie,id_chalet,id_semaine) values(?,?,?);";
        $effet = $conn->prepare($requette);
        $effet->execute(array($prix, $id_chalet, $id_semaine));
    }
}


function ajout_reservation($id_client, $id_chalet, $id_semaine, $today) //testé
{
    global $conn;
    $requette = "insert into Reservation(id_client, id_chalet, id_semaine, date_reservation, valide) values (?, ?, ?, ?, 'False');";
    $effet = $conn->prepare($requette);
    $effet->execute(array($id_client, $id_chalet, $id_semaine, $today));
}

function suppr_reservation($id_client, $id_chalet, $id_semaine)
{
    global $conn;
    $requette="DELETE Reservation where id_client = ? and id_chalet = ? and id_semaine = ?;";
    $effet = $conn->prepare($requette);
    $effet->execute(array($id_client, $id_chalet, $id_semaine));
}

function etat_chalet($id_chalet,$id_semaine) {
    global $conn;
    $sql = "SELECT valide FROM Reservation WHERE id_chalet=? AND id_semaine=?";
    $resultat= $conn->prepare($sql);
    $resultat->execute(array($id_chalet, $id_semaine));
    $ligne=$resultat->fetch();
    if ($ligne==FALSE) {
        return 'Non réservé';
    } else {
        if ($ligne['valide']) {
            return 'Réservé';
        } else {
            return 'En attente de paiement';
        }
    }
}

function modification_prix($id_chalet,$id_semaine) {
    global $conn;
    $sql = "SELECT valide FROM Reservation WHERE id_chalet=? AND id_semaine=?";
    $resultat= $conn->prepare($sql);
    $resultat->execute(array($id_chalet, $id_semaine));
    $ligne=$resultat->fetch();
    if ($ligne==FALSE) {
        return True;
    } else {
        return False;

    }
}

function reservation_attente ($id_chalet, $id_semaine) {
    global $conn;
    $sql = "SELECT valide FROM Reservation WHERE id_chalet=? AND id_semaine=?";
    $resultat= $conn->prepare($sql);
    $resultat->execute(array($id_chalet, $id_semaine));
    $ligne=$resultat->fetch();
    if ($ligne==FALSE) {
        return FALSE;
    } else {
        if ($ligne['valide']==True) {
            return False;
        } else {
            return True;
        }
    }
}

function validation_reservation($id_chalet, $id_semaine) {
    global $conn;
    $sql = "UPDATE Reservation SET valide='True' WHERE id_chalet=? AND id_semaine=?";
    $resultat= $conn->prepare($sql);
    $resultat->execute(array($id_chalet, $id_semaine));
}

function reservation($id_chalet, $id_semaine) {
    global $conn;
    $sql = "SELECT * FROM Reservation WHERE id_chalet=? AND id_semaine=?";
    $resultat = $conn->prepare($sql);
    $resultat->execute(array($id_chalet, $id_semaine));
    $donnee=$resultat->fetch();
    if ($donnee==FALSE) {
        return FALSE;
    } else {
        return TRUE;
    }
}
?>

