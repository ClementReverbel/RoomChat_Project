<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=mysql-messages.alwaysdata.net;dbname=messages_db;charset=utf8mb4', 'messages', 'skillissueff15!');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Récupération des données du message
$pseudonyme = $_POST['pseudonyme'];
$message = $_POST['message'];
date_default_timezone_set('Europe/Paris');
$heure = date('Y-m-d H:i:s');

// Préparation et exécution de la requête d'insertion
$req = $bdd->prepare('INSERT INTO messages (heure, id_auteur, contenu) VALUES (:heure, :id_auteur, :contenu)');
$req->execute(array(
    'heure' => $heure,
    'id_auteur' => $pseudonyme,
    'contenu' => $message
));

// Réponse en JSON pour indiquer le succès
echo json_encode(['success' => true]);
?>