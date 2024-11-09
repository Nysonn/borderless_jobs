<?php
session_start(); // Start session for login
require_once 'db-connect.php'; // Include database connection
require_once 'vendor/autoload.php'; // Composer autoload for phpdotenv

// Set session cookie for 1 hour
$cookie_expiration = time() + 3600; // 1 hour expiration

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Check if the form is for signing up or logging in
    if (isset($_POST['action']) && $_POST['action'] === 'signup') {
        // Sign-up logic
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone'];
        $password = $_POST['password'];

        // Hash the password using bcrypt with 10 salt rounds
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

        try {
            // Prepare SQL query to insert user data
            $sql = "INSERT INTO users (name, email, phone_number, password) VALUES (:name, :email, :phone_number, :password)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':password', $hashed_password);

            // Execute query
            if ($stmt->execute()) {
                // If the user is created successfully, redirect to post-a-job.php
                // Set session cookie for 1 hour
                setcookie('user_id', $pdo->lastInsertId(), $cookie_expiration, '/');
                setcookie('user_name', $name, $cookie_expiration, '/');
                setcookie('user_email', $email, $cookie_expiration, '/');
                setcookie('user_phone_number', $phone_number, $cookie_expiration, '/');

                // Redirect to post-a-job.php
                header("Location: post-a-job.php");
                exit(); // Make sure to stop the script after redirection
            } else {
                echo "Error: Could not create account.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } 
    elseif (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Login logic
        $phone_number = $_POST['phone'];
        $password = $_POST['password'];

        try {
            // Prepare SQL query to find the user by phone number
            $sql = "SELECT * FROM users WHERE phone_number = :phone_number";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->execute();

            // Check if a user with this phone number exists
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verify the password with the hashed password in the database
                if (password_verify($password, $user['password'])) {
                    // If the password is correct, store user info in session and set cookies
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['phone_number'] = $user['phone_number'];

                    // Set session cookies for 1 hour
                    setcookie('user_id', $user['id'], $cookie_expiration, '/');
                    setcookie('user_name', $user['name'], $cookie_expiration, '/');
                    setcookie('user_email', $user['email'], $cookie_expiration, '/');
                    setcookie('user_phone_number', $user['phone_number'], $cookie_expiration, '/');

                    // Redirect to post-a-job.php after successful login
                    header("Location: post-a-job.php");
                    exit(); // Ensure to stop after redirection
                } else {
                    echo "Invalid password. Please try again.";
                }
            } else {
                echo "No account found with this phone number.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
