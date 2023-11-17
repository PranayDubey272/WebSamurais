document.addEventListener('DOMContentLoaded', function () {
    // Sample friends and friend requests data
    const friendsData = [
        { name: 'Friend 1', avatar: 'user.png' },
        { name: 'Friend 2', avatar: 'user.png' },
        // Add more friends as needed
    ];

    const requestsData = [
        { name: 'Requester 1', avatar: 'user.png' },
        { name: 'Requester 2', avatar: 'user.png' },
        // Add more friend requests as needed
    ];

    // Function to render friends and friend requests
    function renderFriendsAndRequests() {
        const friendsList = document.getElementById('friendsList');
        const requestsList = document.getElementById('requestsList');

        // Render friends
        friendsData.forEach(friend => {
            const friendItem = createListItem(friend, 'friend-item');
            friendsList.appendChild(friendItem);
        });

        // Render friend requests
        requestsData.forEach(request => {
            const requestItem = createRequestItem(request);
            requestsList.appendChild(requestItem);
        });
    }

    // Function to create a list item for a friend or request
    function createListItem(data, className) {
        const listItem = document.createElement('li');
        listItem.classList.add(className);

        const img = document.createElement('img');
        img.src = data.avatar;
        img.alt = data.name;

        const name = document.createElement('span');
        name.textContent = data.name;

        listItem.appendChild(img);
        listItem.appendChild(name);

        return listItem;
    }

    // Function to create a list item for a friend request with an "ADD" button
    function createRequestItem(data) {
        const requestItem = createListItem(data, 'request-item');

        const addButton = document.createElement('button');
        addButton.textContent = 'ADD';
        addButton.addEventListener('click', function () {
            // Handle the logic to add the friend here
            alert(`Adding ${data.name} as a friend!`);
            // Optionally, you can remove the request item from the list after adding as a friend
            requestItem.remove();
        });

        requestItem.appendChild(addButton);

        return requestItem;
    }

    // Toggle visibility of sections
    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        section.classList.toggle('hidden');
    }

    // Attach click event listener to toggle sections
    const toggleButtons = document.querySelectorAll('.toggle-section');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const sectionId = this.getAttribute('data-section');
            toggleSection(sectionId);
        });
    });

    // Call the function to render friends and friend requests
    renderFriendsAndRequests();
});
