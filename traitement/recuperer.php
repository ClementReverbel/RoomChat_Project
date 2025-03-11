
<?php
    //Permet de récupérer les 10 derniers messages enregistrés dans la base de données
    function recupererMessage(){
        $linkpdo = new PDO("mysql:host=mysql-messages.alwaysdata.net;dbname=messages_db", "messages", "skillissueff15!");
        $requete = $linkpdo -> prepare("SELECT * FROM messages ORDER BY heure LIMIT 10");
        $requete -> execute();
        $message10 = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $message10;
    }

    foreach(recupererMessage() as $msg){
        $temps_ecoule = temps_ecoule($msg);
        echo "<div class='message'>
                <span class='pseudonyme'>".$msg['id_auteur']."</span>
                <span class='date'>".$temps_ecoule."</span>
                <p class='contenu'>".$msg['contenu']."</p>
            </div>";
    }

    function temps_ecoule($msg){
        $date_actuelle = date('Y-m-d H:i:s');
        $date_message = $msg['heure'];
        $date_message = strtotime($date_message);
        $date_actuelle = strtotime($date_actuelle);
        $diff = $date_actuelle - $date_message;
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