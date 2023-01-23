<?php
    // SI BOUTON VALIDER //
    if (isset($_POST['valider'])) {
        // IMPORTS //
        require_once("connexionBD.php");

        $linkpdo = connexion(); // Connexion
        $date = date("Y-m-d",strtotime($_POST['dateMatch']));

        // MODIFIE LE JOUEUR DANS LA BDD
        $req = "UPDATE matchdispute
            SET DateMatch = ?,
            Heure = ?,
            NomAdversaire = ?,
            LieuDeRencontre = ?,
            Resultat = ?
            WHERE IdMatch = ?";
        $res = $linkpdo->prepare($req);
        $res->execute(array($date,
                            $_POST['heureMatch'],
                            $_POST['nomAdversaire'],
                            $_POST['lieuDeRencontre'],
                            $_POST['resultatMatch'],
                            $_POST['id']));
        deconnexion($linkpdo); // Déconnexion
        header("Location: ../includes/gestionMatchs.php");
    } else{
        include("../includes/modifierMatch.php");
    }
?>