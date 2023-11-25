<?php
include 'db-connection.php';

$query = "SELECT name,username FROM users";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['username'] . ' <a href="send_request.php?id=' . $row['id'] . '">Send Friend Request</a><br>';
    }
} else {
    echo "No users found.";
}

// Close the database connection
$conn->close();
?>
