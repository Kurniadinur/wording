
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/botstyle.css">
    <script  src="js/jquery.js"></script>
	<script  src="js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Floating chat toggle button -->
    <button class="chat-toggle-button" onclick="toggleChatbox()">💬</button>

    <!-- Chatbox -->
    <div class="chatbox" id="chatbox">
        <div class="chatbox-header">
            Chatbot
            <span onclick="toggleChatbox()" style="cursor: pointer;">&#10005;</span> <!-- Close icon -->
        </div>
        <div class="chatbox-messages" id="chat">
            <!-- Chat messages will appear here -->
        </div>
        <div class="input-area">
            <input type="text" id="userMessage" placeholder="Type a message..." onkeypress="checkEnter(event)">
            <button onclick="sendMessage()">&#9658; </button> <!-- Send icon -->
        </div>
    </div>

    <script>
        // Function to toggle chatbox visibility
        function toggleChatbox() {
            const chatbox = document.getElementById('chatbox');
            const chatToggleButton = document.querySelector('.chat-toggle-button');
            if (chatbox.style.display === 'none' || chatbox.style.display === '') {
                chatbox.style.display = 'flex';  // Show the chatbox
                chatToggleButton.style.display = 'none';  // Hide the toggle button
            } else {
                chatbox.style.display = 'none';  // Hide the chatbox
                chatToggleButton.style.display = 'block';  // Show the toggle button
            }
        }

        // Function to send the message
        
        function sendMessage() {
            const userMessage = document.getElementById('userMessage').value;
            if (userMessage.trim() !== "") {
                addMessage(userMessage, 'user');
                fetchResponse(userMessage);
                document.getElementById('userMessage').value = "";
            }
        }
        function checkEnter(event) {
            if (event.key === 'Enter') {
                sendMessage();  // Send message when Enter key is pressed
            }
        }

        // Function to display messages in chatbox
        function addMessage(message, sender) {
            const chat = document.getElementById('chat');
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', sender);
            const bubbleElement = document.createElement('div');
            bubbleElement.classList.add('bubble');
            bubbleElement.textContent = message;
            messageElement.appendChild(bubbleElement);
            chat.appendChild(messageElement);
            chat.scrollTop = chat.scrollHeight;
        }

        // Fetch bot response from PHP backend
        function fetchResponse(userMessage) {
            fetch('chatbot.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'message=' + encodeURIComponent(userMessage)
            })
            .then(response => response.text())
            .then(data => addMessage(data, 'bot'))
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>