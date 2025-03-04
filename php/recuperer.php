<?php
    function recupererMessage(){
        $linkpdo = new PDO("mysql:host=mysql-messages.alwaysdata.net;dbname=messsages_db", "message", "skillissueff15!");
        $requete = $linkpdo -> query("SELECT * FROM messages ORDER BY heure LIMIT 10");
        $message10 = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $message10;
    }
?>