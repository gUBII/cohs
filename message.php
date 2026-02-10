<?php

    $condb = new mysqli('localhost', 'saas', 'Bangladesh$$786', 'saas');
    if ($rootdb->connect_error) die("Connection failed: " . $rootdb->connect_error);
    
    $getMesg=$_POST["text"];
    
    $s1 = "select * from chatbot where queries LIKE '%".$_POST["text"]."%' order by id ASC";
    $r1 = $condb->query($s1);
    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
       
       echo"".$rs1["replies"]."";
        
    } }
                    
                    
    /*
    $check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
    $run_query = mysqli_query($condb, $check_data) or die("Error");
    if(mysqli_num_rows($run_query) > 0){
        $fetch_data = mysqli_fetch_assoc($run_query);
        $replay = $fetch_data['replies'];
        echo $replay;
    }else{
        echo "Sorry can't be able to understand you!";
    }
    */
?>