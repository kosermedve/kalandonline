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

function save(p){

    $.post("./kahre/savegame.php",{
        save: "1",
        sPage: p,
        sDex: $("#charDex").val(),
        sDexAkt: $("#charDexAkt").val(),
        sHp: $("#charHP").val(),
        sHpAkt: $("#charHpAkt").val(),
        sLuck: $("#charLuck").val(),
        sLuckAkt: $("#charLuckAkt").val(),
        sFood: $("#charFood").val(),
        sGear: $("#charGear").val(),
        sGold: $("#charGold").val(),
        sStuff: $("#charStuff").val(),
        sNote: $("#charNotes").val()


    },function(response){
        alert(response);
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


});