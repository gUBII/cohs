<?php
	echo"<body style='background-color:black'>";	

		if(isset($_POST["sortset"])){            
            $sortsety=strlen($_POST["sortset"]);            
            $sortsety=($sortsety-1);
            $sortsetz=substr($_POST["sortset"],$sortsety);
            $sortsety=substr($_POST["sortset"],0,$sortsety);

            echo"$sortsety and $sortsetz";
            setcookie("sortset1", $sortsety, time()+9999999);
            setcookie("sortset2", $sortsetz, time()+9999999);
        }

        if(isset($_POST["rowset1"])){
            setcookie("rowset", $_POST["rowset1"], time()+9999999);
        }

        if(isset($_POST["gusetidx"])){            
            $guestidx=$_POST["gusetidx"];
            setcookie("guestid", $guestidx, time()+9999999);
        }
        
        if(isset($_POST["rowsetx"])){            
            $rowsetx=$_POST["rowsetx"];
            $sortsetx=$_POST["rowset1"];
            $sortsety=$_POST["rowset2"];
            setcookie("sortset1", $sortsety, time()+9999999);
            setcookie("sortset2", $sortsetz, time()+9999999);
            setcookie("rowset", $_POST["rowsetx"], time()+9999999);
        }

	echo"</body>";
?>