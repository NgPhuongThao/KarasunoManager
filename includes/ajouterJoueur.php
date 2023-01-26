<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ajouter un joueur</title>
</head>
<body>
    <div class="modification">
        <h1>Ajouter un joueur</h1>
        <form action="../php/ajouterJoueur.php" method="post" enctype="multipart/form-data">
            <label>Numéro de licence : </label>
            <input type="text" name="numLicence" required><br/>
            <label>Nom : </label>
            <input type="text" name="nom" required><br/>
            <label>Prénom : </label>
            <input type="text" name="prenom" required><br/>
            <label>Date de naissance : </label>
            <input type="date" name="dateNaissance" required><br/>
            <label>Taille : </label>
            <input type="number" name="taille" min="150" max="300" value="150" required><br/>
            <label>Poids : </label>
            <input type="number" name="poids" min="40" max="150" value="40" required><br/>
            <label for="comboPoste">Poste préféré :</label>
            <select name="postePrefere" id="comboPoste" required>
            <option disabled selected>--Choisissez un poste--</option>
            <option>Attaquant</option>
            <option>Central</option>
            <option>Libéro</option>
            <option>Passeur</option>
            </select><br/>
            <label for="comboStatut">Statut :</label>
            <select name="statut" id="comboStatut" required>
            <option disabled selected>--Choisissez un statut--</option>
            <option>Actif(ve)</option>
            <option>Blessé(e)</option>
            <option>Suspendu(e)</option>
            <option>Absent(e)</option>
            </select><br/>
            <label for="commentaire">Commentaire : </label>
            <textarea id="commantaire" name="commentaire"></textarea><br/>
            <label>Photo : </label>
            <input type="file" name="photo" required>
            <div class="buttons">
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler">
            </div>
        </form>
    </div>
</body>
</html> 