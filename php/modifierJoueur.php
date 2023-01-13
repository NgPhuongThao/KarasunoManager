<?php
    // SI BOUTON VALIDER //
    if (isset($_POST['valider'])) {
        // IMPORTS //
        require_once("connexionBD.php");

        $linkpdo = connexion(); // Connexion
        $numLicence = $_POST['numLicence'];
        $dateNaissance = date("Y-m-d",strtotime($_POST['dateNaissance']));

        // MODIFIE LE JOUEUR DANS LA BDD
        $req = "UPDATE joueur
            SET Nom = ?,
            Prenom = ?,
            DateNaissance = ?,
            Taille = ?,
            Poids = ?,
            PostePrefere = ?,
            Commentaire = ?,
            Statut = ?
            WHERE NumLicence = ?";
        $res = $linkpdo->prepare($req);
        $res->execute(array($_POST['nom'],
                            $_POST['prenom'],
                            $dateNaissance,
                            $_POST['taille'],
                            $_POST['poids'],
                            $_POST['postePrefere'],
                            $_POST['commentaire'],
                            $_POST['statut'],
                            $_POST['numLicence']));

        // TRAITEMENT DE L'IMAGE //
        if (!empty($_FILES['nouvellePhoto']['name'])) {
            // SUPPRIME L'ANCIENNE PHOTO
            if (file_exists($_POST['anciennePhoto'])) {
                unlink($_POST['anciennePhoto']);
            }

            $repoCible = "../img/";
            $nomFichier = basename($_FILES['nouvellePhoto']['name']);
            // Tant que le fichier existe, ajouter bis
            while (file_exists($repoCible . $nomFichier)) {
                // DIVISE LE NOM DU FICHIER
                $nomFichier_extension = explode(".",$nomFichier);
                $nomFichier = $nomFichier_extension[0] . "bis." . strtolower($nomFichier_extension[1]);
            }

            $cheminFichierCible = $repoCible . $nomFichier;
            $extensionFichier = strtolower(pathinfo($cheminFichierCible, PATHINFO_EXTENSION));
        
            // Extensions autorisées 
            $extensionsAutorisees = array('jpg', 'png', 'jpeg');
            if (in_array($extensionFichier, $extensionsAutorisees)) {
                // Ajout de l'image aux fichiers
                if (move_uploaded_file($_FILES["nouvellePhoto"]["tmp_name"], $cheminFichierCible)) {

                    // Préparation de la requête
                    $req = "UPDATE joueur SET Photo = ? WHERE NumLicence = ?";
                    $res = $linkpdo->prepare($req);
                    // Exécution de la requête
                    $res->execute(array($cheminFichierCible,$_POST['numLicence']));

                    deconnexion($linkpdo); // Déconnexion
                    header("Location: ../includes/gestionJoueurs.php");
                } 
            } else {
                include("../includes/modifierJoueur.php");
                echo "L'extension de votre fichier doit être .jpg, .png ou .jpeg.";
            }
        }
        deconnexion($linkpdo); // Déconnexion
        header("Location: ../includes/gestionJoueurs.php");
    } else{
        include("../includes/modifierJoueur.php");
    }
?>