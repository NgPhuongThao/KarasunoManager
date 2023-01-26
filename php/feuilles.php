<?php
    // IMPORTS //
    require_once('connexionBD.php');

    $linkpdo = connexion();
    
    // CREATION DE LA TABLE DE JOUEURS //
    $req = "SELECT * FROM joueur WHERE Statut = 'actif(ve)'";
    $res = $linkpdo->prepare($req);
    $res->execute(); 
    if ($res !== false) {
        foreach ($res as $row) {
            echo '<tr><td>' . $row['Photo'] . '</td>
            <td>' . $row['Taille'] . '</td>
            <td>' . $row['Poids'] . '</td>
            <td>' . $row['PostePrefere'] . '</td>
            <td>' . $row['Commentaire'] . '</td>
            <td><input type="checkbox" name="titulaire[]" value="' . $row["NumLicence"] . '"></td>
            <td><input type="checkbox" name="remplacant[]" value="' . $row["NumLicence"] . '"></td>
            </tr>';
        }
    }
    deconnexion($linkpdo);
?>