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