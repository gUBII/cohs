<?php
    // DATABASE CONFIGURATION ====
    $host = 'localhost';
    $username = 'saas';
    $password = 'Bangladesh$$786';
    
    $date = date('Y-m-d-h-i-s-a');
    $backupDir = __DIR__ . '/database_backup';
    if (!file_exists($backupDir)) {
        mkdir($backupDir, 0755, true);
    }
    
    // DATABASE MAIN SAAS
    $database = 'saas';
    $filename = "{$database}_{$date}.sql";
    $filepath = "{$backupDir}/{$filename}";
    $gzpath = "{$filepath}.gz";
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $output = "-- Database Backup: {$database} on {$date}\n\n";
    $tables = [];
    $res = $conn->query("SHOW TABLES");
    while ($row = $res->fetch_array()) {
        $tables[] = $row[0];
    }
    
    foreach ($tables as $table) {
        $createTable = $conn->query("SHOW CREATE TABLE `$table`")->fetch_array();
        $output .= "\n\n-- Table structure for `$table`\n";
        $output .= $createTable[1] . ";\n";
    
        $result = $conn->query("SELECT * FROM `$table`");
        if ($result->num_rows > 0) {
            $columns = array();
            while ($field = $result->fetch_field()) {
                $columns[] = "`" . $field->name . "`";
            }
    
            $output .= "\n-- Dumping data for table `$table`\n";
            while ($row = $result->fetch_assoc()) {
                $values = array();
                foreach ($row as $value) {
                    $value = $conn->real_escape_string($value);
                    $values[] = isset($value) ? "'$value'" : "NULL";
                }
                $output .= "INSERT INTO `$table` (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ");\n";
            }
        }
    }
    
    file_put_contents($filepath, $output);
    
    // Compress it
    $gz = gzopen($gzpath, 'w9');
    gzwrite($gz, file_get_contents($filepath));
    gzclose($gz);
    unlink($filepath);
    
    
    /////////////////////////////////////////////////////////////////////////////////////////
    
    
    // database GWC
    $database = 'saas_info_goodwillcare_net';
    $filename = "{$database}_{$date}.sql";
    $filepath = "{$backupDir}/{$filename}";
    $gzpath = "{$filepath}.gz";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    $output = "-- Database Backup: {$database} on {$date}\n\n";
    $tables = [];
    $res = $conn->query("SHOW TABLES");
    while ($row = $res->fetch_array()) {
        $tables[] = $row[0];
    }
    
    foreach ($tables as $table) {
        $createTable = $conn->query("SHOW CREATE TABLE `$table`")->fetch_array();
        $output .= "\n\n-- Table structure for `$table`\n";
        $output .= $createTable[1] . ";\n";
    
        $result = $conn->query("SELECT * FROM `$table`");
        if ($result->num_rows > 0) {
            $columns = array();
            while ($field = $result->fetch_field()) {
                $columns[] = "`" . $field->name . "`";
            }
    
            $output .= "\n-- Dumping data for table `$table`\n";
            while ($row = $result->fetch_assoc()) {
                $values = array();
                foreach ($row as $value) {
                    $value = $conn->real_escape_string($value);
                    $values[] = isset($value) ? "'$value'" : "NULL";
                }
                $output .= "INSERT INTO `$table` (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ");\n";
            }
        }
    }
    
    file_put_contents($filepath, $output);
    
    // Compress it
    $gz = gzopen($gzpath, 'w9');
    gzwrite($gz, file_get_contents($filepath));
    gzclose($gz);
    unlink($filepath);
    
?>
