<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friend Requests</title>
  <link rel="stylesheet" href="request.css">
  <style>

  </style>
</head>
<body>

<div id="friend-requests-container">
  <div id="friend-requests-header">
    <h2>Friend Requests</h2>
  </div>

  <!-- Friend request template -->
  <template id="friend-request-template">
    <div class="friend-request">
      <img class="friend-avatar" alt="">
      <span class="friend-name"></span>
      <div class="friend-request-buttons">
        <button class="add-button">Add</button>
        <button class="reject-button">Reject</button>
      </div>
    </div>
  </template>

  <div id="friend-requests-list"></div>

</div>

<script src="request.js">
  
</script>

</body>
</html>
