$(document).ready(function() {
    // Gestion du clic sur le bouton Envoyer
    $('#btn_envoi').click(envoi_message);

    // Envoi du message avec la touche Entrée
    $('#message').keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
            envoi_message();
        }
    });
});

function envoi_message() {
    // Récupération des valeurs
    const pseudonyme = $('#pseudonyme').val();
    const message = $('#message').val();

    // Vérification que les champs ne sont pas vides
    if (!pseudonyme || !message) {
        alert('Veuillez remplir tous les champs');
        return;
    }

    // Envoi des données via AJAX
    $.ajax({
        url: 'traitement/enregistrer.php',
        type: 'POST',
        data: {
            pseudonyme: pseudonyme,
            message: message
        },
        success: function(response) {
            // Vider le champ message après l'envoi réussi
            $('#message').val('');
            
            // Afficher le message dans la zone des messages
            const date = new Date().toLocaleString();   
            $('#messages').append(`
                <div class="message">
                    <span class="pseudonyme">${pseudonyme}</span>
                    <span class="date">${date}</span>
                    <p class="contenu">${message}</p>
                </div>
            `);
            
            // Faire défiler vers le bas
            $('#messages').scrollTop($('#messages')[0].scrollHeight);
        },
        error: function(xhr, status, error) {
            alert('Erreur lors de l\'envoi du message : ' + error);
        }
    });
};

//Récupère les 10 derniers messages grâce au scriot php
function refresh(){
            $("#messages").load("./traitement/recuperer.php");
    }

refresh();

//Fait une demande des 10 derniers messages toutes les 2 secondes
setInterval(refresh,2000);
