$(document).ready(function(){

    $(".uedit").click(function(){
        var rid = parseInt(this.value);
        var eid = rid + 1;
        $("tr#" + eid.toString() + " > td").slideDown(250);
        $("tr#" + eid.toString() + " > td > div").slideDown(250);

        //noinspection JSJQueryEfficiency
        if (($("#perm" + rid.toString()).text()=="on") || $("#perm" + rid.toString()).text()=="true"){
            $("#editperm" + eid.toString()).prop('checked',true);
        }

    });

    $(".udelete").click(function(){
        var rid = parseInt(this.value);
        var eid = rid + 2;

        $("tr#" + eid.toString() + " > td").slideDown(250);
        $("tr#" + eid.toString() + " > td > div").slideDown(250);

    });

    $(".ucancel").click(function(){
        var rid = this.value;
        $("tr#" + rid + " > td").slideUp(250);
        $("tr#" + rid + " > td > div").slideUp(250);
        
    });

    $(".eok").click(function(){
        var rid = parseInt(this.value);
        var eid = rid - 1;
        var usr = "eusername=" + $("#editusername" + rid.toString()).val() +
            "&eemail=" + $("#editemail" + rid.toString()).val() +
            "&epasswd=" + $("#editpasswd" + rid.toString()).val() +
            "&eperm=" + $("#editperm" + rid.toString()).prop('checked') +
            "&id=" + $("#id" + eid.toString()).text();

        $.post("/usr_admin/edituser.php", usr, function(html){
            location.reload(true);
            $("edmsg").text(html);
        });
    });

    $(".dok").click(function(){
        var rid = parseInt(this.value);
        var eid = rid - 2;
        var id = "id=" + $("#id" + eid.toString()).text();
        $.post("/usr_admin/deleteuser.php", id, function(){

            location.reload(true);
        });
    });

    $("#addusr").click(function(){
        var post = $("#a_form").serialize();
        $.post("/usr_admin/adduser.php", post, function(html){
            if (html == "true"){
                alert("Új felhazsnáló hozzáadva");
                location.reload(true);
            }else{
                alert("Felhasználó hozzáadás sikertelen");
            }
        });
    });

    $("#eEmail").click(function(){
        $("tr#eEmailForm > td").slideDown();
        $("tr#eEmailForm > td > div").slideDown();
        $("tr#eEmailForm > td > div > form").slideDown();
    });

    $("#nEmail").click(function(){
        $("tr#eEmailForm > td").slideUp();
        $("tr#eEmailForm > td > div").slideUp();
        $("tr#eEmailForm > td > div > form").slideUp();
    });

    function notValidEmail(v) {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(v)){
            return true;
        }else {
            return false;
        }
    }


    $("#mEmail").click(function(){
        var id = parseInt(this.value);
        if ($("#nEmailOne").val() == $("#nEmailTwo").val()){
            if(notValidEmail($("#nEmailTwo").val())){
                $("#emailErrMsg").show().text("Az email-ek formátuma nem megfelelő");
            }else{
                $.post("/usr_admin/checkuser.php",
                    {
                        id: id,
                        password: $("#nEmailPass").val()
                    }, function (html) {
                        if (html == "true") {
                            $.post("/usr_admin/editprofil.php",
                                {
                                    id: id,
                                    email: $("#nEmailTwo").val()

                                },function(html){
                                    html == "true" ? location.reload(true) : $("#emailErrMsg").show().text(html);
                            });
                        } else {
                            $("#emailErrMsg").show().text("Hibás jelszó!");
                        }
                    });
            }
        }else {
            $("#emailErrMsg").show().text("A két email nem egyezik");
        }
    });

    $("#ePasswd").click(function(){
        $("tr#ePassForm > td").slideDown();
        $("tr#ePassForm > td > div").slideDown();
        $("tr#ePassForm > td > div > form").slideDown();
    });

    $("#nPass").click(function(){
        $("tr#ePassForm > td").slideUp();
        $("tr#ePassForm > td > div").slideUp();
        $("tr#ePassForm > td > div > form").slideUp();
    });

    $("#mPass").click(function(){
        var id = parseInt(this.value);
        if ($("#nPassOne").val() == $("#nPassTwo").val()){
                $.post("/usr_admin/checkuser.php",
                    {
                        id: id,
                        password: $("#nPassPass").val()
                    }, function (html) {
                        if (html == "true") {
                            $.post("/usr_admin/editprofil.php",
                                {
                                    id: id,
                                    passwd: $("#nPassTwo").val()

                                },function(html){
                                    html == "true" ? location.reload(true) : $("#passErrMsg").show().text(html);
                                });
                        } else {
                            $("#emailErrMsg").show().text("Hibás jelszó!");
                        }
                    });

        }else {
            $("#passErrMsg").show().text("A két email nem egyezik");
        }
    })

});
