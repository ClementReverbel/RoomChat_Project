<?php
    //Fonction permettant de prendre en paramètre un auteur et son message pour l'ajouter dans la base de donnée
    //Renvoi "vrai" ou "faux" pour vérifier que l'ajout a été bien réalisé
    function rajouterMessage($auteur,$message){
        $linkpdo = new PDO("mysql:host=mysql-messages.alwaysdata.net;dbname=messsages_db", "messages", "skillissueff15!");
        //On prend la date du jour au format de DATETIME en SQL
        $date=date('Y-m-d h:i:s');
        $requete = $linkpdo -> query("INSERT INTO messages(heure,id_auteur,contenu) VALUES (:heure,:id_auteur,:contenu)");
        return $requete->execute(array("heure"=>$date,"id_auteur"=>$auteur,"contenu"=>$message));
    }

    //Récupérer les données passées en paramètres avec la méthode Ajax
    $auteur=$_POST['pseudo'];
    $message=$_POST['contenu'];

    rajouterMessage($auteur,$message);
?>