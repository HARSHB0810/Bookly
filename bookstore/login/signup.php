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
$username = $_POST['username'];
$password = $_POST['password'];

// Generate user_id (if not auto-increment)
// You can use any method to generate unique IDs, such as UUID or a custom function.
$user_id = generateUserID(); // Example function to generate a user ID

// Insert data into database
$sql = "INSERT INTO users (user_id, email, username, password) VALUES ('$user_id', '$email', '$username', '$password')";
if (mysqli_query($conn, $sql)) {
    // Retrieve the userid after successful insertion
    $userid = mysqli_insert_id($conn);
    
    // Store the userid in a session variable
    $_SESSION['user_id'] = $userid;

    // Redirect to next page upon successful insertion
    header("Location: ../browse/browse.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// Example function to generate user ID
function generateUserID() {
    // Generate a unique ID, for example using microtime
    // This is a very simple example and may not be suitable for production
    return microtime(true) * 10000;
}
?>
