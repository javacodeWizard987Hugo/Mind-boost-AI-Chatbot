<?php
$server = "localhost";      // Default XAMPP/WAMP server
$username = "root";         // Default XAMPP/WAMP username
$password = "";             // Default XAMPP/WAMP password
$database = "mindboost";

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    // In a real application, you might want to log this error or display a more user-friendly message.
    // For now, we'll die and show the error for debugging purposes.
    die("Connection failed: " . mysqli_connect_error());
}
// Optional: You can set charset if needed, though often default is fine.
// mysqli_set_charset($conn, "utf8mb4");
?>
