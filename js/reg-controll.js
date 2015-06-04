$(document).ready(function(){

    var usrCh, emailCh, pwdCh = false;
    function regok(){
        if (usrCh && emailCh && pwdCh){
            $("#register").removeClass("disabled");
        }else{
            $("#register").addClass("disabled");
        }
    }

    //***felhasználó ellenőrzés***
    $("#r_user").focusout(function(){
        //noinspection JSJQueryEfficiency
        if ($("#r_user").val().length != 0){
            if ($("#r_user").val().length < 3){
                errHandler("#usr_error","uts");
            }else if($("#r_user").val().length > 15){
                errHandler("#usr_error","utl");
            }else{
                var usr = $("#r_user").serialize();
                $.post("checkdata.php",usr , function(html){
                    if (html == 'true'){
                        errHandler("#usr_error","uiu");
                    }else{
                       errHandler("#usr_error","us");
                        usrCh = true;
                        regok();
                    }
                });
            }
        }else{
            errHandler("#usr_error","uie");
        }
    });

    //***email ellenőrzés***
    $("#r_email").focusout(function(){
        if ($("#r_email").val().length != 0){
            if (notValidEmail($("#r_email").val())){
                errHandler("#email_error","env")
            }else{
                var eml = $("#r_email").serialize();
                $.post("checkdata.php",eml , function(html){
                    if (html == 'true'){
                        errHandler("#email_error","eiu");
                    }else{
                        errHandler("#email_error","es");
                        emailCh = true;
                        regok();
                    }
                });
            }
        }else{
            errHandler("#email_error","eie")
        }
    });

    $("#r_pass").focusin().keyup(function(e){
        pwdCheck(e,"#r_pass");
    });

    $("#r_pass").focusout(function(e){
        pwdCheck(e, "#r_pass");
    });

    $("#r_pass2").focusin().keyup(function(e){
        pwdCheck(e, "#r_pass2");
    });

    $("#r_pass2").focusout(function(e){
        pwdCheck(e, "#r_pass2");
    });

    function pwdCheck(e, r){
        if ($(r).val().length != 0){
            if ($(r).val().length < 8){
                errHandler("#pwd_error","pw");
            }else {
                if ($(r).val().length >= 8){
                    if (r == "#r_pass"){
                        errHandler("#pwd_error","ps");
                        regok();
                    }else{
                        if ($("#r_pass").val() == $("#r_pass2").val()){
                            errHandler("#pwd_error","pms");
                            pwdCh = true;
                            regok();
                        }else{
                            errHandler("#pwd_error","pmd");
                        }
                    }
                }
            }
        }else if(e.keyCode != 9){
            if (r == "#r_pass"){
                errHandler("#pwd_error","pd");
            }else{
                errHandler("#pwd_error2","pd");
            }
        }
        if (e.keyCode == 8 || e.keyCode == 46) {
            if ($(r).val().length != 0){
                if ($(r).val().length < 8){
                    if (r == "#r_pass"){
                        errHandler("#pwd_error","pw");
                    }else{
                        errHandler("#pwd_error2","pw");
                    }
                }
            }else{
                if (r == "#r_pass"){
                    errHandler("#pwd_error","pd");
                }else{
                    errHandler("#pwd_error2","pd");
                }
            }
        }

    }

    function notValidEmail(v) {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(v)){
            return true;
        }else {
            return false;
        }
    }

    function errHandler(s, m){
        $(s).removeClass("alert alert-warning alert-danger alert-success alert-info has-success has-warning has-error has-info");
        switch (m){
            case "pw":
                $(s).addClass("alert alert-warning").text("A jelszó nem elég hosszú, min. 8 karakter");
                break;

            case "ps":
                $(s).addClass("alert alert-success").text("A jelszó megfelelelő");
                break;

            case "pd":
                $(s).addClass("alert alert-danger").text("A jelszó nem lehet üres");
                break;

            case "pmd":
                $(s).addClass("alert alert-danger").text("A két jeszó nem egyezik");
                break;

            case "pms":
                $(s).addClass("alert alert-success").text("A jeszavak megfelelőek");
                break;

            case "env":
                $(s).addClass("alert alert-warning").text("Az email formátuma nem megfelelő");
                break;

            case "eiu":
                $(s).addClass("alert alert-danger").text("Az email már használatban van");
                break;

            case "es":
                $(s).addClass("alert alert-success").text("Az email használható");
                break;

            case "eie":
                $(s).addClass("alert alert-danger").text("Az email nem lehet üres");
                break;

            case "uts":
                $(s).addClass("alert alert-warning").text("A felhasználónév túl rövid, min 3 karakter");
                break;

            case "utl":
                $(s).addClass("alert alert-warning").text("A felhasználónév túl hosszú, max 15 karakter");
                break;

            case "uiu":
                $(s).addClass("alert alert-danger").text("A felhasználónév már foglalt");
                break;

            case "us":
                $(s).addClass("alert alert-success").text("A felhasználónév használható");
                break;

            case "uie":
                $(s).addClass("alert alert-danger").text("A felhasználónév nem lehet üres");
                break;

            case "rd":
                $(s).addClass("alert alert-danger").text("A regisztráció sikertelen, próbálja meg újra később");
                break;

            case "rs":
                $(s).addClass("alert alert-success").text("A regisztráció sikeres, mostmár beléphet a főoldalon");
                break;
        }
    }

    $("#register").click(function(){
        var post = $("#r_form").serialize();

        $.post('/usr_admin/adduser.php', post, function(html){
            if (html == "true"){

                regFade("i")
                $("#rgSuc").attr("style","");
                errHandler("#regMsg","rs");
            }else{
                regFade("i")
                $("#rgFail").attr("style","");
                errHandler("#regMsg","rd");
            }
        });
    });

    $("#rgFail").click(function(){
        regFade("o");
    });

    $("#rgSuc").click(function(){
        location.replace("index.php");
    });

    function regFade(i){
        if (i=="i"){
            $("#regPop").fadeIn(100);
            $("#shadow").fadeIn(100);
        }else if (i=="o") {
            $("#regPop").fadeOut(100);
            $("#shadow").fadeOut(100);
        }
    }
});
