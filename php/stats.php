<?php
    // IMPORTS //
    require_once('connexionBD.php');

    $linkpdo = connexion();
    
    // CREATION DE LA TABLE DE JOUEURS //
    $req1 = "SELECT NumLicence, Nom, Statut, PostePrefere FROM joueur";
    $res = $linkpdo->prepare($req1);
    $res->execute();



    //Ca marche pas jsp comment les mettre
    
    if ($res !== false) {
        foreach ($res as $row) {
            $req2 = "SELECT COUNT(*) as Titulaire FROM participer WHERE EstTitulaire = 1 AND IdJoueur = " . $row['NumLicence'];
            $res2 = $linkpdo->prepare($req2);
            $res2->execute();

            $req3 = "SELECT COUNT(*) as Remplacant FROM participer WHERE EstTitulaire = 0 AND IdJoueur = " . $row['NumLicence'];
            $res3 = $linkpdo->prepare($req3);
            $res3->execute();

            $req4 = "SELECT AVG(participer.Performance) as Evaluations FROM participer WHERE IdJoueur = " . $row['NumLicence'];
            $res4 = $linkpdo->prepare($req4);
            $res4->execute();

            echo '<tr><td>' . $row['Nom'] . '</td>
            <td>' . $row['Statut'] . '</td>
            <td>' . $row['PostePrefere'] . '</td>
            <td>' . $res2->fetch(PDO::FETCH_ASSOC)['Titulaire'] . '</td>
            <td>' . $res3->fetch(PDO::FETCH_ASSOC)['Remplacant'] . '</td>
            <td>' . $res4->fetch(PDO::FETCH_ASSOC)['Evaluations'] . '</td>';  

        }
        echo '</tr>';
    }
    deconnexion($linkpdo);
?>