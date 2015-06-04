<?php
include_once('connection.php');

$query = "SELECT * FROM `hirek`";

$result = mysql_query($query);

mysql_close($dbhandle);
?>

<div id="newslist" class="col-lg-12">
    <table class="table table-bordered">
        <thead>
            Hírek listája
        </thead>
        <tr>
            <th>Cím</th>
            <th>Tartalom</th>
            <th>Dátum</th>
            <th>Töröl</th>
        </tr>
        <?php
            $r=0;
            while($row = mysql_fetch_array($result)){
                $r++;
                echo '
                    <tr class="" id="'.$r.'">
                        <td>'.$row["title"].'</td>
                        <td>'.$row["body"].'</td>
                        <td>'.$row["ndate"].'</td>
                        <td>
                            <button type="button" class="btn btn-danger ndelete" value="'.$r.'"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>';
                $r++;
                echo'<tr class="alert alert-info" id="'.$r.'">
                        <td class="table-cell" colspan="2" >
                            <div class="" align="center">
                                Biztos, hogy törölni akarja ezt a hírt?
                            </div>
                        </td>
                        <td class="table-cell" colspan="2">
                            <div align="center">
                                <button type="button" class="btn btn-success ndok" value="'.$row["id"].'" ><span class="glyphicon glyphicon-ok"></span></button>
                                <button type="button" class="btn btn-danger ncancel" value="'.$r.'"><span class="glyphicon glyphicon-remove"></span></button>
                            </div>
                        </td>
                    </tr>
                ';
            }
        ?>
    </table>

</div>


