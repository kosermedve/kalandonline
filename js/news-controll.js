$(document).ready(function () {
    $("#addnew").click(function(){
        $.post(
			"/news_admin/addnews.php",
            {
                nTitle: $("#n_title").val(),
                nBody : tinymce.activeEditor.getContent()
            },
            function (html) {
                if (html == "true"){
                    alert("Hír mentése sikeres");
                    location.reload();
                }else{
                    $("#nErrMsg").html(html);
                }
            });
    });

    tinymce.init({
        selector: "textarea#n_body",
        plugins: "",
        toolbar: ""
    });

    $(".ndelete").click(function(){
        var rid = parseInt(this.value);
        var eid = rid + 1;
        $("tr#" + eid.toString() + " > td").slideDown(250);
        $("tr#" + eid.toString() + " > td > div").slideDown(250);

    });

    $(".ncancel").click(function(){
        var rid = this.value;
        $("tr#" + rid + " > td").slideUp(250);
        $("tr#" + rid + " > td > div").slideUp(250);
    });

    $(".ndok").click(function(){
        $.post(
            "/news_admin/deletenews.php",
            {
                id : $(this).val()
            },
            function(){
                alert("A hír törlésre került");
                location.reload();
            }
        );
    });


});
