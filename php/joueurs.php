<?php
    // IMPORTS //
    require_once('connexionBD.php');

    $linkpdo = connexion();
    
    // CREATION DE LA TABLE DE JOUEURS //
    $req = "SELECT * FROM joueur";
    $res = $linkpdo->prepare($req);
    $res->execute(); 
    if ($res !== false) {
        foreach ($res as $row) {
            echo '<tr><td>' . $row['NumLicence'] . '</td>
            <td>' . $row['Nom'] . '</td>
            <td>' . $row['Prenom'] . '</td>
            <td>' . $row['DateNaissance'] . '</td>
            <td>' . $row['Taille'] . '</td>
            <td>' . $row['Poids'] . '</td>
            <td>' . $row['PostePrefere'] . '</td>
            <td>' . $row['Statut'] . '</td>
            </tr>';
        }
    }
    deconnexion($linkpdo);
?>