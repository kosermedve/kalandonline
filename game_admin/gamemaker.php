<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");




if (isset($_POST["gCont"])){
    $gText =  $_POST["gCont"];
    $gText = preg_replace("/\n/"," ",$gText);
    $gText = preg_replace_callback("/(([\\w]{3}||[\\p{L}]{3})\\s)+(\\d{3}\\s)+/u",
        function($match){
            $spells = $match[0];
            $spellExpl = explode(" ",$spells);
            $i = 0;
            foreach ($spellExpl as $spell){
                if($spell != ""){
                    $spellList[$i] = $spell;
                    $i++;
                }
            }
            $spellTable = "<table class='table'>";
            for($n = 0; $n < (sizeof($spellList)/2);$n++){
                $spellTable = $spellTable . "<tr>
                    <td>".$spellList[$n]."</td>
                    <td><a href=# class='page'>".$spellList[$n+5]."</a></td>
                </tr>";
            }
            $spellTable = $spellTable . "</table>";
            return $spellTable;
        },$gText);
    $gText = preg_replace("/\\d{1,3}[\\.]/", "</div><div id='$0'><b>$0</b><br>",$gText);
	$gText = str_replace(".'>", "'>", $gText);
	$gText = preg_replace("/\\d{1,3}(?=-r)/","<a href=# class='page'>$0</a>" , $gText);

	echo ($gText);
}

if (isset($_POST["gSave"]) && isset($_POST["gWhere"])){


}
