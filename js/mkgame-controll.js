$(document).ready(function  () {

    var sPattern = /(([A-ZÁÉÚŐÓÜÖŰÍ]{3})+\s)+(([0-9]{3})\s)+/gm;

	/*$("#gToHtml").click(function(){
        var gCont = $("#gText").val();
        var gSpell = gCont.match(/(([A-ZÁÉÚŐÓÜÖŰÍ]{3})+\s)+(([0-9]{3})\s)+/gm);
        gCont.replace(/(([A-ZÁÉÚŐÓÜÖŰÍ]{3})+\s)+(([0-9]{3})\s)+/g,"kicserélve");
        $("#gameResoult").html(gCont);
    });*/



	$("#gToHtml").click(function(){
		$.post("/game_admin/gamemaker.php",
							{
                                gCont: $("#gText").val()
							},
						function (response) {
							$("#gameResoult").text(response);
						});
	});
    $("#gToFile").click(function(){
        $.post("/game_admin/gamemaker.php",
            {
                gSave: $("#gameResoult").html()
            },
            function(response){
                alert(response);
            });
    });
});