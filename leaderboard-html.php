<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaderboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    nav {
      display: flex;
      justify-content: space-around;
      background-color: #444;
      padding: 10px;
    }
    nav a:hover{
        color: black;
        background-color: #ddd;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 5px;
    }


    section {
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #333;
      color: #fff;
    }
  </style>
</head>
<body>

  <header>
    <h1>Tanabata Leaderboard</h1>
  </header>

  <?php include 'navbar-loggedin.php' ?>

  <section>
    <table id="leaderboardTable">
      <thead>
        <tr>
          <th>Rank</th>
          <th>Name</th>
          <th>Score</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <!-- Leaderboard data will be dynamically added here -->
      </tbody>
    </table>
  </section>

  <script>
    // Sample data for demonstration
    const allTimeData = [
      { rank: 1, name: 'Player 1', score: 1000 },
      { rank: 2, name: 'Player 2', score: 950 },
      // Add more data as needed
    ];

    const weeklyData = [
      { rank: 1, name: 'Player 3', score: 500 },
      { rank: 2, name: 'Player 4', score: 480 },
      // Add more data as needed
    ];

    const dailyData = [
      { rank: 1, name: 'Player 5', score: 200 },
      { rank: 2, name: 'Player 6', score: 180 },
      // Add more data as needed
    ];

    const friendsData = [
      { rank: 1, name: 'Friend 1', score: 300 },
      { rank: 2, name: 'Friend 2', score: 280 },
      // Add more data as needed
    ];

    function showTab(tab) {
      let data;
      switch (tab) {
        case 'allTime':
          data = allTimeData;
          break;
        case 'weekly':
          data = weeklyData;
          break;
        case 'daily':
          data = dailyData;
          break;
        case 'friends':
          data = friendsData;
          break;
        default:
          data = allTimeData;
      }

      // Clear previous data
      const tableBody = document.getElementById('tableBody');
      tableBody.innerHTML = '';

      // Populate table with new data
      data.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${item.rank}</td>
          <td>${item.name}</td>
          <td>${item.score}</td>
        `;
        tableBody.appendChild(row);
      });
    }

    // Initial load (default to All Time)
    showTab('allTime');
  </script>

</body>
</html>
