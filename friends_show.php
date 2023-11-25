<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Request System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
  
  
    <link rel="stylesheet" href="lessons-stars.css">
    <style>


/* Style the scrollbar */
::-webkit-scrollbar {
    width: 8px; /* Set the width of the scrollbar */
}

/* Style the scrollbar track */
::-webkit-scrollbar-track {
    background-color: #000; /* Set the color of the track (background behind the scrollbar) */
}

/* Style the scrollbar handle (thumb) */
::-webkit-scrollbar-thumb {
    background-color: black; /* Set the color of the handle */
    border-radius: 4px; /* Optional: Round the corners of the handle */
}

/* Style the scrollbar handle on hover */
::-webkit-scrollbar-thumb:hover {
    background-color: #ccc; /* Set the color of the handle on hover */
}

   body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #262626; /* Dark gray background */
            color: #fff; /* White text color */
        }

        #stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        header {
            background-color: #1a1a1a; /* Dark gray header background */
            color: #66ccff; /* Light blue text color */
            text-align: center;
            padding: 20px;
            border-bottom: 2px solid #0066cc; /* Darker blue border */
            transition: background-color 0.5s ease;
        }

        header:hover {
            background-color: #333333; /* Slightly darker gray on hover */
        }

        h2 {
            color: #66ccff;
            transition: color 0.5s ease;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 1px 2px rgba(102, 204, 255, 0.1); /* Light blue box shadow */
            border-radius: 10px;
            overflow: hidden;
            background-color: transparent; /* Dark gray table background */
            transition: box-shadow 0.5s ease;
        }

        table:hover {
            box-shadow: 0 8px 16px rgba(102, 204, 255, 0.2); /* Darker blue box shadow on hover */
        }

        th, td {
            border: 1px solid #0066cc; /* Darker blue border */
            padding: 12px;
            align-items:center;
            text-align: left;
            
            color: #ddd; /* Light gray text color */
            transition: background-color 0.5s ease;
        }

        th:hover, td:hover {
            background-color: #444444; /* Slightly darker gray on hover */
        }

        th {
            background-color: #004080; /* Dark blue header background */
            color: #66ccff;
        }

        a {
            text-decoration: none;
            color: #ffcc00; /* Gold link color */
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            text-decoration: none;
            color: #ff9900; /* Darker gold on hover */
        }

        .user-list {
            margin-top: 20px;
        }
    .animeGif {
        width: 50px; 
        height: 50px; 
        border-radius: 50%; 
        overflow: hidden;
    }

    
</style>





</head>
<body>
    <div class="user-list">
        <h2>Your Friends</h2>

        <?php 
        session_start();
        $namef = "websamurais";
        $passwordf = "pranayjatinharshit";
        $conn = new mysqli("localhost", $namef, $passwordf, $namef);
        $username = $_SESSION['username'];
        
        //getting ID 
        $userId = 0;
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();
        
        // Display users above the table and store in an array
        $userArray = array();
        $query = "SELECT * FROM users 
        WHERE username <> '$username' 
        AND id IN (
            SELECT sender_id 
            FROM friend_requests 
            WHERE receiver_id = '$userId' AND status='accepted'
            UNION
            SELECT receiver_id
            FROM friend_requests 
            WHERE sender_id = '$userId' AND status='accepted'
        )";
        $result = $conn->query($query);
        
        if ($result === false) {
            die('Error executing the query: ' . $conn->error);
        }
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userArray[] = $row; // Store user data in an array
            }
        } else {
            echo "No users found.";
        }
        
        // Display users inside the table using the stored array
        if (!empty($userArray)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userArray as $user): ?>
                        <tr>
                        <td>
                        
                        <img class="animeGif" src="user.png" alt="Anime GIF" data-src="?>"  onerror="src='user.png'">
                            <?php echo $user['username']; ?>
    
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>

        <?php
        // Close the database connection
        $conn->close();
        ?>

    </div>
    <script src="animepfp.js"></script>
    <div id="stars-container"></div>
    <!-- Javascript file -->
    
    
    <script src="three3.js"></script>
</body>
</html>
