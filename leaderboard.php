<?php
header('Content-Type: application/json');

$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

$select_query = "SELECT name, hwpm FROM users ORDER BY hwpm DESC LIMIT 10";
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
