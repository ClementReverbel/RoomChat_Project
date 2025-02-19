import "./jquery-3.7.1.min";
//Récuprération du pseudo du l'utilisateur
let pseudo;

//Récupération du contenu du message
let contenu;

//Envoi du contenu au script php pour l'enregistrement du message dans la BD
$.ajax({
    type : "POST",
    url:"./enregistrer.php",
    data :"pseudo="+pseudo+"&contenu="+contenu,
    //Si le message a bien été enregistré on l'affiche
    success : refresh()
}
)

//Récupère les 10 derniers messages grâce au scriot php
function refresh(){
    $.ajax({
        url : "./recuperer.php"
    })
}

//Fait une demande des 10 derniers messages toutes les 2 secondes
setInterval(refresh(),2000);