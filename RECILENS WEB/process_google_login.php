<?php
// Get the token sent from the Google API
$token = $_POST['token'];

// Verify the token with Google
$client = new Google_Client(['client_id' => 'YOUR_GOOGLE_CLIENT_ID']);
$payload = $client->verifyIdToken($token);
if ($payload) {
    $userId = $payload['sub'];
    $email = $payload['email'];
    $name = $payload['name'];

    // Check if the user exists in your database, if not, insert them
    // Redirect to the home page
} else {
    // Invalid token
}
?>
