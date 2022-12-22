<?php
    if (isset($_POST['Valider'])) {
        // IMPORTS //
        require_once('connexionBD.php');

        // DECLARATION DE VARIABLE //
        $linkpdo = connexion();
        $numLicence = $POST['numLicence'];
        $repoCible = "../img/";

        $req = 'SELECT * FROM JOUEUR WHERE NumLicence = ' . $numLicence;
        $res = $linkpdo->prepare($req);
        $res->execute();
        if ($res == false) {
            // TRAITEMENT DE L'IMAGE //
            if (!empty($_FILES["file"]["name"])) {
                $nomFichier = basename($_FILES["file"]["name"]);
                $cheminFichierCible = $repoCible . $nomFichier;
                $extensionFichier = pathinfo($cheminFichierCible, PATHINFO_EXTENSION);
            
                // Extensions autorisées 
                $extensionsAutorisees = array('jpg', 'png', 'jpeg');
                if (in_array($extensionFichier, $extensionsAutorisees)) {
                    // Ajout de l'image aux fichiers
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $cheminFichierCible)) {
                        $req = 'INSERT INTO JOUEUR VALUES (?,?,?,?, to_date(?, \'dd-mm-yyyy\'),?,?,?,?,?)';
                        $res = $linkpdo->prepare($req);
                        $res->execute(array($numLicence,$_POST['nom'],$_POST['prenom'],$cheminFichierCible,
                        $POST['dateNaissance'],$_POST['taille'],$_POST['poids'],$_POST['postePrefere'],
                        $_POST['commentaire'],$_POST['statut']));
                    }
                }
            }
        }
        deconnexion($linkpdo);
    }else {
        include('../includes/ajouterJoueur.html');
    }
?>