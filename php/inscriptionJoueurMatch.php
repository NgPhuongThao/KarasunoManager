<?php
    require_once("connexionBD.php");
    // Si le bouton est cliqué et le match selectionné
    if (isset($_POST["valider"]) && isset($_POST["matchs"])) {
        header("Location: ../includes/feuillesMatchs.php");
        $linkpdo = connexion(); 

        $req = "DELETE FROM participer WHERE IdMatch = " . $_POST["matchs"];
        $linkpdo->query($req);

        // Insère les titulaires
        foreach ($_POST['titulaire'] as $selected) {
            $req = "INSERT INTO participer VALUES (1, 3, " . $selected . ", " . $_POST["matchs"] . ")";
            $linkpdo->query($req);
        }

        // Insère les remplaçants
        if (isset($_POST['remplacant'])) {
            foreach ($_POST['remplacant'] as $selected) {
                $req = "INSERT INTO participer VALUES (0, 3, " . $selected . ", " . $_POST["matchs"] . ")";
                $linkpdo->query($req);
            }
        }
        
        deconnexion($linkpdo);
    }
?>