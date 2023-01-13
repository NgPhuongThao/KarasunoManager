<?php
    // IMPORTS //
    require_once('connexionBD.php');

    $linkpdo = connexion();
    
    // CREATION DE LA TABLE DE JOUEURS //
    $req = "SELECT Nom, Statut, PostePrefere FROM joueur";
    $res = $linkpdo->prepare($req);
    $res->execute(); 
    if ($res !== false) {
        foreach ($res as $row) {
            echo '<tr><td>' . $row['Nom'] . '</td>
            <td>' . $row['Statut'] . '</td>
            <td>' . $row['PostePrefere'] . '</td>
            </tr>';
        }
    }
    deconnexion($linkpdo);
?>