<?php
// Script to create the missing research_document table
// Run this file once to create the table

// Include the config file for database connection details
require_once 'config.php';

try {
    // Create PDO connection
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Read the SQL file
    $sql = file_get_contents('create_research_document_table.sql');
    
    // Execute the SQL
    $pdo->exec($sql);
    
    echo "SUCCESS: research_document table created successfully!\n";
    echo "You can now access your application without the database error.\n";
    
} catch (PDOException $e) {
    echo "ERROR: Failed to create table: " . $e->getMessage() . "\n";
    echo "Please check your database connection details in config.php\n";
}
?>