<?php
header('Content-Type: application/json');
session_start();
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);
$username = $_SESSION['username'];
$userId = 0;
$sql = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($userId);
$stmt->fetch();
$stmt->close();
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Default query for All Time
$select_query = "SELECT name, hwpm FROM users ORDER BY hwpm DESC LIMIT 10";

// Checking if a specific time interval is provided or not
if (isset($_GET['interval'])) {
    $interval = $_GET['interval'];
    
    // intervals conditions
    switch ($interval) {
        case 'alltime':
            $select_query = "SELECT name, hwpm FROM users ORDER BY hwpm DESC LIMIT 10";
            break;
        case 'weekly':
            
            $select_query = "SELECT name, hwpm FROM users WHERE hpwm_date >= NOW() - INTERVAL 1 WEEK ORDER BY hwpm DESC LIMIT 10";
            break;
        case 'daily':
            //logic to fetch daily data
            $select_query = "SELECT name, hwpm from users where DATE(hpwm_date) = CURDATE()  ORDER BY hwpm DESC LIMIT 10";

        case 'friends':
            $select_query = "SELECT 
                                CASE 
                                    WHEN u.id = fr.sender_id THEN fr.receiver_id
                                    WHEN u.id = fr.receiver_id THEN fr.sender_id
                                END AS friend_id,
                                u.name,
                                u.hwpm 
                            FROM users u
                            INNER JOIN friend_requests fr ON (u.id = fr.sender_id OR u.id = fr.receiver_id) AND u.id != $userId
                            ORDER BY u.hwpm DESC LIMIT 10";
            break;

            
            
        default:
            break;
    }
}

$result = $conn->query($select_query);

if ($result === false) {
    die(json_encode(['error' => 'Error in the query: ' . $conn->error]));
}

$leaderboardData = array();

while ($row = $result->fetch_assoc()) {
    $leaderboardData[] = $row;
}

$conn->close();

// Return leaderboard data as JSON
echo json_encode(['data' => $leaderboardData]);
?>
