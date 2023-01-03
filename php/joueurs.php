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
            <td>
                <input type="submit" class="btnTable" value="Modifier" 
                    href="../includes/modifierJoueur.php?
                    numLicence='.$row['NumLicence'].
                    '&nom='.$row['Nom'].
                    '&prenom='.$row['Prenom'].
                    '&photo='.$row['Photo'].
                    '&dateNaissance='.$row['DateNaissance'].
                    '&taille='.$row['Taille'].
                    '&poids='.$row['Poids'].
                    '&postePrefere='.$row['PostePrefere'].
                    '&commentaire='.$row['Commentaire'].
                    '&statut='.$row['Statut'].'">
                
                <input type="submit" class="btnTable" value="Supprimer" 
                    href="../php/supprimerJoueur.php?
                    numLicence='.$row['NumLicence'].'
                    &photo='.$row['Photo'].'" 
                onclick="return confirm(\'Are you sure?\');">
            </td>
            </tr>';
        }
    }
    deconnexion($linkpdo);
?>