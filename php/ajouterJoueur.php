<?php
    if (isset($_POST['valider'])) {
        echo 'Valider';
        // IMPORTS //
        require_once('connexionBD.php');

        // DECLARATION DE VARIABLE //
        $numLicence = $_POST['numLicence'];
        $dateNaissance = date("Y-m-d",strtotime($_POST['dateNaissance']));
        $repoCible = "../img/";

        $req = 'SELECT * FROM JOUEUR WHERE NumLicence = ' . $numLicence;
        $res = $linkpdo->prepare($req);
        $res->execute();
        if ($res->rowCount()==0) {
            // TRAITEMENT DE L'IMAGE //
            if (!empty($_FILES['photo']['name'])) {
                $nomFichier = basename($_FILES['photo']['name']);
                $cheminFichierCible = $repoCible . $nomFichier;
                $extensionFichier = strtolower(pathinfo($cheminFichierCible, PATHINFO_EXTENSION));
            
                // Extensions autorisées 
                $extensionsAutorisees = array('jpg', 'png', 'jpeg');
                if (in_array($extensionFichier, $extensionsAutorisees)) {
                    // Ajout de l'image aux fichiers
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminFichierCible)) {
                        $linkpdo = connexion(); // Ouverture de connexion
                        // Préparation de la requête
                        $req = "INSERT INTO JOUEUR (NumLicence, Nom, Prenom, Photo, DateNaissance, Taille, Poids, PostePrefere, Commentaire, Statut) 
                        VALUES (?,?,?,?,?,?,?,?,?,?)";
                        $res = $linkpdo->prepare($req);
                        // Exécution de la requête
                        $res->execute(array($numLicence,$_POST['nom'],$_POST['prenom'],$cheminFichierCible,
                        $dateNaissance,$_POST['taille'],$_POST['poids'],$_POST['postePrefere'],
                        $_POST['commentaire'],$_POST['statut']));
                        deconnexion($linkpdo); // Déconnexion
                        echo "<script>window.close();</script>"; // Fermeture de la fenêtre
                    }
                }
            }
        }
    }else {
        include('../includes/ajouterJoueur.html');
    }
?>