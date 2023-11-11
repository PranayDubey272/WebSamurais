<?php 
if(isset($_POST['submit']))
{
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);

if (!$conn) {
die("Connection failed: ");
}
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
        echo "Login successful!";
        // You can redirect the user to a dashboard or another page here
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

// Close the database connection
$conn->close();

}
?>