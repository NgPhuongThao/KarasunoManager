<?php
    include('../includes/accueil.html');
    $server = "127.0.0.1";; 
    $db = "gestionnairevolley";
    $login = "root";
    $mdp = "";
    try{
        $linkpdo = new PDO("mysql:host=$server;dbname=$db",$login,$mdp);
    } catch (Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    
    $login = $_POST['identifiant'];
    $mdp = $_POST['mdp'];

    $res = $linkpdo->prepare("SELECT * FROM utilisateur WHERE Identifiant=?");
    $res->execute(array($_POST["identifiant"]));
    if ($res->rowCount()!=0){
        foreach ($res as $row){
            if ($row['MotDePasse'] == $mdp){
                header("Location: ../includes/gestionJoueurs.html");
            } else{
                echo "L'identifiant ou le mot de passe est incorrect";
            }
        }
    } else{
        echo "L'identifiant ou le mot de passe est incorrect";
    }
?>