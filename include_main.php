<?php

    // nexix database connection.
    $conn = new mysqli('localhost', 'saas', 'Bangladesh$$786', 'saas');
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
