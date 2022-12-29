<?php
    header("Location: ../includes/gestionJoueurs.php");
    require_once("connexionBD.php");
    $nomFichier = $_GET['photo'];
    $linkpdo = connexion(); // Connexion

    $req = "DELETE FROM joueur WHERE NumLicence = ?";
    $res = $linkpdo->prepare($req);
    $res->execute(array($_GET['numLicence']));

    deconnexion($linkpdo); // Déconnexion
    if (file_exists($nomFichier)) {
        unlink($nomFichier);
    }
?> 