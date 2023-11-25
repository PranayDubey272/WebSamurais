<?php
session_start();
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);
$username = $_SESSION['username'];


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    
    //getting ID 
    $sender_id = 0;
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($sender_id);
    $stmt->fetch();
    $stmt->close();

    $receiver_id = $_GET['id'];

    // Check if the sender_id exists in the users table
    $check_sender_query = "SELECT * FROM users WHERE id='$sender_id'";
    $result = $conn->query($check_sender_query);

    if ($result->num_rows === 0) {
        echo "Error: Sender ID ($sender_id) does not exist.";
    } else {
        // Insert the friend request
        $insert_query = "INSERT INTO friend_requests (sender_id, receiver_id) VALUES ('$sender_id', '$receiver_id')";
        
        if ($conn->query($insert_query) === TRUE) {
            echo "Friend request sent successfully.";
        } else {
            echo "Error sending friend request: " . $conn->error;
        }
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
