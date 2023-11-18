<?php
    include 'navbar-loggedin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Friend Requests</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="stripes" style="height: 240px;
  width:500px;
  background-color: #fff;
  background-image: linear-gradient(180deg, transparent 50%, #000 50%);
  background-size: 60px 30px;
  
}"></div>
  
<h2>Pending Friend Requests</h2>

<?php

$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);
$username = $_SESSION['username'];

//getting ID 
$userId = 0;
$sql = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($userId);
$stmt->fetch();
$stmt->close();

$query = "SELECT * FROM friend_requests WHERE receiver_id='$userId' AND status='pending'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Friend request from user ID " . $row['sender_id'] . ' <a href="accept_request.php?id=' . $row['id'] . '">Accept</a> | <a href="reject_request.php?id=' . $row['id'] . '">Reject</a><br>';
    }
} else {
    echo "No friend requests found.";
}

// Close the database connection
$conn->close();
?>

</body>
</html>
