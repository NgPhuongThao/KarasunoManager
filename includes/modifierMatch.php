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
        <h1>Modifier un match</h1>
        <form action="../php/modifierMatch.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <label>Date : </label>
            <input type="date" name="dateMatch" value="<?php echo $_GET['dateMatch'];?>" required><br/>
            <label>Heure : </label>
            <input type="time" name="heureMatch" value="<?php echo $_GET['heureMatch'];?>" required><br/>
            <label>Nom équipe adverse : </label>
            <input type="text" name="nomAdversaire" value="<?php echo $_GET['nomAdversaire'];?>" required><br/>
            <label for="comboRencontre">Lieu de rencontre :</label>
            <select name="lieuDeRencontre" id="comboRencontre" required>
                <option value="<?php echo $_GET['lieuDeRencontre'];?>" disabled selected><?php echo $_GET['lieuDeRencontre'];?></option>
                <option>Domicile</option>
                <option>Extérieur</option>
            </select><br/>
            <label for="comboResultat">Résultat : </label>
            <select name="resultatMatch" id="comboResultat">
                <option value="<?php echo $_GET['resultatMatch'];?>" disabled selected><?php echo $_GET['resultatMatch'];?></option>
                <option>Gagné</option>
                <option>Perdu</option>
                <option>Egalité</option>
            </select><br/>

            <div class="buttons">
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler">
            </div>
        </form>
    </div> 
</body>
</html>