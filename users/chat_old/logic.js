
// chat section
const messageBox = document.querySelector('.chat-box');
const messageInput = document.querySelector('.chat-form input[type="text"]');
const sendButton = document.querySelector('.chat-form button');

// Send message on form submission
document.querySelector('.chat-form').addEventListener('submit', (event) => {
  event.preventDefault();
  const message = messageInput.value.trim();
  if (message !== '') {
    addMessage('sent', message);
    // Code to send message to server or other user
    messageInput.value = '';
  }
});

// Function to add message to message box
function addMessage(type, text) {
  const message = document.createElement('div');
  message.classList.add('message', type);
  message.innerHTML = `<p>${text}</p>`;
  messageBox.appendChild(message);
  messageBox.scrollTop = messageBox.scrollHeight;
}

// Function to receive message from server or other user
function receiveMessage(text) {
  addMessage('received', text);
}

// Example usage
receiveMessage('Hello there!');
sendButton.click(); // Sends message "Hi!" if input is not empty
