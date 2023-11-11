<?php
// Connect to the MySQL database
if(isset($_POST['submit']))
{
$namef = "websamurais";
$passwordf = "pranayjatinharshit";
$conn = new mysqli("localhost", $namef, $passwordf, $namef);

if (!$conn) {
die("Connection failed: ");
}
$name = $_POST['name'];
$username = $_POST['username'];
$email  = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
//$pfp = $_POST('pfp');
$query = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";


// Insert user data into the database

if ($conn->query($query) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
}
else {
echo "Please fill out all the fields.";
}
// Close the database connection

$conn->close();
        
?>
