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
    success : function(){
        //Si le message a bien été enregistré on l'affiche
        $.ajax({
            url : "./recuperer.php"
        })
    }
})