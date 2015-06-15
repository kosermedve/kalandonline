<nav class="navbar navbar-default navbar-fixed-top" id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menuNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="/"><span class="glyphicon glyphicon-home"></span> Kezdőlap</a>
                </li>

                <?php
                if(isset($_SESSION['user_name'])){
                    echo '<li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-play"></span> Új játék<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?nav=kahre" class="newGame"><span class="glyphicon glyphicon-book"></span> Kahre, a csapdák kikötővárosa</a></li>
                                </ul>
                        </li>
                        <li id="loadGame" class="disabled">
                            <a href="?nav=kahre&knav=story"><span class="glyphicon glyphicon-share"></span> Játék folytatás</a>
                        </li>';

                }
                if( ($_SESSION['perm'] == "true") || ($_SESSION['perm'] == "on") ){
                    echo '
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Admin lehetőségek<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?nav=addusr">Felhasználó hozzáadás</a></li>
                                    <li><a href="?nav=usrl">Felhasználók listája</a></li>
                                    <li><a href="?nav=addpost">Hír hozzáadása</a></li>
                                    <li><a href="?nav=listnews">Hírek listája</a></li>
                                    <li><a href="?nav=addgame">Játék konvertálása</a></li>
                                </ul>
                            </li>';
                }
                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['user_name'])){
                    echo '
                        <li><a href="?nav=udata"><span class="glyphicon glyphicon-user"></span> '.$_SESSION["user_name"].'</a></li>
                        <li><a href="/logout.php"><span class="glyphicon glyphicon-log-out"></span> Kilépés</a></li>
                        ';

                }else{
                    echo'
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" id="login-menu"><span class="glyphicon glyphicon-log-in"></span> Belépés</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <form class="form-inline"  id="loginform">
                                        <div class="form-group col-lg-4 col-md-4 col-sm-4">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Felhasználó">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó" >
                                            <input type="button" id="login" class="btn btn-success" value="Belépés"/>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?nav=reg" id="reg_btn"><span class="glyphicon glyphicon-plus"></span> Regisztráció</a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>