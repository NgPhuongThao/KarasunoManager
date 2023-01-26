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
            // MOYENNE DES EVALUATIONS DE CE JOUEUR
            $req2 = "SELECT AVG(participer.Performance) as Evaluations FROM participer WHERE IdJoueur = " . $row['NumLicence'];
            $res2 = $linkpdo->prepare($req2);
            $res2->execute();

            echo '<tr><td><img src=' . $row['Photo'] . ' width="100"></td>
            <td>' . $row['Taille'] . '</td>
            <td>' . $row['Poids'] . '</td>
            <td>' . $row['PostePrefere'] . '</td>
            <td>' . $row['Commentaire'] . '</td>
            <td>' . round($res2->fetch(PDO::FETCH_ASSOC)['Evaluations'],2) . '</td>
            <td><input type="checkbox" name="titulaire[]" value="' . $row["NumLicence"] . '"></td>
            <td><input type="checkbox" name="remplacant[]" value="' . $row["NumLicence"] . '"></td>
            </tr>';
        }
    }
    deconnexion($linkpdo);
?>