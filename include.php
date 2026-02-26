<?php

    $urlfile=$_SERVER['PHP_SELF'];
    if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1') {
        $mainurl = "http://" . $_SERVER['HTTP_HOST'];
        $dirurl = "";
    } else {
        $mainurl="https://nexis365.com/cohs";
        $dirurl="/cohs";
    }

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $_SERVER['HTTP_HOST'];
    $path = $_SERVER['REQUEST_URI'];
    $main_url = $protocol . $domain;
    
    // echo"[ $urlfile ".$_COOKIE["dbname"]." ]";

    // Use TCP loopback locally to avoid missing MySQL socket issues.
    $dbHost = getenv('COHS_DB_HOST');
    if (!$dbHost) {
        $dbHost = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1')
            ? '127.0.0.1'
            : 'localhost';
    }

    // nexix database connection.
    if($urlfile==$dirurl."/index.php"){
        if(isset($_COOKIE["dbname"])){
            // echo"[1]";
            $conn = new mysqli($dbHost, 'saas', 'Bangladesh$$786', $_COOKIE['dbname']);
            if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
            
            $rootdb = new mysqli($dbHost, 'saas', 'Bangladesh$$786', 'saas');
            if ($rootdb->connect_error) die("Connection failed: " . $rootdb->connect_error);
            
            $sub_splan=0;
            $sedate=10;
            $s1000 = "select * from subscription where cid='".$_COOKIE["dbname"]."' order by id asc limit 1";
            $s11000 = $rootdb->query($s1000);
            if ($s11000->num_rows > 0) { while($s111000 = $s11000->fetch_assoc()) {
                $sub_jdate=$s111000["jdate"];
                $sub_edate=$s111000["edate"];
                $sub_splan=$s111000["plan"];
            } }
            
            if($sub_splan==0){
                if($_GET["url"] != "../subscription-plans.php"){
                    echo"<form method='get' action='index.php' name='main' target='_top'>
                        <input type=hidden name='url' value='../subscription-plans.php'><input type=hidden name='id' value='786'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }else{
                if($sedate<=0){
                    if($_GET["url"] != "../subscription-plans.php"){
                        echo"<form method='get' action='index.php' name='main' target='_top'>
                            <input type=hidden name='url' value='../subscription-plans.php'><input type=hidden name='id' value='786'>
                        </form>";
                        ?> <script language=JavaScript> document.main.submit(); </script> <?php
                    }
                }
            }
            
        }else{
            // echo"[2]";
            echo"<form method='get' action='logout.php' name='main' target='_top'>
                <input type=hidden name='redirect_url' value='login.php'><input type=hidden name='id' value='5138'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }else{
        if($urlfile==$dirurl."/login.php" || $urlfile==$dirurl."/register.php"){
            // echo"[3]";
            $conn = new mysqli($dbHost, 'saas', 'Bangladesh$$786', 'saas');
            if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
        }else{
            if(isset($_COOKIE["dbname"])){
                // echo"[4]";
                $conn = new mysqli($dbHost, 'saas', 'Bangladesh$$786', $_COOKIE['dbname']);
                if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
                $conn_main = new mysqli($dbHost, 'saas', 'Bangladesh$$786', 'saas');
                if ($conn_main->connect_error) die("Connection failed: " . $conn_main->connect_error);
            }else{
                // echo"[5]";
                echo"<form method='get' action='logout.php' name='main' target='_top'>
                    <input type=hidden name='redirect_url' value='login.php'><input type=hidden name='id' value='5138'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
    }
