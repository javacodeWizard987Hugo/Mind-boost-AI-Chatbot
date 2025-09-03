// Initialize speech recognition
const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
recognition.lang = 'en-US';
recognition.interimResults = false;

// Start speech recognition on mic button click
document.getElementById('mic-btn').addEventListener('click', () => {
    recognition.start();
});

// Populate input with recognized voice
recognition.onresult = (event) => {
    const transcript = event.results[0][0].transcript;
    document.getElementById('user-input').value = transcript;
};

// Speak text using TTS
function speakText(text) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'en-US';
    speechSynthesis.speak(utterance);
}

// Send message on "Send" button click
document.getElementById('send-btn').addEventListener('click', async () => {
    const userInput = document.getElementById('user-input').value.trim();
    if (!userInput) return;

    const messagesContainer = document.querySelector('.messages');

    // Show user's message
    const userMessage = document.createElement('div');
    userMessage.className = 'message user-message';
    userMessage.textContent = userInput;
    messagesContainer.appendChild(userMessage);

    // Clear input
    document.getElementById('user-input').value = '';

    try {
        const response = await fetch('/analyze', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ user_input: userInput })
        });

        const data = await response.json();

        const botMessage = document.createElement('div');
        botMessage.className = 'message bot-message';

        if (response.ok && data.depression_level) {
            botMessage.textContent = data.depression_level;
            speakText(data.depression_level);
        } else {
            const errorText = data.error || 'Sorry, something went wrong.';
            botMessage.textContent = errorText;
            speakText(errorText);
        }

        messagesContainer.appendChild(botMessage);

    } catch (error) {
        const errorText = 'Network error. Please try again.';
        const botMessage = document.createElement('div');
        botMessage.className = 'message bot-message';
        botMessage.textContent = errorText;
        messagesContainer.appendChild(botMessage);
        speakText(errorText);
    }
});
