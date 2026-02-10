<?php
    // error_reporting(0);
    echo"updating";
    if(isset($_COOKIE["userid"])){
        echo"-1";
        if(isset($_POST["processor"])){
            echo"-2";
            unset($_COOKIE["empid22"]);
            setcookie("empid22", "", time() -9999999);
            setcookie("empid22", $_POST["empid2"], time() +9999999);
            
            unset($_COOKIE["datatarget22"]);
            setcookie("datatarget22", "", time() -9999999);
            setcookie("datatarget22", $_POST["datatarget2"], time() +9999999);
            
            unset($_COOKIE["getdata22"]);
            setcookie("getdata22", "", time() -9999999);
            setcookie("getdata22", $_POST["getdata2"], time() +9999999);
            
        }
        if(isset($_POST["reidx"])){
            echo"-3";
            unset($_COOKIE["reid"]);
            setcookie("reid", "", time() -9999999);
            setcookie("reid", $_POST["reidx"], time() +9999999);

            unset($_COOKIE["rday"]);
            setcookie("rday", "", time() -9999999);
            setcookie("rday", $_POST["rdx"], time() +9999999);

            unset($_COOKIE["rmonth"]);
            setcookie("rmonth", "", time() -9999999);
            setcookie("rmonth", $_POST["rmx"], time() +9999999);

            unset($_COOKIE["ryear"]);
            setcookie("ryear", "", time() -9999999);
            setcookie("ryear", $_POST["ryx"], time() +9999999);

            unset($_COOKIE["datatarget"]);
            setcookie("datatarget", "", time() -9999999);
            setcookie("datatarget", $_POST["rdt"], time() +9999999);

            unset($_COOKIE["getdatay"]);
            setcookie("getdatay", "", time() -9999999);
            setcookie("getdatay", $_POST["rgd"], time() +9999999);
            
            /*
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='smsbd' value='time-sheet'><input type=hidden name='src_employeeid' value='".$_POST["src_employeeid"]."'>
            </form>";
            ?><!-- <script language=JavaScript> document.main.submit(); </script> --><?php
            */
        }
    }
?>