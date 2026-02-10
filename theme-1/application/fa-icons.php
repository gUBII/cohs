<?php
    include("auth.php");
    echo"<div class='row'>";
        $iset1 = "select * from fa_icons where status='1' order by id asc";
        $iset2 = $conn->query($iset1);
        if ($iset2->num_rows > 0) { while($iset3 = $iset2->fetch_assoc()) {
            $iconname=$iset3["icon"];
            echo"<div class='col-2' style='text-align:center;font-size:8pt;padding:10px'>
                <a href='#iconbox' onclick=\"document.categorysection.iconname.value='$iconname'\" onmouseup=\"shiftdataV1('blank', 'iconListx')\"><i class='fa ".$iset3["icon"]."' style='font-color:black;font-size:15pt;'></i></a>
            </div>";
        } }
    echo"</div>";
?>
