<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Friend Requests</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
   <link rel="stylesheet" href="style.css">
  
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="friend_request.css">
</head>

<body>

    <div class="container">

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
                $sender = $row['sender_id'];
                $userQuery = "SELECT username FROM users WHERE id='$sender'";
                $userResult = $conn->query($userQuery);
                
                // Check if the inner query was successful
                if ($userResult) {
                    $userRow = $userResult->fetch_assoc();
                    $senderUsername = $userRow['username'];

                    echo '<div class="friend-request-item">';
                    echo "Friend request from $senderUsername <a href='accept_request.php?id={$row['id']}'>Accept</a> | <a href='reject_request.php?id={$row['id']}'>Reject</a>";
                    echo '</div>';
                } else {
                    // Handle the error, e.g., echo $conn->error;
                }
            }
        } else {
            echo '<p class="no-requests">No friend requests found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

    </div>
    <div id="stars-container"></div>
    <!-- Javascript file -->
    
  
    <script src="three3.js"></script>

</body>

</html>
