import "./jquery-3.7.1.min";
//Récuprération du pseudo du l'utilisateur
let pseudo =$("#pseudonyme").val().trim();

//Récupération du contenu du message
let contenu = $("#message").val().trim();

//Envoi du contenu au script php pour l'enregistrement du message dans la BD
$("#btn_envoi").on("click", function(){
    $.ajax({
        type : "POST",
        url:"../php/enregistrer.php",
        data :"pseudo="+pseudo+"&contenu="+contenu,
        //Si le message a bien été enregistré on l'affiche
        success : refresh()
    }
    )
})


//Récupère les 10 derniers messages grâce au scriot php
function refresh(){
    $.ajax({
        url : "../php/recuperer.php"
    })
}

//Fait une demande des 10 derniers messages toutes les 2 secondes
setInterval(refresh(),2000);