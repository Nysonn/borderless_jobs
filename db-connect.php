<?php
// Include the Composer autoloader to load dotenv
require_once 'vendor/autoload.php';

// Load the environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Fetching the database credentials from the environment variables
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$port = $_ENV['DB_PORT'];

// Create the PostgreSQL PDO connection string
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

// Establish the database connection
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connected successfully!";
} catch (PDOException $e) {
    // If there is a connection error, display a message
    die("Connection failed: " . $e->getMessage());
}

?>
