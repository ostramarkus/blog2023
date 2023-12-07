<?php
ini_set('display_errors', 1);
session_start();

// Include config file
require_once('.config.php');

// Include all files in app/functions //

$includeDir = "app/functions";

$dir = scandir($includeDir);

foreach ($dir as $entry) {
    $path = $includeDir . '/' . $entry;
    if (!is_dir($path)) {
        require_once($path);
    }
}

?>