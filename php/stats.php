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
            // Récupère le nombre de fois où le joueur a été titulaire
            $req2 = "SELECT COUNT(*) as Titulaire FROM participer WHERE EstTitulaire = 1 AND IdJoueur = " . $row['NumLicence'];
            $res2 = $linkpdo->prepare($req2);
            $res2->execute();

            // Récupère le nombre de fois où le joueur a été remplaçant
            $req3 = "SELECT COUNT(*) as Remplacant FROM participer WHERE EstTitulaire = 0 AND IdJoueur = " . $row['NumLicence'];
            $res3 = $linkpdo->prepare($req3);
            $res3->execute();

            // Récupère la moyenne d'évaluations d'un joueur
            $req4 = "SELECT AVG(participer.Performance) as Evaluations FROM participer WHERE IdJoueur = " . $row['NumLicence'];
            $res4 = $linkpdo->prepare($req4);
            $res4->execute();

            // Calcul le pourcentage de matchs gagnés
            $resMatchGagne = $linkpdo->prepare("SELECT count(*) as MatchGagne FROM participer, matchDispute
            WHERE matchDispute.resultat = 'Gagné' AND matchDispute.IdMatch = participer.IdMatch AND IdJoueur = " . $row['NumLicence']);
            $resMatchGagne->execute();
            $matchsGagnes = $resMatchGagne->fetch(PDO::FETCH_ASSOC)['MatchGagne'];

            $resMatchs = $linkpdo->prepare("SELECT count(*) as MatchGagne FROM participer WHERE IdJoueur = " . $row['NumLicence']);
            $resMatchs->execute();
            $nbMatchs = $resMatchs->fetch(PDO::FETCH_ASSOC)['MatchGagne'];

            $pourcentageMatchsGagnes = 0;
            if ($nbMatchs != 0) {
                $pourcentageMatchsGagnes = ($matchsGagnes / $nbMatchs) * 100;
            }

            // Ajoute la ligne du tableau
            echo '<tr><td>' . $row['Nom'] . '</td>
            <td>' . $row['Statut'] . '</td>
            <td>' . $row['PostePrefere'] . '</td>
            <td>' . $res2->fetch(PDO::FETCH_ASSOC)['Titulaire'] . '</td>
            <td>' . $res3->fetch(PDO::FETCH_ASSOC)['Remplacant'] . '</td>
            <td>' . $res4->fetch(PDO::FETCH_ASSOC)['Evaluations'] . '</td>
            <td>' . $pourcentageMatchsGagnes . '</td>';  

        }
        echo '</tr>';
    }
    deconnexion($linkpdo);
?>