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
            <label>Lieu de rencontre : </label>
            <input type="text" name="lieuDeRencontre" value="<?php echo $_GET['lieuDeRencontre'];?>" required><br/>
            <label>Résultat : </label>
            <input type="number" name="resultatMatch" value="<?php echo $_GET['resultatMatch'];?>"><br/>

            <div class="buttons">
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" onclick="window.open('gestionMatchs.php','wclose',
                'width=700,height=800, toolbar=si, scroolbar=si, status=si,left=500,top=50');return false;">
            </div>
        </form>
    </div> 
</body>
</html>