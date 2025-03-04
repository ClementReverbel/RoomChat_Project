<?php
    //Permet de récupérer les 10 derniers messages enregistrés dans la base de données
    function recupererMessage(){
        $linkpdo = new PDO("mysql:host=mysql-messages.alwaysdata.net;dbname=messsages_db", "messages", "skillissueff15!");
        $requete = $linkpdo -> query("SELECT * FROM messages ORDER BY heure LIMIT 10");
        $message10 = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $message10;
    }

    recupererMessage();
?>