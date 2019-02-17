<?php
$dsn = 'mysql:host=localhost;dbname=chartitmd_db';
$sqlusername = 'chartitmd';
$sqlpassword = 'mc8W5KcwsBKKVkYr';

try {
    $db = new PDO($dsn, $sqlusername, $sqlpassword);
    // Force all errors to return exception instead.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
}
