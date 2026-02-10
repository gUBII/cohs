<?php
    if(isset($_COOKIE["dbname"])){    
        $conn = new mysqli('localhost', 'root', 'Bangladesh$$786', $_COOKIE['dbname']);
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    }else{
        
    }