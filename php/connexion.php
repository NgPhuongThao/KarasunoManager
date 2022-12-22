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
                header("Location: ../includes/accueil.html");
            }
        }
    } else {
        header("Location: ../includes/accueil.html");
    }

    deconnexion($linkpdo);
?>