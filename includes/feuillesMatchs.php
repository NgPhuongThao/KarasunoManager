<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?<?php echo time();?>">
    <title>Gestion des matchs</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="gestionJoueurs.php">Gestion des joueurs</a></li>
            <li><a href="gestionMatchs.php">Gestion des matchs</a></li>
            <li><a href="feuillesMatchs.php">Feuilles de matchs</a></li>
            <li><a href="stats.php">Statistiques</a></li>
        </ul>
    </header>
    <main>
        <div class="gestion">
            <h1>Feuilles de match</h1>
            <form action="../php/inscriptionJoueurMatch.php" method="post">
                <label for="comboMatch">Matchs :</label>

                <!-- Interdire de sélectionner un joueur en tant que titulaire ET remplacant -->
                <select name="matchs" id="comboMatch">
                    <option value="" disabled selected>--Choisissez un match--</option>
                    <?php
                        require_once('../php/connexionBD.php');
                        $linkpdo = connexion();
                        $res = $linkpdo->prepare("SELECT IdMatch, NomAdversaire, DateMatch, Heure FROM matchdispute WHERE RESULTAT IS NULL");
                        $res->execute();
                        foreach ($res as $row) {
                            echo "<option value='".$row['IdMatch']."'>".$row['NomAdversaire'].", ".$row['DateMatch']." ".$row['Heure']."</option>";
                        }
                        deconnexion($linkpdo);
                    ?>
                </select>

                <table>
                    <tr>
                        <th>Photo</th>
                        <th>Taille</th>
                        <th>Poids</th>
                        <th>Poste préféré</th>
                        <th>Commentaire</th>
                        <!--<th>Evaluation</th>-->
                        <th>Titulaire</th>
                        <th>Remplaçant</th>
                    </tr>
                    <?php include('../php/feuilles.php'); ?>
                </table>

                <div class="buttons">
                    <!-- Activer/désactiver le bouton si il n'y a pas 6 équipes sélectionnées -->
                    <input type="submit" name="valider" value="Valider" onclick=""> <!--Ajouter dans le onclick un moyen de dire que ça a bien été validé-->
                </div>
            </form>
        </div>
    </main>
</body>
</html>