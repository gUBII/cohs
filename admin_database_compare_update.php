<?php

$host = 'localhost';
$user = 'saas';
$pass = 'Bangladesh$$786';
// your reference DB
$db1 = 'saas_admin_circleofhope_com_au'; 

// your target DB
$db2 = 'saas_close';

// Action Status (true as value will take action).
$applyChanges = false;

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getTables($conn, $dbName) {
    $tables = [];
    $res = $conn->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$dbName'");
    while ($row = $res->fetch_assoc()) {
        $tables[] = $row['TABLE_NAME'];
    }
    return $tables;
}

function getColumns($conn, $dbName, $tableName) {
    $columns = [];
    $res = $conn->query("SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA 
                         FROM INFORMATION_SCHEMA.COLUMNS 
                         WHERE TABLE_SCHEMA = '$dbName' AND TABLE_NAME = '$tableName'");
    while ($row = $res->fetch_assoc()) {
        $columns[$row['COLUMN_NAME']] = $row;
    }
    return $columns;
}

function getCreateTable($conn, $dbName, $tableName) {
    $res = $conn->query("SHOW CREATE TABLE `$dbName`.`$tableName`");
    if ($res && $row = $res->fetch_assoc()) {
        return $row['Create Table'];
    }
    return null;
}

$tables1 = getTables($conn, $db1);
$tables2 = getTables($conn, $db2);

$missingTables = array_diff($tables1, $tables2);
$commonTables = array_intersect($tables1, $tables2);

echo "=== Missing Tables ===<br>";
foreach ($missingTables as $table) {
    $createSQL = getCreateTable($conn, $db1, $table);
    if ($createSQL) {
        echo "$createSQL;<br><br>";
        if ($applyChanges) {
            if ($conn->query("USE `$db2`;") && $conn->query($createSQL)) {
                echo "✔️ Created table `$table` in $db2<br>";
            } else {
                echo "❌ Failed to create table `$table`: " . $conn->error . "<br>";
            }
        }
    }
}

echo "<br>=== Missing Columns in Common Tables ===<br>";
foreach ($commonTables as $table) {
    $cols1 = getColumns($conn, $db1, $table);
    $cols2 = getColumns($conn, $db2, $table);

    foreach ($cols1 as $colName => $colDef) {
        if (!isset($cols2[$colName])) {
            $type = $colDef['COLUMN_TYPE'];
            $null = $colDef['IS_NULLABLE'] == 'NO' ? 'NOT NULL' : 'NULL';
            $default = is_null($colDef['COLUMN_DEFAULT']) ? '' : "DEFAULT '" . $colDef['COLUMN_DEFAULT'] . "'";
            $extra = $colDef["EXTRA"];
            $alterSQL = "ALTER TABLE `$db2`.`$table` ADD COLUMN `$colName` $type $null $default $extra;";
            echo "$alterSQL<br>";

            if ($applyChanges) {
                if ($conn->query($alterSQL)) {
                    echo "✔️ Added column `$colName` to `$table` in $db2<br>";
                } else {
                    echo "❌ Failed to add column `$colName` to `$table`: " . $conn->error . "<br>";
                }
            }
        }
    }
}
?>

