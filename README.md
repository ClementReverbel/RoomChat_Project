# README - Application de Messagerie Instantanée

## Description du projet
Ce projet est une application de messagerie instantanée développée dans le cadre de notre parcours universitaire. L'application utilise Ajax et la librairie jQuery en JavaScript pour permettre aux utilisateurs d'envoyer et de recevoir des messages en temps réel.

## Technologies utilisées
- **Front-end :** HTML, CSS, JavaScript, jQuery
- **Back-end :** PHP
- **Base de données :** MySQL

## Fonctionnalités principales
1. **Enregistrement des messages** : Les utilisateurs peuvent envoyer des messages qui sont stockés dans une base de données.
2. **Affichage des messages** : Les 10 derniers messages sont récupérés et affichés.
3. **Mise à jour automatique** : Rafraîchissement des messages toutes les 2 secondes sans recharger la page.
4. **Interaction fluide** : Envoi de message par un clic sur le bouton "Envoyer" ou en appuyant sur la touche "Entrée".
5. **Effacement automatique** : La zone de saisie est vidée après l'envoi d'un message.

## Installation et utilisation
### Installation
Si vous souhaitez utiliser ce logiciel en local, il vous faudra cloner le dépôt :
 ```sh
    git clone https://github.com/ClementReverbel/RoomChat_Project
```
Puis, vous devrez le mettre sur votre serveur local (xampp, wamp, uwamp, etc...).
La connexion à la base de données étant distante, vous n'avez pas besoin d'importer de script SQL.

### Utilisation
1. Accédez à `--` via un navigateur web.
2. Entrez un message et cliquez sur "Envoyer".
3. Les messages s'affichent en temps réel et se mettent à jour automatiquement.

## Améliorations possibles
- Ajout d'un système d'authentification avec gestion des utilisateurs connectés.
- Implémentation de plusieurs "salles de discussion".
- Optimisation des requêtes pour améliorer la performance.

---
**Auteurs :** REVERBEL Clément & REYNIER Zyad
**Date :** Mars 2025

