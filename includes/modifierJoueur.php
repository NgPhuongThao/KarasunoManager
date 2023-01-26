<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css?<?php echo time();?>">
    <title>Document</title>
</head>
<body>
    <div class="modification">
        <h1>Modifier un joueur</h1>
        <form action="../php/modifierJoueur.php" method="post" enctype="multipart/form-data">
            <label>Numéro de licence : </label>
            <input type="number" name="numLicence" value="<?php echo $_GET['numLicence'];?>" required><br/>
            <label>Nom : </label>
            <input type="text" name="nom" value="<?php echo $_GET['nom'];?>" required><br/>
            <label>Prénom : </label>
            <input type="text" name="prenom" value="<?php echo $_GET['prenom'];?>" required><br/>
            <label>Date de naissance : </label>
            <input type="date" name="dateNaissance" value="<?php echo $_GET['dateNaissance'];?>" required><br/>
            <label>Taille : </label>
            <input type="number" name="taille" value="<?php echo $_GET['taille'];?>" required><br/>
            <label>Poids : </label>
            <input type="number" name="poids" value="<?php echo $_GET['poids'];?>" required><br/>
            <label for="comboPoste">Poste préféré :</label>
            <select name="postePrefere" id="comboPoste" value="<?php echo $_GET['postePrefere'];?>" required>
            <option disabled selected>--Choisissez un poste--</option>
            <option>Attaquant</option>
            <option>Central</option>
            <option>Libéro</option>
            <option>Passeur</option>
            </select><br/>
            <label for="comboStatut">Statut :</label>
            <select name="statut" id="comboStatut" value="<?php echo $_GET['statut'];?>" required>
            <option disabled selected>--Choisissez un statut--</option>
            <option>Actif(ve)</option>
            <option>Blessé(e)</option>
            <option>Suspendu(e)</option>
            <option>Absent(e)</option>
            </select><br/>
            <label for="commentaire">Commentaire : </label>
            <textarea id="commantaire" name="commentaire" value="<?php echo $_GET['commentaire'];?>"></textarea><br/>
            <label>Photo : </label>
            <input hidden type="text" name="anciennePhoto" value="<?php echo $_GET['photo'];?>">
            <img src="<?php echo $_GET['photo'];?>">
            <input type="file" name="nouvellePhoto">

            <div class="buttons">
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler">
            </div>
        </form>
    </div>
</body>
</html> 