<?php

/**
 * Connect to MySQL database
 *
 * @return mysqli
 */
function connectToDb() {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    require_once('../config.php');
    $dbHost = $config['dbHost'];
    $dbUser = $config['dbUser'];
    $dbPassword = $config['dbPassword'];
    $dbDatabase = $config['dbDatabase'];
    $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);    
    return $db;
}


?>