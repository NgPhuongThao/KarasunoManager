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
            <li><a href="feuillesMatchs.php">Feuilles de matchs</a></li>
            <li><a href="stats.php">Statistiques</a></li>
            <li><a href="accueil.php">Déconnexion</a></li>
        </ul>
    </header>
    <main>
        <div class="gestion">
            <h1>Statistiques</h1>
            <h3>
                <?php
                    require_once('../php/connexionBD.php');
                    $linkpdo = connexion();
                    $res = $linkpdo->prepare("SELECT COUNT(*) as test FROM MatchDispute WHERE Resultat IS NOT NULL");
                    $res->execute();
                    foreach ($res as $row) {
                        if ($row['test'] == 1){
                            echo "Sur 1 match :";
                        } else {
                            echo "Sur " .$row['test']." matchs :";
                        }
                    }
                    deconnexion($linkpdo);
                ?>
            </h3>
            <?php echo "<img src='../php/graphe1.php' class='graphique'/>"; ?>
            <p> Bleu : gagné / Rouge : perdu / Gris : égalité </p>

            <table>
                <tr>
                    <th>Nom</th>
                    <th>Statut actuel</th>
                    <th>Poste préféré</th>
                    <th>Nombre de sélections titulaire</th>
                    <th>Nombre de sélections remplaçant</th>
                    <th>Moyenne des évaluations</th>
                    <th>Pourcentage de matchs gagnés</th>
                </tr>
                <?php include('../php/stats.php'); ?>
            </table>
        </div>
    </main>
</body>
</html>

