<?php
    include_once "base-de-donnees.php";

    class MembreDAO{
        function trouverAdmin($membre){
            global $pdo;

            $TROUVER_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
            $requeteTrouverMembre = $pdo->prepare($TROUVER_MEMBRE);
            $requeteTrouverMembre->bindParam(":pseudonyme", $membre['pseudonyme'], PDO::PARAM_STR);
            $requeteTrouverMembre->execute();
            $membreTrouve = $requeteTrouverMembre->fetch();
            //print_r($membreTrouve);
            return $membreTrouve;
        }

        function ajouterMembre($membre){
            global $pdo;

            //$AJOUTER_MEMBRE = "INSERT into membre(prenom, nom, pseudonyme, motdepasse, courriel, /* genre */) VALUES(:prenom, :nom, :pseudonyme, :motdepasse, :courriel, /* :genre */)";
            $AJOUTER_MEMBRE = "INSERT into membre(prenom, nom, pseudonyme, motdepasse, courriel, genre) 
            VALUES('". $membre['prenom'] ."', '". $membre['nom'] ."', '". $membre['pseudonyme'] ."', '". $membre['motdepasse'] ."', '". $membre['courriel'] ."', '". $membre['genre'] ."')";
            $requeteAjouterMembre = $pdo->prepare($AJOUTER_MEMBRE);

            /* $requeteAjouterMembre->bindParam(":prenom", $membre['prenom'], PDO::PARAM_STR);
            $requeteAjouterMembre->bindParam(":nom", $membre['nom'], PDO::PARAM_STR);
            $requeteAjouterMembre->bindParam(":pseudonyme", $membre['pseudonyme'], PDO::PARAM_STR);
            $requeteAjouterMembre->bindParam(":motdepasse", $membre['motdepasse'], PDO::PARAM_STR);
            $requeteAjouterMembre->bindParam(":courriel", $membre['courriel'], PDO::PARAM_STR); */
            //$requeteAjouterMembre->bindParam(":genre", $genre);
            $requeteAjouterMembre->execute();
            
            //print_r($requeteAjouterMembre);
        }
    }
?>