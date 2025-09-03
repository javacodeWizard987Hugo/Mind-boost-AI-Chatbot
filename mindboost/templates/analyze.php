<?php
// Set content type to application/json
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the raw POST data
    $raw_input = file_get_contents('php://input');
    
    // Decode the JSON data
    $input_data = json_decode($raw_input, true);

    // Check if JSON decoding was successful and if 'user_input' is present
    // For now, we are not strictly validating 'user_input' existence for the placeholder response,
    // but in a real application, you would.
    // Example: if (json_last_error() !== JSON_ERROR_NONE || !isset($input_data['user_input'])) {
    // http_response_code(400); // Bad Request
    // echo json_encode(['error' => 'Invalid JSON or missing user_input']);
    // exit();
    // }

    // Placeholder response
    $response_data = [
        "depression_level" => "Low", // Placeholder value
        "recommendation" => "Keep up your healthy habits! Remember to take breaks and stay connected." // Placeholder recommendation
    ];

    // Send the JSON response
    echo json_encode($response_data);

} else {
    // Handle invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Invalid request method. Please use POST.']);
}
?>
