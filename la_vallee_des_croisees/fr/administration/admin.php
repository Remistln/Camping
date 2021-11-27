<?php
    session_start();
    if (!isset($_SESSION['log']) ){
        header('location: ../connexion.php');
    }
    include '../ConnexionBDD.php';
    include './fonction_sql.php';
    include '../client/fonctions.php';
    function message_erreur(){
        if(isset($_POST['erreur'])){
            echo $_POST['erreur'];
        }
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Administration de la vallée des croisés</title>
</head>
<body>
    <div>
        <p>Connecté en tant que : <?php echo $_SESSION['log']; ?></p>
        <p><a href="./logout.php">se déconnecter</a> </p>
    </div>
    <div>
    <table border=1>
        <tr>
            <td><a href="./admin.php?montre=admin">Administrateurs</a></td>
            <td><a href="./admin.php?montre=client">Clients</a></td>
            <td><a href="./admin.php?montre=chalet">Mobil-Home</a></td>
            <td><a href="./admin.php?montre=semaine">Semaines</a></td>
            <td><a href="./admin.php?montre=reserv">Réservation</a></td>
        </tr>
    </table border=1>
    <?php
    if (!isset($_GET['montre'])) {
        die();
    }
    switch ($_GET['montre']){
        case "admin":

            switch ((isset($_GET['fait']) ? $_GET['fait'] : "lire")){
                case "lire":
                    echo "<a href='./admin.php?montre=admin&fait=ajout'>Ajouter</a>";
                    ?>
                    <table border=1>
                        <tr>
                            <td>Login</td>
                            <td>Mot de Passe</td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                    global $conn;
                    $effet = $conn->query('select * from Administrateur');
                    while($ligne = $effet->fetch()){
                        echo "<tr><td>" . $ligne['login_administrateur'] . "</td>";
                        echo "<td>" . $ligne['mdp_administrateur'] . "</td>";
                        echo "<td><a href='./admin.php?montre=admin&fait=modif&i=". $ligne['id'] ."'>Modifier</a></td>";
                        echo "<td><a href='./admin.php?montre=admin&fait=suppr&i=". $ligne['id'] ."'>Supprimer</a></td></tr>"; 
                    }
                    echo "</table>";

                    break;
                
                case "ajout":
                    ?>
                    <form action="./add_admin.php" method="post">
                        <label for="log">Login :</label>
                        <input type="text" id="log" name="log" required><br><br>
                        <label for="mdp">Mot de Passe :</label>
                        <input type="text" id="mdp" name="mdp" required><br><br>
                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    message_erreur();
                    break;

                case "suppr":
                    suppr_admin($_GET['i']);
                    break;

                case "modif":
                    $effet = $conn->query('select * from Administrateur where id = '. $_GET['i'] . ';');
                    $ligne = $effet->fetch();
                    ?>
                    <form action="./modif_admin.php" method="post">
                        Login : <?php echo $ligne['login_administrateur']; ?><br><br>
                        <label for="nom">Mot de Passe :</label>
                        <input type="text" id="mdp" name="mdp" value= "<?php echo $ligne['mdp_administrateur']; ?>" required><br><br>
                        <input type="hidden" name="id" value="<?php echo $_GET['i'];?>">
                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    message_erreur();
                    break;
            }
            break;

        case "client":
            switch ((isset($_GET['fait']) ? $_GET['fait'] : "lire")){
                case "lire":
                    echo "<a href='./admin.php?montre=client&fait=ajout'>Ajouter</a>";
                    ?>
                    <table border=1>
                        <tr>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Date de Naissance</td>
                            <td>Telephone</td>
                            <td>Mail</td>
                            <td>Mot de Passe</td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                    global $conn;
                    $effet = $conn->query('select nom, prenom, date_naissance, mail, mdp_client, telephone, id_client from Client;');
                    while($ligne = $effet->fetch()){
                        echo "<tr><td>" . $ligne['nom'] . "</td>";
                        echo "<td>" . $ligne['prenom'] . "</td>";
                        echo "<td>" . $ligne['date_naissance'] . "</td>";
                        echo "<td>" . $ligne['telephone'] . "</td>";
                        echo "<td>" . $ligne['mail'] . "</td>";
                        echo "<td>" . $ligne['mdp_client'] . "</td>";
                        echo "<td><a href='./admin.php?montre=client&fait=modif&i=". $ligne['id_client'] ."'>Modifier</a></td>";
                        echo "<td><a href='./admin.php?montre=client&fait=suppr&i=". $ligne['id_client'] ."'>Supprimer</a></td>";
                    }
                     echo "</tr></table>";                    
                    break;

                case "ajout":
                    ?>
                    <form action="./add_client.php" method="post">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required><br><br>

                        <label for="prenom">Prenom :</label>
                        <input type="text" id="prenom" name="prenom" required><br><br>

                        <label for="date">Date de Naissance :</label>
                        <input type="date" id="date" name="date" required><br><br>

                        <label for="tel">Telephone :</label>
                        <input type="text" id="tel" name="tel" required><br><br>

                        <label for="adresse">Adresse :</label>
                        <input type="text" id="adresse" name="adresse" required><br><br>

                        <label for="cp">Code Postal :</label>
                        <input type="text" id="cp" name="cp" required><br><br>

                        <label for="ville">Ville :</label>
                        <input type="text" id="ville" name="ville" required><br><br>

                        <label for="mail">Mail :</label>
                        <input type="text" id="mail" name="mail" required><br><br>

                        <label for="mdp">Mot de Passe :</label>
                        <input type="text" id="mdp" name="mdp" required><br><br>
                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    message_erreur();
                    break;
                case "suppr":
                    suppr_client($_GET['i']);
                    break;

                case "modif":
                    $effet = $conn->query('select * from Client where id_client = '. $_GET['i'] . ';');
                    $ligne = $effet->fetch();
                     ?>
                    <form action="./modif_client.php" method="post">
                        

                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value= "<?php echo $ligne['nom']; ?>" required><br><br>

                        <label for="prenom">Prenom :</label>
                        <input type="text" id="prenom" name="prenom" value= "<?php echo $ligne['prenom']; ?>" required><br><br>

                        <label for="date">Date de Naissance:</label>
                        <input type="date" id="date" name="date" value= "<?php echo $ligne['date_naissance']; ?>" required><br><br>

                        <label for="telephone">Telephone :</label>
                        <input type="text" id="telephone" name="telephone" value= "<?php echo $ligne['telephone']; ?>" required><br><br>

                        Mail : <?php echo $ligne['mail']; ?><br><br>
                        <input type="hidden" id="mail" name="mail" value= "<?php echo $ligne['mail']; ?>" >
                        <input type="hidden" id="id_client" name="id_client" value= "<?php echo $ligne['id_client']; ?>" >

                        <label for="adresse">Adresse :</label>
                        <input type="text" id="adresse" name="adresse" value= "<?php echo $ligne['adresse']; ?>" required><br><br>

                        <label for="ville">Ville :</label>
                        <input type="text" id="ville" name="ville" value= "<?php echo $ligne['ville']; ?>" required><br><br>

                        <label for="cp">Code Postal :</label>
                        <input type="text" id="cp" name="cp" value= "<?php echo $ligne['cp_ville']; ?>" required><br><br>

                        <label for="nom">Mot de Passe :</label>
                        <input type="text" id="mdp" name="mdp" value= "<?php echo $ligne['mdp_client']; ?>" required><br><br>
                        
                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    message_erreur();
                    break;
            }  
            break;

        case "chalet": 
            switch ((isset($_GET['fait']) ? $_GET['fait'] : "lire")){
                case "lire":
                    ?>
                    <table border=1>
                        <tr>
                            <td>Type</td>
                            <td>Nombre de Place</td>
                            <td>Prix</td>
                        </tr>
                    <?php
                    global $conn;
                    $effet = $conn->query("select * from type_chalet;");
                    while($ligne = $effet->fetch()){
                        echo "<tr><td>" . $ligne["libelle"] . "</td>";
                        echo "<td>" . $ligne["nb_place"] . "</td>";
                        echo "<td>" . $ligne["prix_base"] . "</td></tr>";
                    }
                    echo "</table>";

                    echo "<a href='./admin.php?montre=chalet&fait=ajout'>Ajouter un chalet</a>";
                    ?>
                    <table border=1>
                        <tr>
                            <td>Numéro</td>
                            <td>Type</td>
                            <td>Prix de la semaine actuelle</td>
                            <td>Etat de la semaine actuelle</td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                    
                    $taux_sql = $conn->query('select taux from Semaine, Saison where Semaine.id_saison = Saison.id_saison and date_debut <= GETDATE() and date_fin >= GETDATE();');
                    if ($taux_sql->rowCount() != 0){
                        $taux_resultat = $taux_sql->fetch();
                        $taux = $taux_resultat['taux'];
                    }else{
                        $taux=1;
                    }

                    $effet = $conn->query('SELECT Chalet.id_chalet, libelle, prix_base from Chalet  INNER JOIN type_chalet  ON Chalet.id_type_chalet = type_chalet.id_type_chalet ;');
                    while($ligne = $effet->fetch()){
                        #numero
                        echo "<tr><td>" . $ligne['id_chalet'] . "</td>";
                        #type
                        echo "<td>" . $ligne['libelle'] . "</td>";
                        #prix
                        $prix_spe_sql = 'SELECT prix_modifie from Semaine INNER JOIN prix_special ON prix_special.id_semaine = Semaine.id_semaine where id_chalet = ? and date_debut <= GETDATE() and date_fin >= GETDATE();';
                        $prix_spe = $conn->prepare($prix_spe_sql);
                        $prix_spe->execute(array($ligne['id_chalet']));
                        if ($prix_spe->rowCount() != 0){
                            $prix_spe_resultat = $prix_spe->fetch();
                            $prix = $ligne['prix_base'] + $prix_spe_resultat['prix_modifie'];
                        }else{
                            $prix = $ligne['prix_base'];
                        }
                        $prix = $prix * $taux;
                        echo "<td>" . $prix . "</td>";
                        #Etat
                        $reserv_sql = "select valide from Reservation, Semaine where id_chalet = ? and Reservation.id_semaine = Semaine.id_semaine and date_debut <= GETDATE() and date_fin >= GETDATE();";
                        $reserv = $conn->prepare($reserv_sql);
                        $reserv->execute(array($ligne['id_chalet']));
                        $etat = $reserv->fetch();
                        if ($etat){
                            if ($etat['valide']) {
                                    echo "<td>Réservé cette Semaine</td>";
                            }else{
                                echo "<td>En attente de paiement</td>";
                            }
                        }else{
                            echo "<td>Non reservé</td>";
                        }
                        #modifier
                        echo "<td><a href='./admin.php?montre=chalet&fait=modif&i=". $ligne['id_chalet'] ."'>Modifier les prix</a></td>";
                        #supprimer
                        echo "<td><a href='./admin.php?montre=chalet&fait=suppr&i=". $ligne['id_chalet'] ."'>Supprimer le chalet</a></td></tr>";
                    }
                    echo "</table>";
                break;
            case "ajout":
                ?>
                    <form action="./add_chalet.php" method="post">
                        <label for="type">Type :</label>
                        <select name ="type">
                        <?php
                        global $conn;
                        $effet = $conn->query("select * from type_chalet;");
                        while($ligne = $effet->fetch()){
                            echo '<option value="'.$ligne['id_type_chalet'].'">'.$ligne['libelle'].'</option>';
                        }
                        ?>
                        </select><br><br>

                        <input type="submit" value="Envoyer">
                    </form>
                <?php
                break;

            case "suppr":
                suppr_chalet($_GET['i']);
                break;
                
            case "modif":
                echo 'Modification du prix du chalet '. $_GET['i'].' : ';
                ?>
                    <table border=1>
                        <tr>
                            <td>Date Début</td>
                            <td>Date Fin</td>
                            <td>Etat</td>
                            <td>Modification du Prix</td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                    global $conn;
                    $requete = 'select Semaine.id_semaine, numero_semaine, date_debut, date_fin, prix_modifie from Semaine left join (select prix_modifie, id_semaine from prix_special  where id_chalet = ?) as prix on Semaine.id_semaine = prix.id_semaine order by annee,numero_semaine;';
                    $effet = $conn->prepare($requete);
                    $effet->execute(array($_GET['i']));
                    while($ligne = $effet->fetch()) {
                            echo "<tr><td>" . $ligne['date_debut'] . "</td>";
                            echo "<td>" . $ligne['date_fin'] . "</td>";

                            echo "<td>" . etat_chalet($_GET['i'], $ligne['id_semaine']) ."</td>";
                            if (modification_prix($_GET['i'],$ligne['id_semaine'])) {
                                echo '<form action="./modif_chalet.php" method="post">';
                                echo '<td> <input type="text" id="prix" name="prix" value= ' . $ligne['prix_modifie'] .'> </td>';
                                echo '<input type="hidden" id="id_semaine" name="id_semaine" value="'.$ligne['id_semaine'].'">';
                                echo '<input type="hidden" id="id_chalet" name="id_chalet" value="'.$_GET['i'].'">';
                                echo '<td> <input type="submit" value="Modifier"> </td>';
                                echo '</form>';
                            } else {
                                echo '<td>' . $ligne['prix_modifie'] . '</td>';
                            }
                            if (reservation_attente($_GET['i'],$ligne['id_semaine'])) {
                                echo '<form action="./validationchalet.php" method="POST">';
                                echo '<td>';
                                echo '<input type="hidden" id="id_semaine" name="id_semaine" value="'.$ligne['id_semaine'].'">';
                                echo '<input type="hidden" id="id_chalet" name="id_chalet" value="'.$_GET['i'].'">';
                                echo '<td> <input type="submit" value="Valider la réservation"> </td>';
                                echo '</form>';
                                echo "</td>"; 
                            }
                            echo "</tr>";
                    }
                    echo "</table>";
                    message_erreur();
                    break;
                break;
            }
            break;

        case "semaine":
            switch ((isset($_GET['fait']) ? $_GET['fait'] : "lire")){
                case "lire":
                    echo "<a href='./admin.php?montre=semaine&fait=ajout'>Ajouter</a>";
                    ?>
                    <table border=1>
                        <tr>
                            <td>Numéro</td>
                            <td>Date Début</td>
                            <td>Date Fin</td>
                            <td>Saison</td>
                            <td>Année</td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php
                    global $conn;
                    $effet = $conn->query('select id_semaine, numero_semaine, date_debut, date_fin, annee, type from Semaine, Saison where Semaine.id_saison = Saison.id_saison order by numero_semaine;');
                    while($ligne = $effet->fetch()){
                        echo "<tr><td>" . $ligne['numero_semaine'] . "</td>";
                        echo "<td>" . $ligne['date_debut'] . "</td>";
                        echo "<td>" . $ligne['date_fin'] . "</td>";
                        echo "<td>" . $ligne['type'] . "</td>";
                        echo "<td>" . $ligne['annee'] . "</td>";
                        echo "<td><a href='./admin.php?montre=semaine&fait=modif&i=". $ligne['id_semaine'] ."'>Modifier</a></td>";
                        echo "<td><a href='./admin.php?montre=semaine&fait=suppr&i=". $ligne['id_semaine'] ."'>Supprimer</a></td></tr>";
                     }
                    echo "</table>";
                    break;
                case "ajout":
                    ?>

                    <form action="./add_semaine.php" method="post">
                        <label for="numero">Numéro :</label>
                        <input type="number" id="numero" name="numero" min="1"><br><br>

                        <label for="date_d">Date Début :</label>
                        <input type="date" id="date_d" name="date_d" required><br><br>

                        <label for="date_f">Date Fin :</label>
                        <input type="date" id="date_f" name="date_f" required><br><br>

                        <label for="saison">Saison :</label><?php //faire une requête ici si saison dynamique ?>
                        <select id="saison" name="saison">
                            <option value="1"> Basse </option>
                            <option value="2"> Moyenne </option> 
                            <option value="3"> Haute </option> 
                        </select><br><br>

                        <label for="annee">Année :</label>
                        <input type="number" id="annee" name="annee" value="<?php echo date('Y'); ?>" min="<?php echo date('Y'); ?>" required><br><br>

                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    message_erreur();
                    break;
                case "suppr":
                    suppr_semaine($_GET['i']);
                    break;

                case "modif":
                    $effet = $conn->query('select id_semaine, numero_semaine, date_debut, date_fin, annee, id_saison from Semaine where id_semaine = '. $_GET['i'] . ';');
                    $ligne = $effet->fetch();
                    ?>
                    <form action="./modif_semaine.php" method="post">
                        <label for="numero">Numéro :</label>
                        <input type="number" id="numero" name="numero" value = "<?php echo $ligne["numero_semaine"]; ?>" min="1" required><br><br>

                        <label for="date_d">Date Début :</label>
                        <input type="date" id="date_d" name="date_d" value = <?php echo $ligne["date_debut"]; ?> required><br><br>

                        <label for="date_f">Date Fin :</label>
                        <input type="date" id="date_f" name="date_f" value = <?php echo $ligne["date_fin"]; ?> required><br><br>

                        <label for="saison">Saison :</label><?php //faire une requête ici si saison dynamique ?>
                        <select id="saison" name="saison" value="selectionner à nouveau la saison">
                            <option value="1" <?php if ($ligne['id_saison'] == 1) {echo "selected='selected'";}?> > Basse </option> 
                            <option value="2" <?php if ($ligne['id_saison'] == 2) {echo "selected='selected'";}?>> Moyenne </option> 
                            <option value="3" <?php if ($ligne['id_saison'] == 3) {echo "selected='selected'";}?>> Haute </option> 
                        </select><br><br>

                        <label for="annee">Année :</label>
                        <input type="number" id="annee" name="annee" value = <?php echo $ligne["annee"]; ?> required><br><br>

                        <input type="hidden" id="id" name="id" value="<?php echo $_GET['i'];?>" >

                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    message_erreur();
                    break;

        
            }
            break;
        case "reserv":
            switch ((isset($_GET['fait']) ? $_GET['fait'] : "lire")){
                case "lire":
                    echo "<a href='./admin.php?montre=reserv&fait=ajout'>Ajouter</a>";
                    ?>
                    <table border=1>
                        <tr>
                            <td>Date du Début</td>
                            <td>Etat de la reservation</td>
                            <td>Nom du Client</td>
                            <td>Prenom du Client</td>
                            <td>Mobil-Home</td>
                            <td></td>
                        </tr>
                    <?php
                    global $conn;
                    $effet = $conn->query('select valide , id_chalet, nom, prenom, date_debut, Reservation.id_client, Reservation.id_semaine from Reservation, Semaine, Client where Reservation.id_client = Client.id_client and Reservation.id_semaine = Semaine.id_semaine ;');
                    while($ligne = $effet->fetch()){
                        echo "<tr><td>" . $ligne['date_debut'] . "</td>";
                        echo "<td>" . $ligne['valide'] . "</td>";
                        echo "<td>" . $ligne['nom'] . "</td>";
                        echo "<td>" . $ligne['prenom'] . "</td>";
                        echo "<td>" . $ligne['id_chalet'] . "</td>";
                        echo "<td><a href='./admin.php?montre=reserv&fait=suppr&ch=". $ligne['id_chalet'] ."&cl=". $ligne['id_client'] ."&se=". $ligne['id_semaine'] ."'>Supprimer</a></td></tr>";
                    }
                    echo "</table>";
                    break;
                case "ajout":
                    // Informations: -un select client(Nom, Prenom, mail) -un select chalet(id, type) -un select semaine(date début)
                    global $conn;
                    $clients = $conn->query("select id_client, nom, prenom, mail from Client;");
                    $chalets = $conn->query("select id_chalet, libelle from Chalet, type_chalet where Chalet.id_type_chalet = type_chalet.id_type_chalet;");
                    $semaines = $conn->query("select id_semaine, date_debut from Semaine;");
                    $date_now = new DateTime("now");
                    $today_string = $date_now->format("Y-m-d");
                    ?>
                    <form action="./add_reservation.php" method="post">
                        <label for="chalet">Chalet :</label>
                        <select id="chalet" name="chalet">
                            <?php 
                            while($ligne = $chalets->fetch()){
                                echo '<option value="'.$ligne['id_chalet'].'"> '.$ligne['id_chalet'].' '.$ligne['libelle'].' </option>';
                            }
                            ?>
                        </select><br><br>

                        <label for="client">Client :</label>
                        <select id="client" name="client">
                            <?php 
                            while($ligne = $clients->fetch()){
                                echo '<option value="'.$ligne['id_client'].'"> '.$ligne['nom'].' '.$ligne['prenom'].' '.$ligne['mail'].' </option>';
                            }
                            ?>
                        </select><br><br>
                        <label for="semaine">Date du Début de la Reservation :</label>
                        <select id="semaine" name="semaine">
                            <?php 
                            while($ligne = $semaines->fetch()){
                                echo '<option value="'.$ligne['id_semaine'].'"> '.$ligne['date_debut'].' </option>';
                            }
                            ?>
                        </select><br><br>
                        <input type="hidden" id="date" name="date" value="<?php echo $today_string;?>" >
                        <input type="submit" value="Envoyer">
                    </form>
                    <?php
                    message_erreur();                    
                    break;
                case "suppr":
                    suppr_reservation($_GET['cl'],$_GET['ch'],$_GET['se']);
                    break;
            }
            break;
                
    }
    ?>
    </div>
</body>