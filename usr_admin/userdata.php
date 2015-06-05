<?php
include_once('connection.php');

if (isset($_SESSION['user_name'])){
    $user = $_SESSION['user_name'];

    $query = "SELECT *
              FROM felhasznalok
              WHERE username = '$user';";

    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);

    $sQuery = "SELECT *
              FROM gamesave
              WHERE sName = '$user'";

    $sResult = mysql_query($sQuery);

    mysql_close($dbhandle);

    echo '
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">

                        <div class="panel-heading" align="center">
                            <h4>Adataim</h4>
                        </div>
                        <table class="table">
                            <tr>
                                <td>
                                    <label>Felhasználó:</label>
                                </td>
                                <td colspan="2">
                                    <div id="uNameListed">'.$row["username"].'</div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Email:</label>
                                </td>
                                <td id="uEmalilListed">
                                    '.$row["email"].'
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" id="eEmail"><span class="glyphicon glyphicon-edit" ></span> Módosítás</button>
                                </td>
                            </tr>
                            <tr id="eEmailForm">
                                <td colspan="3" class="table-cell">
                                    <div>
                                        <div id="emailErrMsg" class="alert alert-danger table-cell" align="center">

                                        </div>
                                        <form class="form table-cell">
                                            <div class="form-group">
                                                <label for="nEmailOne">Új email előszőr</label>
                                                <input type="text" class="form-control" id="nEmailOne">
                                            </div>
                                            <div class="form-group">
                                                <label for="nEmailTwo">Új email másodszor</label>
                                                <input type="text" class="form-control" id="nEmailTwo">
                                            </div>
                                            <div class="form-group">
                                                <label for="nEmailPass">Jelszó</label>
                                                <input type="password" class="form-control" id="nEmailPass">
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success" value="'.$row["id"].'" id="mEmail"> Modosít</button>
                                                <button type="button" class="btn btn-danger" id="nEmail"> Mégsem</button>
                                            </div>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label>Jelszó</label>
                                </td>
                                <td>Csak modosítás</td>
                                <td><button type="button" class="btn btn-info" id="ePasswd"><span class="glyphicon glyphicon-edit" ></span> Módosítás</button></td>
                            </tr>
                            <tr id="ePassForm">
                                <td colspan="3" class="table-cell">
                                    <div>
                                        <div id="passErrMsg" class="alert alert-danger table-cell" align="center">

                                        </div>
                                        <form class="form table-cell">
                                            <div class="form-group">
                                                <label for="nPassOne">Új jelszó előszőr</label>
                                                <input type="password" class="form-control" id="nPassOne">
                                            </div>
                                            <div class="form-group">
                                                <label for="nPassTwo">Új jelszó másodszor</label>
                                                <input type="password" class="form-control" id="nPassTwo">
                                            </div>
                                            <div class="form-group">
                                                <label for="nPassPass">Jelszó</label>
                                                <input type="password" class="form-control" id="nPassPass">
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success" value="'.$row["id"].'" id="mPass"> Modosít</button>
                                                <button type="button" class="btn btn-danger" id="nPass"> Mégsem</button>
                                            </div>
                                        </form>

                                    </div>
                                </td>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h4>Mentéseim</h4>
                        </div>
                        <table class="table">
                        <tr>
                            <td><label>Történet</label></td>
                            <td><label>Fejezet</label></td>
                            <td><label>Ügyesség</label></td>
                            <td><label>Életerő</label></td>
                            <td><label>Szerencse</label></td>
                            <td><label>Dátum</label></td>
                        </tr>
                            ';
                            while ($sRow = mysql_fetch_array($sResult)){
                                echo'
                                    <tr>
                                        <td>'.$sRow["story"].'</td>
                                        <td>'.$sRow["page"].'</td>
                                        <td>'.$sRow["dex"].'/'.$sRow["dexAkt"].'</td>
                                        <td>'.$sRow["hp"].'/'.$sRow["hpAkt"].'</td>
                                        <td>'.$sRow["luck"].'/'.$sRow["luckAkt"].'</td>
                                        <td>'.$sRow["sDate"].'</td>
                                    </tr>
                                ';
                            }
                        echo'
                        </table>
                    </div>
                </div>
            </div>
        </div>
    ';
}else{
    header('Location: http://kjkonline.hol.es/');
}


