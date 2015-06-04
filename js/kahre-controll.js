
function pageturn(p){
    $("#kahre_content").load("/kahre/story.html #"+p+"", function(){
        $(".page").click(function(){
            pageturn(this.text);
            createCookie("cPage",$(this).text());
        });
        if((readCookie("cPage") != null) && $("#loadGame").attr("class") == "disabled"){
            $("#loadGame").removeClass("disabled");
        }
    });
}





$(document).ready(function(){

    var charDex = $("#charDex");
    var charDexAkt = $("#charDexAkt");
    var charHp = $("#charHP");
    var charHpAkt = $("#charHpAkt");
    var charLuck = $("#charLuck");
    var charLuckAkt = $("#charLuckAkt");
    var charFood = $("#charFood");
    var charGear = $("#charGear");
    var charGold = $("#charGold");
    var charStuff = $("#charStuff");
    var charNotes = $("charNotes");

    charDex.val(readCookie("cDex"));
    charDexAkt.val(readCookie("cDexAkt"));
    charHp.val(readCookie("cHp"));
    charHpAkt.val(readCookie("cHpAkt"));
    charLuck.val(readCookie("cLuck"));
    charLuckAkt.val(readCookie("cLuckAkt"));
    charFood.val(readCookie("cFood"));
    charGear.val(readCookie("cGear"));
    charGold.val(readCookie("cGold"));
    charStuff.val(readCookie("cStuff"));
    charNotes.val(readCookie("cNote"));



    $(".page").click(function(){
        pageturn(this.text);
        createCookie("cPage",$(this).text());
    });

    $("#pload").click(function(){
        pageturn($("#load").val());
    });

    $("#kSave").click(function(){
       save($("#load").val());
    });

    charDex.change(function(){
        createCookie("cDex",$(this).val());
    });

    charDexAkt.change(function(){
        createCookie("cDexAkt",$(this).val());
    });

    charHp.change(function(){
        createCookie("cHp",$(this).val());
    });

    charHpAkt.change(function(){
        createCookie("cHpAkt",$(this).val());
    });

    charLuck.change(function(){
        createCookie("cLuck",$(this).val());
    });

    charLuckAkt.change(function(){
        createCookie("cLuckAkt",$(this).val());
    });

    charFood.change(function(){
        createCookie("cFood",$(this).val());
    });

    charGear.change(function(){
        createCookie("cGear",$(this).val());
    });

    charGold.change(function(){
        createCookie("cGold",$(this).val());
    });

    charStuff.change(function(){
        createCookie("cStuff",$(this).val());
    });

    charNotes.change(function(){
        createCookie("cNote",$(this).val());
    });

});
