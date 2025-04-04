
<?php
    //Permet de récupérer les 10 derniers messages enregistrés dans la base de données
    function recupererMessage(){
        $linkpdo = new PDO("mysql:host=mysql-messages.alwaysdata.net;dbname=messages_db", "messages", "skillissueff15!");
        //On récupère les 10 dernier messages envoyées
        $requete = $linkpdo -> prepare("SELECT * FROM messages ORDER BY heure DESC LIMIT 10");
        $requete -> execute();
        $message10 = $requete->fetchAll(PDO::FETCH_ASSOC);
        //On inverse le resultat pour afficher les messages dans le bon ordre
        $message10=array_reverse($message10);
        return $message10;
    }
    //Pour chaque message récupérer, on l'affiche dans la zone messages
    foreach(recupererMessage() as $msg){
        $temps_ecoule = temps_ecoule($msg);
        echo "<div class='message'>
                <span class='pseudonyme'>".$msg['id_auteur']."</span>
                <span class='date'>".$temps_ecoule."</span>
                <p class='contenu'>".$msg['contenu']."</p>
            </div>";
    }

    //Cacule le temps qui c'est écoulé depuis l'envoie du message
    function temps_ecoule($msg){
        date_default_timezone_set('Europe/Paris');
        //récupération de la date actuelle
        $date_actuelle = date('Y-m-d H:i:s');
        //récupération de la date du message
        $date_message = $msg['heure'];
        //transformation des chaine de date en vraies dates
        $date_message = strtotime($date_message);
        $date_actuelle = strtotime($date_actuelle);
        //Différence entre les deux date
        $diff = $date_actuelle - $date_message;
        //En fonction de la différence on traduit avec des mots à afficher
        $message_temps = "il y a";
        if($diff < 60){
            $message_temps = "il y a ". $diff ." secondes";
        }elseif($diff < 3600){
            $message_temps = "il y a ". floor($diff/60) ." minutes et ". $diff%60 ." secondes";
        }elseif($diff < 86400){
            $message_temps = "il y a ". floor($diff/3600) ." heures et ". floor($diff%3600/60) ." minutes";
        }else{
            $message_temps = "il y a ". floor($diff/86400) ." jours et ". floor($diff%86400/3600) ." heures";
        }
        return $message_temps;
    }
?>