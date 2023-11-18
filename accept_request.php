<?php
session_start();
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);
$username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $request_id = $_GET['id'];

    // Retrieve the sender_id and receiver_id from the friend_requests table
    $query = "SELECT sender_id, receiver_id FROM friend_requests WHERE id='$request_id' AND status='pending'";
    $result = $conn->query($query);

    if ($result === false) {
        echo "Query error: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sender_id = $row['sender_id'];
        $receiver_id = $row['receiver_id'];

        // Update the status of the friend request to 'accepted'
        $update_query = "UPDATE friend_requests SET status='accepted' WHERE id='$request_id'";
        if ($conn->query($update_query) === TRUE) {
            echo "Friend request accepted successfully.";

        } else {
            echo "Error accepting friend request: " . $conn->error;
        }
    } else {
        echo "Invalid request or friend request already accepted/rejected.";
    }
} else {
    echo "Invalid request. Missing 'id' parameter or not a GET request.";
}

// Close the database connection
$conn->close();
?>
