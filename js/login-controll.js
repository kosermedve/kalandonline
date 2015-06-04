function lgin(){
    var post = $("#loginform").serialize();
    $.post("login.php", post, function(html){
        if (html=='true'){
            alert("Belépés sikeres");

            location.reload(true);
        }else{
            alert("Hibás felhasználó vagy jelszó");
        }
    });
}


$(document).ready(function(){
    $("#login").click(function(){
        lgin()
    });

    $("#password").focusin().keypress(function(e){
        if(e.keyCode == "13"){
            lgin()
        }
    });

    $("#username").focusin().keypress(function(e){
        if(e.keyCode == "13"){
            lgin()
        }
    });
});






