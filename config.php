<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = ''; // Default XAMPP empty password
$db   = 'setskill_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Helper function to check login
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Helper function to check role
function checkRole($role) {
    if (!isLoggedIn()) {
        header("Location: ../login.php");
        exit();
    }
    if ($_SESSION['role'] !== $role) {
        if ($_SESSION['role'] === 'admin') {
            header("Location: ../Admin/index.php");
        } else {
            header("Location: ../User/index.php");
        }
        exit();
    }
}
?>
