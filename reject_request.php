<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $request_id = $_GET['id'];

    // Update the status of the friend request to 'rejected'
    $update_query = "UPDATE friend_requests SET status='rejected' WHERE id='$request_id' AND status='pending'";
    if ($conn->query($update_query) === TRUE) {
        echo "Friend request rejected successfully.";
    } else {
        echo "Error rejecting friend request: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
