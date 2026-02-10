<?php
	echo"<body style='background-color:black'>";	

		if(isset($_POST["sortvalue"])){
            $sortsety=$_POST["sortvalue"];
            unset($_COOKIE["sortset"]);
            setcookie("sortset", "", time() -99999);            
            setcookie("sortset", $sortsety, time()+9999999);
            echo"Sort Done $sortsety";
        }

        if(isset($_POST["viewmode"])){
            $viewmodey=$_POST["viewmode"];
            unset($_COOKIE["viewmode"]);
            setcookie("viewmode", "", time() -99999);            
            setcookie("viewmode", $viewmodey, time()+9999999);
            echo"View Mode Done $viewmodey";
            echo"<script>alert('View Mode Changed to $viemodey')</script>";
        }

        if(isset($_POST["chartmode"])){
            $chartmodey="ON";
            if(isset($_COOKIE["chartmode"])){
                if($_COOKIE["chartmode"]=="ON") $chartmodey="OFF";
                if($_COOKIE["chartmode"]=="OFF") $chartmodey="ON";
                unset($_COOKIE["chartmode"]);
                setcookie("chartmode", "", time() -99999);            
            }
            setcookie("chartmode", $chartmodey, time()+9999999);
            echo"Chart Mode Done $chartmodey";
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

        if(isset($_POST["filter_date_from"])){
            if(isset($_COOKIE["filter_date_from"])){
                unset($_COOKIE["filter_date_from"]);
                setcookie("filter_date_from", "", time() -99999);   
            }
            setcookie("filter_date_from", $_POST["filter_date_from"], time()+9999999);
            echo $_POST["filter_date_from"];
        }

        if(isset($_POST["filter_date_to"])){
            if(isset($_COOKIE["filter_date_to"])){
                unset($_COOKIE["filter_date_to"]);
                setcookie("filter_date_to", "", time() -99999);   
            }
            setcookie("filter_date_to", $_POST["filter_date_to"], time()+9999999);
            echo $_POST["filter_date_to"];
        }

        if(isset($_POST["filter_receipt_no"])){
            if(isset($_COOKIE["filter_receipt_no"])){
                unset($_COOKIE["filter_receipt_no"]);
                setcookie("filter_receipt_no", "", time() -99999);   
            }
            setcookie("filter_receipt_no", $_POST["filter_receipt_no"], time()+9999999);
            echo $_POST["filter_receipt_no"];
        }

        if(isset($_POST["filter_invoice_id"])){
            if(isset($_COOKIE["filter_invoice_id"])){
                unset($_COOKIE["filter_invoice_id"]);
                setcookie("filter_invoice_id", "", time() -99999);   
            }
            setcookie("filter_invoice_id", $_POST["filter_invoice_id"], time()+9999999);
            echo $_POST["filter_invoice_id"];
        }

        if(isset($_POST["filter_ledger_id"])){
            if(isset($_COOKIE["filter_ledger_id"])){
                unset($_COOKIE["filter_ledger_id"]);
                setcookie("filter_ledger_id", "", time() -99999);   
            }
            setcookie("filter_ledger_id", $_POST["filter_ledger_id"], time()+9999999);
            echo $_POST["filter_ledger_id"];
        }

        if(isset($_POST["filter_employeeid"])){
            if(isset($_COOKIE["filter_employeeid"])){
                unset($_COOKIE["filter_employeeid"]);
                setcookie("filter_employeeid", "", time() -99999);   
            }
            setcookie("filter_employeeid", $_POST["filter_employeeid"], time()+9999999);
            echo $_POST["filter_employeeid"];
        }
        
        if(isset($_POST["filter_t_type"])){
            if(isset($_COOKIE["filter_t_type"])){
                unset($_COOKIE["filter_t_type"]);
                setcookie("filter_t_type", "", time() -99999);   
            }
            setcookie("filter_t_type", $_POST["filter_t_type"], time()+9999999);
            echo $_POST["filter_t_type"];
        }

	echo"</body>";
?>