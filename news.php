<?php

include 'connection.php';

$query = "SELECT * FROM `hirek` ORDER BY id DESC LIMIT 25;";

$result = mysql_query($query);

while ($row = mysql_fetch_array($result)){
    echo '<div class="col-md-12">';
    newsPrint($row["title"], $row["ndate"], $row["body"]);
    echo '</div>';
}

function newsPrint($title, $date, $body){
    echo "<div class='panel panel-default'>
                <div class='panel-heading'>
                    <div class='panel-title'>
                        <div class='row'>
                            <h4>
                                <div class='col-md-10'>".$title."</div>
                                <div class='col-md-2'>".$date."</div>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class='panel-body'>
                        ".$body."
                </div>
          </div>";
    }


