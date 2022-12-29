<?php
    require_once("connexionBD.php");
    $linkpdo = connexion(); // Connexion

    $req = "DELETE joueur WHERE NumLicence = " . $_GET['numLicence'];
    $res = $linkpdo->prepare($req);
    $res->execute();

    deconnexion($linkpdo); // Déconnexion

    include("../includes/gestionJoueurs.php");
?>