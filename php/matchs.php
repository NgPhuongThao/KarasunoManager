<?php
    // IMPORTS //
    require_once('connexionBD.php');

    $linkpdo = connexion();
    
    // CREATION DE LA TABLE DE JOUEURS //
    $req = "SELECT * FROM matchdispute";
    $res = $linkpdo->prepare($req);
    $res->execute(); 
    if ($res !== false) {
        foreach ($res as $row) {
            echo '<tr><td>' . $row['DateMatch'] . '</td>
            <td>' . $row['Heure'] . '</td>
            <td>' . $row['NomAdversaire'] . '</td>
            <td>' . $row['LieuDeRencontre'] . '</td>
            <td>' . $row['Resultat'] . '</td>
            <td>
                <div class="btnTable">
                <a href="../includes/modifierMatch.php?id='.$row['IdMatch'].
                    '&dateMatch='.$row['DateMatch'].
                    '&heureMatch='.$row['Heure'].
                    '&nomAdversaire='.$row['NomAdversaire'].
                    '&lieuDeRencontre='.$row['LieuDeRencontre'].
                    '&resultatMatch='.$row['Resultat'].'" class="btnTable">Modifier</a>

                <a href="../php/supprimerMatch.php?id='.$row['IdMatch'].'" class="btnTable"
                onclick="return confirm(\'Êtes-vous sûr.e ?\');">Supprimer</a>
                </div>
            </td>
            </tr>';
        }
    }
    deconnexion($linkpdo);
?>