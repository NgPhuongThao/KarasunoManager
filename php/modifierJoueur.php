<?php
    if (isset($_POST['valider'])) {
        $linkpdo = connexion(); // Connexion

        $req = "UPDATE joueur
            SET Nom = ?,
            Prenom = ?,
            Photo = ?, 
            DateNaissance = ?,
            Taille = ?,
            Poids = ?,
            PostePrefere = ?,
            Commentaire = ?,
            Statut = ?
            WHERE NumLicence = ?";

        deconnexion($linkpdo); // Déconnexion
    } else{
        include("../include/modifierJoueur.php");
    }
?>