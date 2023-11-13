<?php
session_start();

if (isset($_SESSION['username'])) {
    // Get the user ID from the session
    $username = $_SESSION['username'];

    // Get the WPM from the POST data
    $wpm = isset($_POST['wpm']) ? $_POST['wpm'] : null;

    if ($wpm !== null) {
        $namef = "websamurais";
        $passwordf = "pranayjatinharshit";
        $conn = new mysqli("localhost", $namef, $passwordf, $namef);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch current WPM from the database
        $select_query = "SELECT hwpm FROM users WHERE username = ?";
        $select_stmt = $conn->prepare($select_query);
        $select_stmt->bind_param("s", $username);
        $select_stmt->execute();
        $select_stmt->bind_result($currentWPM);
        $select_stmt->fetch();
        $select_stmt->close();

        // Compare and update if necessary
        if ($currentWPM === null || $wpm > $currentWPM) {
            $update_query = "UPDATE users SET hwpm = ?,hpwm_date = NOW() WHERE username = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("is", $wpm, $username);
            $update_result = $update_stmt->execute();
            $update_stmt->close();

            if ($update_result) {
                echo json_encode(['success' => true, 'message' => 'WPM updated successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error updating WPM']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'New WPM is not greater than current WPM']);
        }

        // Close the database connection
        $conn->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'WPM not provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
}
?>
