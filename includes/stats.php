<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?<?php echo time();?>">
    <title>Statistiques</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="gestionJoueurs.php">Gestion des joueurs</a></li>
            <li><a href="gestionMatchs.php">Gestion des matchs</a></li>
            <li><a href="#">Feuilles de matchs</a></li>
            <li><a href="stats.php">Statistiques</a></li>
        </ul>
    </header>
    <main>
        <p>Sur (nombre de matchs) matchs :</p>
        <?php echo "<img src='../php/graphe1.php' class='graphique'/>"; ?>
        <p> Bleu : gagné </p>
        <p> Rouge : perdu </p>
    </main>
</body>
</html>