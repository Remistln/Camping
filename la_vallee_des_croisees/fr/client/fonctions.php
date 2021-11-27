<?php

function ajoutClient($nom,$prenom,$date_naissance,$mail,$telephone,$adresse,$cp_ville,$mdp_client,$ville) {
		global $conn;
		$sql = "INSERT INTO Client (nom, prenom, date_naissance, mail, telephone, adresse, cp_ville, mdp_client, ville) VALUES (?,?,?,?,?,?,?,?,?)";
		$resultat = $conn->prepare($sql);
		$resultat->execute(array($nom, $prenom, $date_naissance, $mail, $telephone, $adresse, $cp_ville, $mdp_client,$ville));
		if ($resultat==FALSE) {
			die("probleme de requete sql");
		} else {
			
			$message="Inscription effectuée";
			return $message;
		}
	}

function nonUniqueMail($mail) {
	global $conn;
	$sql = "SELECT * FROM Client WHERE mail=?";
	$resultat=$conn->prepare($sql);
	$resultat->execute(array($mail));
	return $resultat;
}

function verifDate($date) {
	$dateTab=explode('-',$date);
	if (count($dateTab)==3) {
		return checkdate(intval($dateTab[1]),intval($dateTab[2]),intval($dateTab[0]));	
	} else {
		return false;
	}
}

function verifAge($date) {
	$today=date_create(date("Y-m-d"));
	$dateFormat=date_create($date);
	$age=date_diff($today,$dateFormat);
	return intval($age->format('%y'))>=16;
}

function ajoutReservation($mailClient, $idChalet, $idSemaine) {
	global $conn;
	$sql = "SELECT id_client FROM Client WHERE mail=?";
	$resultatId= $conn->prepare($sql);
	$resultatId->execute(array($mailClient));
	$id = $resultatId->fetch();
	$sql = "INSERT INTO Reservation (id_client, id_chalet, id_semaine, valide, date_reservation) VALUES (?,?,?,?,?)";
	$resultat=$conn->prepare($sql);
	$resultat->execute(array($id[0], $idChalet, $idSemaine, 'false', date("Y-m-d")));
	if ($resultat==FALSE) {
		die("probleme de requete sql");
	} else {
		echo "La réservation a été ajoutée";
	}
}


function prix_total($idChalet,$idSemaine) {
	global $conn;
	$sql = "SELECT (type_chalet.prix_base+Prix_special.prix_modifie)*Saison.taux as prix_total FROM type_chalet INNER JOIN chalet ON type_chalet.id_type_chalet=chalet.id_type_chalet INNER JOIN Prix_special ON Chalet.id_chalet=Prix_special.id_chalet INNER JOIN Semaine ON Prix_special.id_semaine=Semaine.id_semaine INNER JOIN Saison ON Semaine.id_saison=Saison.id_saison WHERE chalet.id_chalet=? AND Semaine.id_semaine=?";
	$resultat = $conn ->prepare($sql);
	$resultat->execute(array($idChalet,$idSemaine));
	if ($resultat==FALSE) {
		die("probleme de requete sql");
	} else {
		$donnee=$resultat->fetch();
		if ($donnee==FALSE) {
		    $sql ="SELECT taux FROM Semaine INNER JOIN Saison ON Semaine.id_saison=Saison.id_saison WHERE id_semaine=?";
		    $resultat = $conn->prepare($sql);
		    $resultat->execute(array($idSemaine));
		    $donnee=$resultat->fetch();
		    $taux=$donnee['taux'];
		    $sql = "SELECT prix_base FROM Chalet INNER JOIN type_chalet ON Chalet.id_type_chalet=type_chalet.id_type_chalet WHERE id_chalet=?";
		    $resultat=$conn->prepare($sql);
		    $resultat->execute(array($idChalet));
		    $donnee=$resultat->fetch();
		    $prix_base=$donnee['prix_base'];
		    $prixBD=$prix_base*$taux;
		    return $prixBD;
		} else {
			return $donnee['prix_total'];
		}
	}
}

function listSemaine($date_debut,$date_fin) {
	global $conn;
	$sql = "SELECT Semaine.date_debut, Semaine.date_fin, Semaine.id_semaine FROM Semaine INNER JOIN Saison ON Semaine.id_saison=Saison.id_saison WHERE  (Semaine.date_debut<=:date_debut1 AND Semaine.date_fin>=:date_fin1) OR (Semaine.date_debut<=:date_debut2 AND Semaine.date_fin>=:date_debut3) OR (Semaine.date_debut>=:date_debut4 AND Semaine.date_fin<=:date_fin2) OR (Semaine.date_debut<=:date_fin3 AND Semaine.date_fin>=:date_fin4)";
	$resultat = $conn->prepare($sql);
	$resultat->execute(array('date_debut1' => $date_debut, 'date_fin1' => $date_fin, 'date_debut2' => $date_debut, 'date_debut3' => $date_debut, 'date_debut4' => $date_debut,'date_fin2' => $date_fin, 'date_fin3' => $date_fin, 'date_fin4' => $date_fin));
	if ($resultat==FALSE) {
		die("probleme de requete sql");
	} else {
		$semaines=$resultat->fetchAll();
		return $semaines;
	}
}

function listChalet($nb_place) {
	global $conn;
	$sql = "SELECT chalet.id_chalet, type_chalet.libelle, type_chalet.id_type_chalet FROM Chalet INNER JOIN type_chalet ON Chalet.id_type_chalet=type_chalet.id_type_chalet WHERE nb_place>=?";
	$resultat = $conn->prepare($sql);
	$resultat->execute(array($nb_place));
	if ($resultat==FALSE) {
		die("probleme de requete sql");
	} else {
		$chalets=$resultat->fetchAll();
		return $chalets;
	}
}

