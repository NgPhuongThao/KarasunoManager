<?php
    if (isset($_POST['valider'])) {
        echo 'Valider';
        // IMPORTS //
        require_once('connexionBD.php');

        // DECLARATION DE VARIABLE //
        $numLicence = $_POST['numLicence'];
        $dateNaissance = date("Y-m-d",strtotime($_POST['dateNaissance']));
        $repoCible = "../img/";

        // Teste si le numéro de licence existe dans la BD
        $linkpdo = connexion(); // Ouverture de connexion
        $req = 'SELECT * FROM JOUEUR WHERE NumLicence = ' . $numLicence;
        $res = $linkpdo->prepare($req);
        $res->execute();

        if ($res->rowCount()==0) {
            // TRAITEMENT DE L'IMAGE //
            if (!empty($_FILES['photo']['name'])) {
                $nomFichier = basename($_FILES['photo']['name']);

                /* // Tant que le fichier existe, ajouter bis 
                while (file_exists($repoCible . $nomFichier)) {
                    // DIVISE LE NOM DU FICHIER
                    $nomFichier = substr($nomFichier, 0, strrpos($nomFichier, ".")); //Récupère le nom du fichier sans l'extension
                    $extensionFichier = substr($nomFichier, 1, strrpos($nomFichier, ".")); //Récupère l'extension du fichier sans l'extension 
    
                    $nomFichier .= 'bis'.$extensionFichier;
                } */

                $cheminFichierCible = $repoCible . $nomFichier;
                $extensionFichier = strtolower(pathinfo($cheminFichierCible, PATHINFO_EXTENSION));
            
                // Extensions autorisées 
                $extensionsAutorisees = array('jpg', 'png', 'jpeg');
                if (in_array($extensionFichier, $extensionsAutorisees)) {
                    // Ajout de l'image aux fichiers
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminFichierCible)) {
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
        echo "Une erreur s'est produite. Veuillez vérifier les informations saisies.";
    }else {
        include('../includes/ajouterJoueur.html');
    }
?>