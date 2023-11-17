// Dummy data for friends
const friendsData = [
    { name: 'Friend 1', avatar: 'https://placekitten.com/50/50' },
    { name: 'Friend 2', avatar: 'https://placekitten.com/51/51' },
    { name: 'Friend 3', avatar: 'https://placekitten.com/52/52' },
    // Add more friends as needed
  ];

  // Function to render friends on the page
  function renderFriends() {
    const friendsContainer = document.getElementById('friends-container');

    // Clear existing content
    friendsContainer.innerHTML = '';

    // Loop through the friendsData and create HTML elements
    friendsData.forEach(friend => {
      const friendElement = document.createElement('div');
      friendElement.classList.add('friend');

      const avatarElement = document.createElement('img');
      avatarElement.src = friend.avatar;
      avatarElement.alt = friend.name;

      const nameElement = document.createElement('span');
      nameElement.textContent = friend.name;

      friendElement.appendChild(avatarElement);
      friendElement.appendChild(nameElement);

      friendsContainer.appendChild(friendElement);
    });
  }

  // Call the renderFriends function when the page loads
  window.onload = renderFriends;