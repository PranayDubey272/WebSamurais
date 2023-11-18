<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Request System</title>
</head>
<body>
<h2><a href="friend_request.php">Pending Requests</h2></a>
<h2>User who you can add</h2>

<?php 
session_start();
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);
$username = $_SESSION['username'];
// Display users
$query = "SELECT * FROM users WHERE username <> '$username'";
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

</body>
</html>
