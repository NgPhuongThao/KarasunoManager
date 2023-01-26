<?php
    require_once("connexionBD.php");
    header("Location: ../includes/feuillesMatchs.php");
    $linkpdo = connexion(); 
    if (isset($_POST["valider"]) && isset($_POST["matchs"])) {
        foreach ($_POST['titulaire'] as $selected) {
            $req = "INSERT INTO participer VALUES (1, 3, " . $selected . ", " . $_POST["matchs"] . ")";
            $linkpdo->query($req);
        }
        if (isset($_POST['remplacant'])) {
            foreach ($_POST['remplacant'] as $selected) {
                $req = "INSERT INTO participer VALUES (0, 3, " . $selected . ", " . $_POST["matchs"] . ")";
                $linkpdo->query($req);
            }
        }
    }
    deconnexion($linkpdo);
?>