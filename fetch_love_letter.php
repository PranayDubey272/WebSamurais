<?php
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);

if (!$conn) {
    die("Connection failed: ");
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT content FROM love_letters ORDER BY RAND() LIMIT 10"; // Get a random love letter
$result = $conn->query($sql);

// Display the love letter
$sentences = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sentences[] = $row['content'];
    }
}

// Close connection
$conn->close();
header('Content-Type: application/json');
echo json_encode($sentences);
?>

