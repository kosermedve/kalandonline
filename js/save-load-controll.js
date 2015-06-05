function newagame(){
    eraseCookie("cPage");
    eraseCookie("cDex");
    eraseCookie("cDexAkt");
    eraseCookie("cHp");
    eraseCookie("cHpAkt");
    eraseCookie("cLuck");
    eraseCookie("cLuckAkt");
    eraseCookie("cFood");
    eraseCookie("cGear");
    eraseCookie("cGold");
    eraseCookie("cStuff");
    eraseCookie("cNote");
}

function save(s){

    $.post("./kahre/savegame.php",{
        save: s
    },function(html){
        alert(html);
    });
}
$(document).ready(function(){
    if(readCookie("cPage") != null){
        $("#loadGame").removeClass("disabled");
    }

    $("#kStory").click(function(){
        if((readCookie("cDex") == null) || (readCookie("cDexAkt") == null) || (readCookie("cHp") == null) || (readCookie("cHpAkt") == null) || (readCookie("cLuck") == null) || (readCookie("cLuckAkt") == null)){
            alert("Elöbb karaktert kell készíteni!");
        }
    });

    $(".newGame").click(function(){
      newagame();
    });

    $("#kSave").click(function(){
       save("1");
    });


});