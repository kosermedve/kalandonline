<script src="../js/kahre-controll.js" ></script>
<script src="../js/chargen-controll.js" ></script>
<div id="wrapper" class="ctn_wrapper">

    <?php
        if (lgdin()){
            echo '<div id="kahre_main" class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                <div class="btn-group-vertical">
                    <a id="kIntro" class="btn btn-default" href="?nav=kahre&knav=intro">Bevezető</a>
                    <a id="kRules" class="btn btn-default" href="?nav=kahre&knav=rules">Szabályok</a>
                    <a id="kChargen" class="btn btn-default" href="?nav=kahre&knav=char">Karakter genereátor</a>
                    <a id="kStory" class="btn btn-default" href="?nav=kahre&knav=story">Történet</a>
                    <a id="kSave" class="btn btn-default">Mentés</a>';
                    if (perm()){
                        echo'<input type="text" id="load" placeholder="Oldalszám" class="form-control">
                            <button id="pload" class="btn btn-default">Betöltés</button>
                        ';
                    }
                echo '</div>

            </div>
            <div class="col-md-8 text-justify" id="kahre_content">';

            if (isset($_GET['knav'])){
                    $knav=$_GET['knav'];
                }
            switch ($knav){
                case 'char':
                    include ("./kahre/chargen.html");
                    break;
                case 'rules':
                    include ("./kahre/rules.html");
                    break;
                case 'story':
                    if (!isset($_COOKIE["cDex"]) || !isset($_COOKIE["cDexAkt"]) || !isset($_COOKIE["cHp"]) || !isset($_COOKIE["cHpAkt"]) | !isset($_COOKIE["cLuck"]) || !isset($_COOKIE["cLuckAkt"])){
                        include("./kahre/chargen.html");
                    }elseif (!isset($_COOKIE["cPage"])){
                        include ("./kahre/prestory.php");
                    }else{
                        echo'
                            <script type="text/javascript">
                            if(readCookie("cPage") != null){
                                pageturn(readCookie("cPage"));
                            }
                            </script>
                        ';
                    }
                    break;
                case 'intro':
                    include ("./kahre/intro.html");
                    break;
                default:
                    include ("./kahre/intro.html");
                    break;
            }

            echo '
            </div>
            <div>
                <form id="charsheet" class="col-md-2" role="form">
                    <div class="form-group">
                        <label class="control-label">Ügyesség Maximum/Aktuális</label>
                        <div class="row">
                            <div class="col-md-5">
                            <input type="text" class="form-control" id="charDex">
                            </div>
                            <div class="col-md-5">
                            <input type="text" class="form-control" id="charDexAkt">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Életerő Maximum/Aktuális</label>
                        <div class="row">
                            <div class="col-md-5">
                            <input type="text" class="form-control" id="charHP">
                            </div>
                            <div class="col-md-5">
                            <input type="text" class="form-control" id="charHpAkt">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Szerencse Maximum/Aktuális</label>
                        <div class="row">
                            <div class="col-md-5">
                            <input type="text" class="form-control" id="charLuck">
                            </div>
                            <div class="col-md-5">
                            <input type="text" class="form-control" id="charLuckAkt">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Arany és kincs</label>
                        <textarea class="form-control" id="charGold"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Élelem</label>
                        <textarea class="form-control" id="charFood"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Felszerelés és műtárgyak</label>
                        <textarea class="form-control" id="charGear"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jutalmak, büntetések, átkok, stb</label>
                        <textarea class="form-control" id="charStuff"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Megfejtések és jegyzetek</label>
                        <textarea class="form-control" id="charNotes"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>';
        }else{
            echo 'Nem vagy bejelentkezve';
        }
    ?>

</div>