function imageChalet($idTypeChalet) {
	if ($idTypeChalet==1) {
		echo '<img src="../../images/petit/image.jpg" alt="image" style="width: 20%; float: left;">';
 	} elseif ($idTypeChalet==2) {
		echo '<img src="../../images/moyen/image.jpg" alt="image" style="width: 20%; float: left;">';
 	} elseif ($idTypeChalet==3) {
		echo '<img src="../../images/grand/image.jpg" alt="image" style="width: 20%; float: left;">';
 	} else {
 		echo "Id type chalet $idTypeChalet non présent";
 	}
}
	
function descriptionChalet($idTypeChalet) {
	if ($idTypeChalet==1) {
		echo "Pour les budget restreint, nous disposons de dortoir privé pour une famille de 2 à 4 personnes avec comme dispositive une petite cuisine, d’une chambre commune, d’une salle de bain et d’une télévision. Tout ceci dans l’univers d’Harry Potter, comme si vous étiez dans les dortoirs d’une maison tel que Gryffondor à Poudlard.";
 	} elseif ($idTypeChalet==2) {
 		echo "Ce chalet est destiné aux personnes avec un budget moyen, c’est pour ça qu’il ressemble à la maison d’un hobbit, mais cela ne veut pas dire que celui-ci est mauvais, bien au contraire. Il dispose d’une cuisine, d’un grand salon avec une télé et de 3 chambres pouvant contenir 6 personnes au total et est constitué de deux étages et deux salles de bain. La maison est une reproduction complète de la maison de bilbo saquet.";
 	} elseif ($idTypeChalet==3) {
 		echo "Ce chalet est destiné aux personnes les plus aisées est vont disposer d’une maison dans les arbres qui fait référence aux chalets des elfes, ils vont disposer d’un jacuzzi personnel de deux salles de bain, de 4 chambres qui peux contenir 6 à 10 personnes, d’une immense cuisine et d’un salon avec une télévision.";
 	} else {
 		echo "Id type chalet $idTypeChalet non présent";
 	}
}

function reservationdejafaite($mailClient, $idChalet, $idSemaine) {
	global $conn;

	$sql = "SELECT id_client FROM Client WHERE mail=?";
	$resultatId= $conn->prepare($sql);
	$resultatId->execute(array($mailClient));
	$id = $resultatId->fetch();
	$sql = "SELECT * FROM Reservation where id_chalet=? AND id_client=? AND id_semaine=?";
	$resultat=$conn->prepare($sql);

	$resultat->execute(array($idChalet,$id[0],$idSemaine));
	if ($resultat==FALSE) {
		die("probleme de requete sql");
	} else {
		$donnees=$resultat->fetch();
		if ($donnees==FALSE) {
			return $donnees;
		} else {
			return TRUE;
		}
	}
}

function chaletReserve($idChalet, $idSemaine) {
	global $conn;
	$sql = "SELECT * FROM Reservation WHERE id_chalet= ? AND id_semaine=?";
	$resultat=$conn->prepare($sql);
	$resultat->execute(array($idChalet, $idSemaine));
	if ($resultat==FALSE) {
		die("probleme de requete sql");
	} else {
		$donnees=$resultat->fetch();
		if ($donnees==FALSE) {
			return $donnees;
		} else {
			return TRUE;
		}
	}
}

function etatChalet($mail_client, $idChalet, $idSemaine,$voir) {
	#verifier si le chalet est déja réservé
	if (!chaletreserve($idChalet,$idSemaine)) {
		if ($voir) {
			echo "Libre";
		}
		return True;
	} else {
		#Verifier si c'est le client qui l'a réservé
		if (reservationdejafaite($mail_client,$idChalet,$idSemaine)) {

			echo "Vous avez déjà réservé le chalet";
			return False;
		} else {

			echo "Le chalet a déja été réservé";
			return False;
		}
	}
}

function listReservation($mail) {
	global $conn;
	$sql = "SELECT id_client FROM Client WHERE mail=?";
	$resultat= $conn->prepare($sql);
	$resultat->execute(array($mail));
	$id = $resultat->fetch();
	$sql = "SELECT libelle, Semaine.id_semaine, Type_chalet.id_type_chalet, Chalet.id_chalet, valide, nb_place, date_debut, date_fin FROM Type_chalet INNER JOIN Chalet ON Type_chalet.id_type_chalet=Chalet.id_type_chalet INNER JOIN Reservation ON Chalet.id_chalet=Reservation.id_chalet INNER JOIN Semaine ON Reservation.id_semaine=Semaine.id_semaine WHERE id_client=? AND date_fin>getdate() ORDER BY date_debut";
	$resultat = $conn->prepare($sql);
	$resultat->execute(array($id['id_client']));
	return $resultat;
}

function supprimeReservation($chalet, $semaine) {
	global $conn;
	$sql = "DELETE FROM Reservation WHERE id_chalet=? AND id_semaine=?";
	$resultat= $conn->prepare($sql);
	$resultat->execute(array($chalet,$semaine));
}

function prenom($mail) {
	global $conn;	
	$sql ="SELECT prenom FROM Client WHERE mail=?";
	$resultat= $conn->prepare($sql);
	$resultat->execute(array($mail));
	$prenom=$resultat->fetch();
	return $prenom;
}