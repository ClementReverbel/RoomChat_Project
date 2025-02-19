<?php
    $linkpdo = new PDO("mysql:host=mysql-messages.alwaysdata.net;dbname=messsages_db", "message", "skillissueff15!");
    $requete = $linkpdo -> query("INSERT INTO messages(heure,id_auteur,contenu) VALUES (:heure,:id_auteur,:contenu)");
    $allauteur = $requete->fetch(PDO::FETCH_ASSOC);
?>