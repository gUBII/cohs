<?php
	
    unset($_COOKIE["userid"]);
    setcookie("userid", "", time() -3600);
    unset($_COOKIE["track"]);
    setcookie("track", "", time() -3600);
    unset($_COOKIE["dbname"]);
    setcookie("dbname", "", time() -3600);
	
	if(isset($_COOKIE["useridx"])){
        unset($_COOKIE["useridx"]);
        setcookie("useridx", "", time() -99999);
    }
    if(isset($_COOKIE["logtime"])){
        unset($_COOKIE["logtime"]);
        setcookie("logtime", "", time() -99999);
    }
    if(isset($_COOKIE["logip"])){
        unset($_COOKIE["logip"]);
        setcookie("logip", "", time() -99999);
	}
    if(isset($_COOKIE["firstName"])){
        unset($_COOKIE["firstName"]);
        setcookie("firstName", "", time() -99999);
    }
    if(isset($_COOKIE["lastName"])){
        unset($_COOKIE["lastName"]);
        setcookie("lastName", "", time() -99999);
    }
    if(isset($_COOKIE["phone"])){
        unset($_COOKIE["phone"]);
        setcookie("phone", "", time() -99999);
    }
    if(isset($_COOKIE["pbox"])){
        unset($_COOKIE["pbox"]);
        setcookie("pbox", "", time() -99999);
    }
    if(isset($_COOKIE["rbox"])){
        unset($_COOKIE["rbox"]);
        setcookie("rbox", "", time() -99999);
    }
    if(isset($_COOKIE["company_name"])){
        unset($_COOKIE["company_name"]);
        setcookie("company_name", "", time() -99999);
    }
    if(isset($_COOKIE["company_address"])){
        unset($_COOKIE["company_address"]);
        setcookie("company_address", "", time() -99999);
    }
    if(isset($_COOKIE["company_city"])){
        unset($_COOKIE["company_city"]);
        setcookie("company_city", "", time() -99999);
    }
    if(isset($_COOKIE["company_state"])){
        unset($_COOKIE["company_state"]);
        setcookie("company_state", "", time() -99999);
    }
    if(isset($_COOKIE["company_zip"])){
        unset($_COOKIE["company_zip"]);
        setcookie("company_zip", "", time() -99999);
    }
    if(isset($_COOKIE["country"])){
        unset($_COOKIE["country"]);
        setcookie("country", "", time() -99999);
    }
    if(isset($_COOKIE["job_title"])){
        unset($_COOKIE["job_title"]);
        setcookie("job_title", "", time() -99999);
    }
    if(isset($_COOKIE["total_employees"])){
        unset($_COOKIE["total_employees"]);
        setcookie("total_employees", "", time() -99999);
    }
    if(isset($_COOKIE["purpose"])){
        unset($_COOKIE["purpose"]);
        setcookie("purpose", "", time() -99999);
    }
    if(isset($_COOKIE["application_name"])){
        unset($_COOKIE["application_name"]);
        setcookie("application_name", "", time() -99999);
    }
    if(isset($_COOKIE["referred_source"])){
        unset($_COOKIE["referred_source"]);
        setcookie("referred_source", "", time() -99999);
    }
    if(isset($_COOKIE["module_selection"])){
        unset($_COOKIE["module_selection"]);
        setcookie("module_selection", "", time() -99999);
    }

    if(isset($_POST["redirect_url"])){        
        echo"<form method='POST' action='".$_POST["redirect_url"]."' name='main' target='_top'>
            <input type=hidden name='nexis' value='0'><input type=hidden name='smsbd' value='0'>
        </form>";
        ?><script language=JavaScript> document.main.submit(); </script><?php
    }else{
        echo"<form method='POST' action='login.php' name='main' target='_top'>
            <input type=hidden name='nexis' value='0'><input type=hidden name='smsbd' value='0'>
        </form>";
        ?><script language=JavaScript> document.main.submit(); </script><?php
    }