<?php
session_start();

// Check if user is logged in
// if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
//     echo "User is not logged in.";
//     exit; // or handle the situation appropriately
// }

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "bookly";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data sent via AJAX
$book_name = $_POST['book_name'];
$book_price = $_POST['book_price'];
$user_id =$_SESSION['user_id'];

// Insert the book information into the database
$sql = "INSERT INTO books (user_id, book_name, book_price) VALUES ('$user_id', '$book_name', '$book_price')";

if ($conn->query($sql) === TRUE) {
    echo "Book added to cart successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
