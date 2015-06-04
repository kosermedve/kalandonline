<div id="regPopLeft" style="position: absolute; left: 50%; z-index: 101">
    <div id="regPopCent" style="position: relative; left: -50%; z-index: 101">
        <div id="regPop">
            <div id="regMsg">
            </div>
            <input type="button" value="O.K." id="rgSuc" class="btn btn-default" style="display: none"/>
            <input type="button" value="O.K." id="rgFail" class="btn btn-default" style="display: none"/>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div id="registerform" class="row">
        <form  role="form" class="form-horizontal" id="r_form" style=""
            method="post" action="adduser.php">

            <!-- Felhasználónév-->
            <div class="form-group" id="rf_user">
                <label class="col-md-3 control-label">Felhasználónév</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="r_user" name="r_user" />

                </div>
                <div class="col-md-4">
                    <!-- usr loading  -->
                    <div id="usr_loading" class="" style="display: none">
                        <div id="usr_progress" class="" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>

                    <!--usr error panel-->
                    <div id="usr_error" class="alert alert-info">
                        A felhasználónév min 3, max 15 karakter lehet
                    </div>
                </div>
            </div>

            <!--Email-->
            <div class="form-group" id="rf_email">
                <label class="col-md-3 control-label">E-mail</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="r_email" name="r_email" />
                </div>
                <div class="col-md-4">

                    <!-- email loading  -->
                    <div id="email_loading" class="" style="display: none">
                        <div id="email_progress" class="" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                        </div>
                    </div>

                    <!--email error panel-->
                    <div id="email_error" class="alert alert-info">
                        Az email legyen létező, és megfelelő formátumú
                    </div>
                </div>
            </div>

            <!--jelszó-->
            <div class="form-group" id="rf_pwd">
                <label class="col-md-3 control-label">Jelszó:</label>
                <div class="col-md-4">
                    <input type="password" class="form-control" id="r_pass" name="r_pass" />
                </div>
                <!--jelszó error panel-->
                <div class="col-md-4">
                    <div id="pwd_error" class="alert alert-info">
                        A jelszó legalább 8 karakter legyen
                    </div>
                </div>
            </div>

            <!--jelszó2-->
            <div class="form-group" id="rf_pwd2">
                <label class="col-md-3 control-label">Jelszó újra:</label>
                <div class="col-md-4">
                    <input type="password" class="form-control" id="r_pass2" name="r_pass2" />

                </div>
                <!--jelszó error panel-->

            </div>

            <div class="alert alert-info" id="infopanel" style="visibility: hidden">
            </div>
            <!--<input type="submit" class="btn" value="Submit"/>-->
        </form>
        <div id="err_msg">

        </div>
        <!--gombok-->
        <div id="btns" class="btns">
            <input type="button" class="btn btn-success disabled" id="register" value="Register"/>
            <a href="../index.php">
                <input type="button" class="btn btn-danger" id="cancel_reg" value="Cancel" />
            </a>
        </div>

    </div>
</div>
