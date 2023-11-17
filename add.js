 // Dummy data for user search results
 const searchResultsData = [
    { name: 'User 1', avatar: 'https://placekitten.com/50/50' },
    { name: 'User 2', avatar: 'https://placekitten.com/51/51' },
    // Add more search results as needed
  ];

  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const searchResultsContainer = document.getElementById('search-results');

    // Function to render search results on the page
    function renderSearchResults() {
      // Clear existing content
      searchResultsContainer.innerHTML = '';

      // Loop through the searchResultsData and create HTML elements
      searchResultsData.forEach(result => {
        const resultElement = document.createElement('div');
        resultElement.classList.add('search-result');

        const avatarElement = document.createElement('img');
        avatarElement.src = result.avatar;
        avatarElement.alt = result.name;

        const nameElement = document.createElement('span');
        nameElement.textContent = result.name;

        const sendRequestButton = document.createElement('button');
        sendRequestButton.textContent = 'Send Request';
        sendRequestButton.classList.add('send-request-button');
        sendRequestButton.addEventListener('click', () => handleSendFriendRequest(result.name));

        resultElement.appendChild(avatarElement);
        resultElement.appendChild(nameElement);
        resultElement.appendChild(sendRequestButton);

        searchResultsContainer.appendChild(resultElement);
      });
    }

    // Function to handle sending a friend request
    function handleSendFriendRequest(userName) {
      alert(`Friend request sent to ${userName}!`);
      // TODO: Implement logic to send a friend request
    }

    // Add event listener to the search input for real-time updates
    searchInput.addEventListener('input', renderSearchResults);
  });