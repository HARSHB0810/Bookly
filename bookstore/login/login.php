<?php
session_start(); // Start the session

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "bookly");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Check user credentials
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User found, retrieve user ID
    $row = mysqli_fetch_assoc($result);
    $userid = $row['user_id'];

    // Store the userid in a session variable
    $_SESSION['user_id'] = $userid;

    // Redirect to next page
    header("Location:../browse/browse.html");
    exit();
} else {
    echo "Invalid email or password.";
}

mysqli_close($conn);
?>
