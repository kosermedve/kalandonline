<?php
include_once("connection.php");

$query = "SELECT * FROM `felhasznalok`";

$result = mysql_query($query);

mysql_close($dbhandle);
?>

<div id="usrtable" class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <label> Felhasználók</label>
        </div>
        <table class="table" id="usrlist">
            <tr>
                <th class="uname" >Felhasználó</th>
                <th>Email</th>
                <th>Jelszó</th>
                <th>Admin</th>
                <th>Változtat/töröl</th>
            </tr>
            <?php
            $r = 0;
            while ($row = mysql_fetch_array($result)){
                $r++;
                echo'<tr id="'.$r.'">';
                echo '<td style="display: none"><div id="id'.$r.'">'.$row['id'].'</div></td>';
                echo '<td ><div class="" id="username'.$r.'">'.$row['username'].'</div></td>';
                echo '<td ><div class="" id="email'.$r.'">'.$row['email'].'</div></td>';
                echo '<td ><div class="" id="passwd'.$r.'">Nem megjeleníthető</div></td>';
                echo '<td ><div class="" id="perm'.$r.'">'.$row['perm'].'</div></td>';
                echo'<td>
                            <button type="button" class="btn btn-info uedit"  value="'.$r.'" ><span class="glyphicon glyphicon-edit"></span></button>
                            <button type="button" class="btn btn-danger udelete"  value="'.$r.'"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>';
                echo'</tr>';
                $r++;
                echo'<tr id="'.$r.'">
                        <td style="display: none" colspan="5">
                            <div style="display: none">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="editusername'.$r.'">Új felhasználónév:</label>
                                        <input type="text" class="form-control" id="editusername'.$r.'">
                                    </div>
                                    <div class="form-group">
                                        <label for="editemail'.$r.'">Új email:</label>
                                        <input type="text" class="form-control" id="editemail'.$r.'">
                                    </div>
                                    <div class="form-group">
                                        <label for="editpasswd'.$r.'">Új jelszó:</label>
                                        <input type="text" class="form-control" id="editpasswd'.$r.'">
                                    </div>
                                    <div class="form-group">
                                        <label for="editperm'.$r.'"></label>
                                        <input type="checkbox" class="form-control" id="editperm'.$r.'">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success eok" value="'.$r.'"><span class="glyphicon glyphicon-ok"></span></button>
                                        <button type="button" class="btn btn-danger ucancel" value="'.$r.'" ><span class="glyphicon glyphicon-remove"></span></button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>';
                $r++;
                echo'<tr id="'.$r.'" rw="'.$r.'">
                        <td style="display: none" class="">
                            <div style="display: none;" >
                                Törlés:
                            </div>
                        </td>
                        <td style="display: none" class="">
                            <div style="display: none;">
                                '.$row['username'].'
                            </div>
                        </td>
                        <td style="display: none" class="">
                            <div style="display: none;">
                                admin: '.$row['perm'].'
                            </div>
                        </td>
                        <td style="display: none" class="form-group">
                            <div style="display: none;">
                                Biztos?
                            </div>
                        </td>
                        <td style="display: none" class=form-group">
                        <div style="display: none;">
                                <button type="button" class="btn btn-success dok" value="'.$r.'"><span class="glyphicon glyphicon-ok"></span></button>
                                <button type="button" class="btn btn-danger ucancel" value="'.$r.'"><span class="glyphicon glyphicon-remove"></span></button>
                            </div>
                        </td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</div>
<div id="edmsg">

</div>