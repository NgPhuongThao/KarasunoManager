<?php

    if (isset($_POST['valider'])) {
        // IMPORTS //
        require_once('connexionBD.php');

        // DECLARATION DE VARIABLE //
        $dateMatch = date("Y-m-d",strtotime($_POST['dateMatch']));
        $heure = str_split($_POST["heureMatch"], );

        // Teste si le match oppose un autre dans la BD
        $linkpdo = connexion(); // Ouverture de connexion
        $req = 'SELECT * FROM MatchDispute WHERE DateMatch = '.$dateMatch.
        ' AND DATEPART(HOUR, Heure) = '.$heure;
        $res = $linkpdo->prepare($req);
        $res->execute();

        if ($res->rowCount()==0) {
            // Préparation de la requête
            $req = "INSERT INTO MatchDispute (DateMatch, Heure, NomAdversaire, LieuDeRencontre, Resultat)
            VALUES (?,?,?,?,?)";
            $res = $linkpdo->prepare($req);
            // Exécution de la requête
            $res->execute(array($dateMatch,$_POST["heureMatch"],$_POST["equipeadverseMatch"],
            $_POST["lieurencontreMatch"], $_POST["resultatMatch"]));

            deconnexion($linkpdo); // Déconnexion
            echo "<script>window.close();</script>"; // Fermeture de la fenêtre
        } else {
            echo "Vous aviez déjà programmé un match à cette horaire.";
        }
    }else {
        include('../includes/ajouterMatch.html');
    }
?>