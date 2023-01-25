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

            <label for="comboMatch">Matchs :</label>

            <select name="matchs" id="comboMatch">
                <option value="">--Choisissez un match--</option>
            </select>

            <table>
                <tr>
                    <th>Photo</th>
                    <th>Taille</th>
                    <th>Poids</th>
                    <th>Poste préféré</th>
                    <th>Commentaire</th>
                    <!--<th>Evaluation</th>--> <!--Jsp où c'est trouvable-->
                    <th>Titulaire</th>
                    <th>Remplaçant</th>
                </tr>
                <?php include('../php/feuilles.php'); ?>
            </table>

            <div class="buttons">
                <input type="submit" value="Valider" onclick=""> <!--Ajouter dans le onclick un moyen de dire que ça a bien été validé-->
            </div>
        </div>
    </main>
</body>
</html>