<?php
    header("Location: ../includes/gestionMatchs.php");
    require_once("connexionBD.php");
    $linkpdo = connexion(); // Connexion

    $req = "DELETE FROM matchdispute WHERE IDMatch = ?";
    $res = $linkpdo->prepare($req);
    $res->execute(array($_GET['id']));

    deconnexion($linkpdo); // Déconnexion
?> 