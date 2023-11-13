<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaderboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
          <th>Name</th>
          <th>WPM</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <!-- Leaderboard data will be dynamically added here -->
      </tbody>
    </table>
  </section>
  <script>
    $(document).ready(function() {
    // Fetch leaderboard data from the backend
    $.ajax({
        url: 'leaderboard.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log("Success:", data);
            populateLeaderboardTable(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });

    function populateLeaderboardTable(response) {
  var data = response.data; // Access the 'data' property

  var tableBody = $('#tableBody');

  // Clear existing table rows
  tableBody.empty();

  // Populate the table with the fetched data
  data.forEach(function(row) {
    var newRow = '<tr><td>' + row.name + '</td><td>' + row.hwpm + '</td></tr>';
    tableBody.append(newRow);
  });
}

});

  </script>
    
</body>
</html>
