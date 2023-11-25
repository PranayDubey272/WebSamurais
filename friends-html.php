<?php 


include 'navbar-loggedin.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
error_reporting(E_ALL ^ E_NOTICE);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Request System</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="test.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="friend.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

</head>
<body>
    <div class="box">
         <h1>Hello  <?php echo $_SESSION['username']?> </h1>
        
        <div class="heading2">
            <a href="friends_show.php"> <h4 class="toggle-section" data-section="home">Friends</h4></a>

        </div>
        <div class="heading3">
            <a href="friend_request.php" ><h4 class="toggle-section" data-section="home ">Friend Request</h4></a>

        </div>
        <div class="heading4">
        <a href="friends.php"> <h4 class="toggle-section" data-section="home">Add Friends</h4></a>

        </div>
        </div>
        <div class="liness">
            <i class='bx bxs-quote-alt-left'></i>
            <h2>Like the stars in the vast sky, 
            </br>our friendship shines brightly, 
        </br>undiminished by any distance.</h2>
        </div>

       
       
               
          
     
    

    <script src="friend.js"></script>
    <div id="stars-container"></div>
    <script src="three33.js"></script>
   
</body>

</html>
