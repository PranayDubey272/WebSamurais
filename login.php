<?php 
session_start();
include 'db-connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: typing-html.php");
        exit;
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

// Close the database connection
$conn->close();

?>