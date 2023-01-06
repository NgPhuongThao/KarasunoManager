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
            echo '<tr><td>' . $row['Date'] . '</td>
            <td>' . $row['Heure'] . '</td>
            <td>' . $row['NomAdversaire'] . '</td>
            <td>' . $row['LieuDeRencontre'] . '</td>
            <td>' . $row['Resultat'] . '</td>
            <td>
                <div class="btnTable">
                <a href="../includes/modifierMatch.php?dateMatch='.$row['Date'].
                    '&heureMatch='.$row['Heure'].
                    '&nomAdversaire='.$row['NomAdversaire'].
                    '&lieuDeRencontre='.$row['LieuDeRencontre'].
                    '&resultatMatch='.$row['Resultat'].'" class="btnTable">Modifier</a>

                <a href="../php/supprimerMatch.php?date='.$row['Date'].'
                    &nomAdversaire='.$row['NomAdversaire'].'" class="btnTable"
                onclick="return confirm(\'Are you sure?\');">Supprimer</a>
                </div>
            </td>
            </tr>';
        }
    }
    deconnexion($linkpdo);
?>