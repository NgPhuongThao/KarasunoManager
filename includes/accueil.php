<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?<?php echo time();?>">
    <title>Accueil</title>
</head>
<body>
    <form action="../php/connexion.php" method="post">
        <div class="connexion">
            <h1>Connexion</h1>
            <input type="text" id="username" name="identifiant" placeholder="Entrez votre identifiant"><br/>
            <input type="password" id="password" name="mdp" placeholder="Entrez votre mot de passe"><br/>
            <?php
                if (isset($_GET['erreur'])) {
                    echo "L'identifiant ou le mot de passe est incorrect.</br>";
                }
            ?>
            <input type="submit" id="submit" name="seConnecter" value="Se connecter">
        </div>
    </form>
</body>
</html>