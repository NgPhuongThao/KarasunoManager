<?php
    function connexion(){
        $server = "127.0.0.1";; 
        $db = "gestionnairevolley";
        $login = "root";
        $mdp = "";
        try{
            $linkpdo = new PDO("mysql:host=$server;dbname=$db",$login,$mdp);
            return $linkpdo;
        } catch (Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    
    function deconnexion($linkpdo){
        $linkpdo = null;
    }

    function hachage($string){
            
    }
?>