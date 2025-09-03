<?php
session_start(); // Optional: if you want to use session-based flash messages.
                 // For simplicity, we'll use URL parameters for feedback first.

require 'partials/_dbconnect.php';

$redirect_url = "../index.php"; // Assuming contact.html is one level up from where submit_contact.php might be if it were in an 'api' or 'scripts' folder. Adjust if submit_contact.php is at root.
                                  // If contact.html and submit_contact.php are in the same directory, use "contact.html".
                                  // Given current plan, they are likely in the same root directory. So, "contact.html" is probably correct.
$redirect_url = "index.php";
 // Corrected based on likely flat structure for these PHP files.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    // Using htmlspecialchars for basic XSS protection and mysqli_real_escape_string for SQL injection protection.
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['name']))) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email']))) : '';
    $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['message']))) : '';

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        // Handle empty fields - redirect with an error
        header("Location: " . $redirect_url . "?status=error&msg=" . urlencode("All fields are required."));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        header("Location: " . $redirect_url . "?status=error&msg=" . urlencode("Invalid email format."));
        exit();
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

        if (mysqli_stmt_execute($stmt)) {
            // Success
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: " . $redirect_url . "?status=success&msg=" . urlencode("Thank you for your message! We'll get back to you soon."));
            exit();
        } else {
            // Error in execution
            $error_msg = "Error: " . mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: " . $redirect_url . "?status=error&msg=" . urlencode("Could not send message. " . $error_msg));
            exit();
        }
    } else {
        // Error in preparing statement
        $error_msg = "Error preparing statement: " . mysqli_error($conn);
        mysqli_close($conn);
        header("Location: " . $redirect_url . "?status=error&msg=" . urlencode("Database error. " . $error_msg));
        exit();
    }

} else {
    // Not a POST request, redirect to form or show an error
    header("Location: " . $redirect_url . "?status=error&msg=" . urlencode("Invalid request method."));
    exit();
}
?>
