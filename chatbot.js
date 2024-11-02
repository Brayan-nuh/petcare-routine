const chatBox = document.getElementById("chat-box");
const userInput = document.getElementById("user-input");
const sendButton = document.getElementById("send-button");

sendButton.addEventListener("click", sendMessage);
userInput.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
});

function sendMessage() {
    const message = userInput.value.trim();
    if (message) {
        addMessage("user", message);
        userInput.value = "";
        getBotResponse(message);
    }
}

function addMessage(sender, message) {
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("chat-message", sender);
    messageDiv.textContent = message;
    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to the bottom
}

function getBotResponse(message) {
    let response = "I'm not sure how to respond to that.";
    
    if (message.includes("support")) {
        response = "How can I assist you with customer support?";
    } else if (message.includes("FAQ") || message.includes("questions")) {
        response = "What frequently asked question do you have?";
    } else if (message.includes("book") || message.includes("appointment")) {
        response = "I can help you book an appointment. Please provide the date and time.";
    } else if (message.includes("guide") || message.includes("navigate")) {
        response = "Sure! Let me know what you need help with on the website.";
    }else if(message.includes("hello")||message.includes("greetings")){
        response="Hello!How can i help you?.";
    }else if(message.includes("Thanks")|| message.includes("Thank you")){
        response="You're welcome. If you have any other questions feel free to ask.";
    }else if(message.includes("Bye")){
        response="Goodbye have a great day.";
    }else{
        response="Could you please rephrase that? i'm still learning!";
    }


    setTimeout(() => {
        addMessage("bot", response);
    }, 1000); // Simulate a delay for a more realistic interaction
}
