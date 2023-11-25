<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<p>Hello, ' . $_SESSION['username'] . '! Welcome!</p>';
    include 'navbar-loggedin.php';
} else {
    include 'navbar.php';
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="test.css">

        
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Homepage</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

</head>
<body>
    <div class="landingline">
    <p>Write Love Letters in the stars:And be the</br>
        Messenger of Hikoboshi and Orihime
    </p>
</div>
<div class="start">
    <a href="C:\Users\hp\Documents\typing page\index.html">
   <button class="starts" onclick = "window.location.href='typing-html.php'" >Get Started</button></a>
</div>
<div id="stars-container"></div>
    <script src="three33.js"></script>
</body>
</html>