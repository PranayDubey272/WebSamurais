<?php
    session_start();
    $greeting = "Hi, " . $_SESSION['username'];

?>
<nav>
    <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <img src="img/logo.png" class="logo">

        <div class="menu">
            <div class="logo-toggle">
                <span class="logo"><a href="#">CodingLab</a></span>
                <i class='bx bx-x siderbarClose'></i>
            </div>

            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="lessons-html.php">Learn</a></li>
                <li><a href="leaderboard-html.php">Leaderboard</a></li>
                <li><a href="friends.php">Friends</a></li>
                <li><p style="position: relative;
                        font-size: 17px;
                        font-weight: 400;
                        color: var(--text-color);
                        text-decoration: none;
                        padding: 10px;
                        color: white;
                        "><?php echo $greeting; ?></p><li>
                <li><a href="logout.php" style="font-style = none">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
