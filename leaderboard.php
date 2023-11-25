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
            $select_query = "SELECT distinct name, hwpm from users where hpwm_date >= NOW() - INTERVAL 1 DAY  ORDER BY hwpm DESC LIMIT 10";
            break;
        case 'friends':
            $select_query = "SELECT DISTINCT 
            CASE 
                WHEN u.id = fr.sender_id AND status = 'accepted' THEN fr.receiver_id
                WHEN u.id = fr.receiver_id AND status = 'accepted' THEN fr.sender_id
            END,
            users.name,
            users.hwpm
        FROM 
            users u
        INNER JOIN 
            friend_requests fr ON 
            (u.id = fr.sender_id OR u.id = fr.receiver_id) AND status = 'accepted' AND (fr.sender_id = $userId OR fr.receiver_id = $userId)
        INNER JOIN 
            users ON 
            ((users.id = fr.receiver_id AND fr.sender_id = $userId) OR (users.id = fr.sender_id AND fr.receiver_id = $userId)) AND u.id != users.id
        ORDER BY 
            users.hwpm DESC LIMIT 10;
        ";
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
