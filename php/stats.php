<?php
    // IMPORTS //
    require_once('connexionBD.php');

    $linkpdo = connexion();
    
    // CREATION DE LA TABLE DE JOUEURS //
    $req1 = "SELECT Nom, Statut, PostePrefere FROM joueur";
    $res = $linkpdo->prepare($req1);
    $res->execute();

    $req2 = "SELECT idJoueur, COUNT(*) as Titulaire FROM participer WHERE EstTitulaire = 1 GROUP BY IdJoueur";
    $res2 = $linkpdo->prepare($req2);
    $res2->execute();

    $req3 = "SELECT idJoueur, COUNT(*) as Remplaçant FROM participer WHERE EstTitulaire = 0 GROUP BY IdJoueur";
    $res3 = $linkpdo->prepare($req3);
    $res3->execute();

    $req4 = "SELECT participer.idJoueur, AVG(participer.Performance) as Evaluations FROM participer GROUP BY participer.IdJoueur";
    $res4 = $linkpdo->prepare($req4);
    $res4->execute();

    //Ca marche pas jsp comment les mettre
    
    if ($res !== false) {
        foreach ($res as $row) {
            echo '<tr><td>' . $row['Nom'] . '</td>
            <td>' . $row['Statut'] . '</td>
            <td>' . $row['PostePrefere'] . '</td>';  
        }
        foreach ($res2 as $row2) {
            echo '<td>' .$row2['Titulaire'] . '</td>';  
        }
        foreach ($res3 as $row3) {
            echo '<td>' .$row3['Remplaçant'] . '</td>';  
        }
        foreach ($res4 as $row4) {
            echo '<td>' .$row4['Evaluations'] . '</td>';
        }
        echo '</tr>';
    }
    deconnexion($linkpdo);
?>