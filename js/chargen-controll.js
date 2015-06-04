$(document).ready(function(){
    var diceRoll
    $("#warDexRoll").click(function(){
        diceRoll = Math.floor(Math.random() * ((6 - 1) + 1) + 7);
        $("#charDex").val(diceRoll);
        $("#charDexAkt").val(diceRoll);
        createCookie("cDex",diceRoll);
        createCookie("cDexAkt",diceRoll);
    });
    $("#warHpRoll").click(function(){
        diceRoll = Math.floor(Math.random() * ((12 - 2) + 2) + 12);
        $("#charHP").val(diceRoll);
        $("#charHpAkt").val(diceRoll);
        createCookie("cHp",diceRoll);
        createCookie("cHpAkt",diceRoll);
    });
    $("#warLuckRoll").click(function(){
        diceRoll = Math.floor(Math.random() * ((6 - 1) + 1));
        $("#charLuck").val(diceRoll);
        $("#charLuckAkt").val(diceRoll);
        createCookie("cLuck",diceRoll);
        createCookie("cLuckAkt",diceRoll);
    });
    $("#wizDexRoll").click(function(){
        diceRoll = Math.floor(Math.random() * ((6 - 1) + 1) + 5);
        $("#charDex").val(diceRoll);
        $("#charDexAkt").val(diceRoll);
        createCookie("cDex",diceRoll);
        createCookie("cDexAkt",diceRoll);
    });
    $("#wizHpRoll").click(function(){
        diceRoll = Math.floor(Math.random() * ((12 - 2) + 2) + 12);
        $("#charHP").val(diceRoll);
        $("#charHpAkt").val(diceRoll);
        createCookie("cHp",diceRoll);
        createCookie("cHpAkt",diceRoll);
    });
    $("#wizLuckRoll").click(function(){
        diceRoll = Math.floor(Math.random() * ((6 - 1) + 1));
        $("#charLuck").val(diceRoll);
        $("#charLuckAkt").val(diceRoll);
        createCookie("cLuck",diceRoll);
        createCookie("cLuckAkt",diceRoll);
    });
});
