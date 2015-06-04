<div id="formNewUser" class="col-md-12">
    <form  role="form" class="form-horizontal" id="a_form"
    method="post" action="adduser.php">
    <!-- Felhasználónév-->
    <div class="form-group" id="af_user">
        <label class="col-md-4 control-label">Felhasználónév</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="a_user" name="a_user" />
        </div>
    </div>

    <!--Email-->
    <div class="form-group" id="af_email">
        <label class="col-md-4 control-label">E-mail</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="a_email" name="a_email" />
        </div>
    </div>

    <!--jelszó-->
    <div class="form-group" id="af_pwd">
        <label class="col-md-4 control-label">Jelszó</label>
        <div class="col-md-4">
            <input type="password" class="form-control" id="a_pass" name="a_pass" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-6">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="a_perm" name="a_perm"> Admin jog
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-6">
            <button type="button" class="btn btn-default" value="Add user" id="addusr">Felhasználó hozzáadása</button>
        </div>
    </div>

    </form>
</div>