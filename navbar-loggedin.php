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
                <li><a href="#">Home</a></li>
                <li><a href="lessons-html.php">Learn</a></li>
                <li><a href="#">Leaderboard</a></li>
                <li><a href="#">Dashboard</a></li>
                <p style="position: relative;
                        font-size: 17px;
                        font-weight: 400;
                        color: var(--text-color);
                        text-decoration: none;
                        padding: 10px;
                        color: white;
                        "><?php echo $greeting; ?></p>
            </ul>
        </div>
    </div>
</nav>
