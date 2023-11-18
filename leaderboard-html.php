<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaderboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="leaderboard.css">
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

<div id="customTabs">
  <a href="#" onclick="showTab('allTime')">All Time</a>
  <a href="#" onclick="showTab('weekly')">Weekly</a>
  <a href="#" onclick="showTab('daily')">Daily</a>
  <a href="#" onclick="showTab('friends')">Friends</a>
  </div>
  <section>
    <table id="leaderboardTable">
      <thead>
        <tr>
          <th>Name</th>
          <th>WPM</th>
        </tr>
      </thead>
      <tbody id="tableBody">
      </tbody>
    </table>
  </section>
  <script>
    function showTab(tab) {

$('#tableBody tr').hide();

switch (tab) {
  case 'allTime':
    $.ajax({
        url: 'leaderboard.php',
        method: 'GET',
        data: { interval: 'alltime' },
        dataType: 'json',
        success: function (data) {
            console.log("Success (alltime):", data);
            populateLeaderboardTable(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
    function populateLeaderboardTable(response) {
  var data = response.data; 

  var tableBody = $('#tableBody');

  tableBody.empty();

  data.forEach(function(row) {
    var newRow = '<tr><td>' + row.name + '</td><td>' + row.hwpm + '</td></tr>';
    tableBody.append(newRow);
  });
}
    break;
  case 'weekly':
    $.ajax({
        url: 'leaderboard.php',
        method: 'GET',
        data: { interval: 'weekly' },
        dataType: 'json',
        success: function (data) {
            console.log("Success (weekly):", data);
            populateLeaderboardTable(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
    function populateLeaderboardTable(response) {
  var data = response.data; 

  var tableBody = $('#tableBody');

  tableBody.empty();

  data.forEach(function(row) {
    var newRow = '<tr><td>' + row.name + '</td><td>' + row.hwpm + '</td></tr>';
    tableBody.append(newRow);
  });
}
    break;
  case 'daily':
    $.ajax({
        url: 'leaderboard.php',
        method: 'GET',
        data: { interval: 'daily' },
        dataType: 'json',
        success: function (data) {
            console.log("Success (Daily):", data);
            populateLeaderboardTable(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
    function populateLeaderboardTable(response) {
  var data = response.data; 

  var tableBody = $('#tableBody');

  tableBody.empty();

  data.forEach(function(row) {
    var newRow = '<tr><td>' + row.name + '</td><td>' + row.hwpm + '</td></tr>';
    tableBody.append(newRow);
  });
}
    
    break;
  case 'friends':
    $.ajax({
        url: 'leaderboard.php',
        method: 'GET',
        data: { interval: 'friends' },
        dataType: 'json',
        success: function (data) {
            console.log("Success (friends):", data);
            populateLeaderboardTable(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error:', textStatus, errorThrown);
        }
    });
    function populateLeaderboardTable(response) {
  var data = response.data; 

  var tableBody = $('#tableBody');

  tableBody.empty();

  data.forEach(function(row) {
    var newRow = '<tr><td>' + row.name + '</td><td>' + row.hwpm + '</td></tr>';
    tableBody.append(newRow);
  });
}
    break;
  default:
    break;
}
}
    $(document).ready(function() {


      showTab('allTime');
    });
  </script>
    
</body>
</html>
