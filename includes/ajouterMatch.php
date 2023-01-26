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
        <h1>Ajouter un match</h1>
        <form action="../php/ajouterMatch.php" method="post">
            <label>Date : </label>
            <input type="date" name="dateMatch" required><br/>
            <label>Heure : </label>
            <input type="time" name="heureMatch" required><br/>
            <label>Nom équipe adverse : </label>
            <input type="text" name="equipeadverseMatch" required><br/>
            <label for="comboRencontre">Lieu de rencontre :</label>
            <select name="lieuDeRencontre" id="comboRencontre" required>
            <option disabled selected>--Choisissez un lieu de rencontre--</option>
            <option>Domicile</option>
            <option>Extérieur</option>
            </select><br/>
            <label for="comboResultat">Résultat : </label>
            <select name="resultatMatch" id="comboResultat">
                <option disabled selected>--Choisissez le résultat du match--</option>
                <option>Gagné</option>
                <option>Perdu</option>
                <option>Egalité</option>
            </select><br/>

            <div class="buttons">
                <input type="submit" value="Valider" name = "valider">
                <input type="reset" value="Annuler">
            </div>
        </form>
    </div>
</body>
</html>