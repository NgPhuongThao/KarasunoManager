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
            <li><a href="accueil.php">Déconnexion</a></li>
        </ul>
    </header>
    <main>
        <div class="gestion">
            <h1>Mes matchs</h1>

            <table>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Nom équipe adverse</th>
                    <th>Lieu de rencontre</th>
                    <th>Résultat</th>
                    <th>Action</th>
                </tr>
                <?php include('../php/matchs.php'); ?>
            </table>

            <div class="buttons">
                <input type="submit" value="Ajouter un match" onclick="window.open('ajouterMatch.php','wclose',
                'width=700,height=800, toolbar=si, scroolbar=si, status=si,left=500,top=50');return false;">
            </div>
        </div>
    </main>
</body>
</html>