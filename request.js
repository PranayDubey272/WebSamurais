// Dummy data for friend requests
const friendRequestsData = [
    { name: 'Friend 1', avatar: 'https://placekitten.com/50/50' },
    { name: 'Friend 2', avatar: 'https://placekitten.com/51/51' },
    // Add more friend requests as needed
  ];

  document.addEventListener('DOMContentLoaded', function () {
    const friendRequestsList = document.getElementById('friend-requests-list');
    const friendRequestTemplate = document.getElementById('friend-request-template');

    // Function to render friend requests on the page
    function renderFriendRequests() {
      // Clear existing content
      friendRequestsList.innerHTML = '';

      // Loop through the friendRequestsData and create HTML elements
      friendRequestsData.forEach(friendRequest => {
        const clone = document.importNode(friendRequestTemplate.content, true);

        clone.querySelector('.friend-avatar').src = friendRequest.avatar;
        clone.querySelector('.friend-avatar').alt = friendRequest.name;
        clone.querySelector('.friend-name').textContent = friendRequest.name;

        friendRequestsList.appendChild(clone);
      });

      // Add event listeners to "Add" and "Reject" buttons
      const addButtons = document.querySelectorAll('.add-button');
      addButtons.forEach(button => {
        button.addEventListener('click', handleAddFriend);
      });

      const rejectButtons = document.querySelectorAll('.reject-button');
      rejectButtons.forEach(button => {
        button.addEventListener('click', handleRejectFriend);
      });
    }

    // Function to handle the "Add" button click
    function handleAddFriend(event) {
      const friendRequestElement = event.target.closest('.friend-request');
      const friendName = friendRequestElement.querySelector('.friend-name').textContent;
      alert(`Added ${friendName} as a friend!`);
      // TODO: Implement logic to handle adding a friend
    }

    // Function to handle the "Reject" button click
    function handleRejectFriend(event) {
      const friendRequestElement = event.target.closest('.friend-request');
      const friendName = friendRequestElement.querySelector('.friend-name').textContent;
      alert(`Rejected friend request from ${friendName}.`);
      // TODO: Implement logic to handle rejecting a friend request
    }

    // Call the renderFriendRequests function when the page loads
    renderFriendRequests();
  });