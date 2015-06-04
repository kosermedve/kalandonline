$(document).ready(function(){
	$("#fileUpload").click(function(){
		$.post("game_admin/gamemaker.php", {file: "filename"}, function(html){
			alert(html);
		});
	});
});