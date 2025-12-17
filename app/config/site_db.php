<?php
/**
 * Public DB Connection (Read-only)
 * Only SELECT access to devrg database
 * For public website blog display
 */

$SITE_DB_CONFIG = [
    'DB_HOST' => 'localhost',     // use '127.0.0.1' if socket issues
    'DB_NAME' => 'devrg',
    'DB_USER' => 'read',          // read-only user
    'DB_PASS' => 'ReadOnly@123'   // password you set in MariaDB
];

try {
    $siteDB = new PDO(
        "mysql:host={$SITE_DB_CONFIG['DB_HOST']};dbname={$SITE_DB_CONFIG['DB_NAME']};charset=utf8",
        $SITE_DB_CONFIG['DB_USER'],
        $SITE_DB_CONFIG['DB_PASS'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // throw exceptions on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch associative arrays
            PDO::ATTR_EMULATE_PREPARES => false // use native prepared statements
        ]
    );
} catch (PDOException $e) {
    // If connection fails, show a friendly message
    die("Public DB Connection Failed: " . $e->getMessage());
}
