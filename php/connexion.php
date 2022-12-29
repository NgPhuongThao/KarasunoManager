<?php
    // IMPORTS //
    require_once('connexionBD.php');

    // METHODES //

    // VARIABLES //
    $linkpdo = connexion();
    $login = $_POST['identifiant'];
    $mdp = $_POST['mdp'];

    // TRAITEMENT //
    $res = $linkpdo->prepare("SELECT * FROM utilisateur WHERE Identifiant=?");
    $res->execute(array($_POST["identifiant"]));
    if ($res->rowCount()!=0){
        foreach ($res as $row){
            if ($row['MotDePasse'] == $mdp){
                header("Location: ../includes/gestionJoueurs.php");
            } else{
                include("../includes/accueil.html");
                echo "L'identifiant ou le mot de passe est incorrect.";
            }
        }
    } else {
        include("../includes/accueil.html");
        echo "L'identifiant ou le mot de passe est incorrect.";
    }

    deconnexion($linkpdo);
?>