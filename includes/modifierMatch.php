<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="modification">
        <h1>Modifier un match</h1>
        <form action="../php/modifierMatch.php" method="post">
            <label>Date : </label>
            <input type="date" name="dateMatch" value="<?php echo $_GET['dateMatch'];?>" required><br/>
            <label>Heure : </label>
            <input type="time" name="heureMatch" value="<?php echo $_GET['heureMatch'];?>" required><br/>
            <label>Nom équipe adverse : </label>
            <input type="text" name="nomAdversaire" value="<?php echo $_GET['nomAdversaire'];?>" required><br/>
            <label>Lieu de rencontre : </label>
            <input type="text" name="lieuDeRencontre" value="<?php echo $_GET['lieuDeRencontre'];?>" required><br/>
            <label>Résultat : </label>
            <input type="number" name="resultatMatch" value="<?php echo $_GET['resultatMatch'];?>" required><br/>

            <div class="buttons">
                <input type="submit" value="Valider">
                <input type="reset" value="Annuler">
            </div>
        </form>
    </div> 
</body>
</html>