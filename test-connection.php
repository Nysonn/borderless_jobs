<?php
require_once 'db-connect.php';

// Assuming db-connect.php sets up the PDO connection
if (isset($pdo)) {
    echo "Database connected successfully!";
} else {
    echo "Database connection failed.";
}
