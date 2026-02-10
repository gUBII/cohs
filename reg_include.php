<?php
    if(isset($_COOKIE["useridx"])){
        $conn = new mysqli('localhost', 'root', 'root', '".$_COOKIE["useridx"]."');
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    }