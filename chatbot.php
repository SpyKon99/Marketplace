<button type="button" class="btn btn-primary open-button rounded-circle" onclick="openForm()"><i class="bi bi-chat"></i> Chatbot</button>
<div class="chat-popup bg-info" id="myForm">
  <div id="ccontainer" class="ccontainer">
    <img src="https://cdn.pixabay.com/photo/2020/01/02/16/38/chatbot-4736275_960_720.png" height="400vh" alt="Chatbot clipart">
    <div id="chat" class="chat">
      <div id="messages" class="messages"></div>
      <input id="input" type="text" placeholder="Write something..." autocomplete="off" autofocus="true" />
      <button type="button" class="btn cancel btn-danger" onclick="closeForm()">Close</button>

    </div>
  </div>
  
</div>


<style>
    #myForm {
        width: 50%;
    }
    .cancel {
    margin-top: 20px;
    width: 20%;
    }
    .open-button {
    padding: 16px 20px;
    position: fixed;
    bottom: 23px;
    right: 28px;
    z-index: 1;
    }
    .chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 20;
    }


    .ccontainer {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .chat {
        height: 300px;
        width: 50vw;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    } 

    ::-webkit-input-placeholder { 
        color: .711 
    }
    
    input { 
        border: 0; 
        padding: 15px; 
        width: 90%;
        border-radius: 10px; 
    }

    .messages {
        display: flex;
        flex-direction: column;
        overflow-y: scroll;
        height: 90%;
        width: 90%;
        background-color: white;
        padding: 15px;
        margin: 15px;
        border-radius: 10px;
    }

    #bot {
        margin-right: auto;
    }

    #user {
        margin-left: auto;
    }


    .bot {
        font-family: Consolas, 'Courier New', Menlo, source-code-pro, Monaco,  
        monospace;
    }

    .avatar {
        height: 25px;
    }

    .response {
        display: flex;
        align-items: center;
        margin: 1%;
    }


    /* Mobile */

    @media only screen and (max-width: 980px) {
    .ccontainer {
            flex-direction: column; 
            justify-content: flex-start;
        }
        .chat {
            width: 75vw;
            margin: 10vw;
        }
    }
</style>

<script>
  function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
// input options
const utterances = [
  ["hi", "hey", "hello", "good morning", "good afternoon"],
  ["how can i contact with you"],
  ["where are the tech items", "where can i find the items", "where are the items"],
  ["where is the store", "where is the shop"],
  ["which shops you cooperate with","with which shops you cooperate"],
  ["i cant find my favorite items", "where can i find my favorite items"],
  ["where can i find my personal data", "where can i edit my personal data","where can i see my transactions history"]
];

// Possible responses corresponding to triggers
// const teck = window.location.href = "http://localhost/Marketplace/teck.php ";

const answers = [
  [
    "Hello! How can i help you?", "Hi! How can i help you?", "Hey! How can i help you?", "Hi there! How can i help you?", "Howdy! How can i help you?"
  ],
  [
    "you can send us an email at unipi@unipi.gr or you can call us at 210 4142000"
  ],
  [
    "in the following link: http://localhost/Marketplace/teck.php"
  ],
  [
    "you can find us in the following link: http://localhost/Marketplace/aboutus.php"
  ],
  [
    "you can find them in the following link: http://localhost/Marketplace/stores.php"
  ],
  [
  "you have to login and then you can find them in the following link: http://localhost/Marketplace/favorites.php"
  ],
  [
  "you can find them in the following link: http://localhost/Marketplace/profil.php"
  ],
];


const alternatives = [
  "Go on...",
  "Try again",
];
const inputField = document.getElementById("input");
inputField.addEventListener("keydown", (e) => {
  if (e.code === "Enter") {
    let input = inputField.value;
    inputField.value = "";
    output(input);
  }
});

function output(input) {
  let product;
  let text = input.toLowerCase().replace(/[^\w\s\d]/gi, "");
  text = text
    .replace(/ a /g, " ")
    .replace(/whats/g, "what is")
    .replace(/please /g, "")
    .replace(/ please/g, "")
    .replace(/r u/g, "are you");

  if (compare(utterances, answers, text)) {
    // Search for exact match in triggers
    product = compare(utterances, answers, text);
  } 
  else {
    product = alternatives[Math.floor(Math.random() * alternatives.length)];
  }

  addChatEntry(input, product);
}

function compare(utterancesArray, answersArray, string) {
  let reply;
  let replyFound = false;
  for (let x = 0; x < utterancesArray.length; x++) {
    for (let y = 0; y < utterancesArray[x].length; y++) {
      if (utterancesArray[x][y] === string) {
        let replies = answersArray[x];
        reply = replies[Math.floor(Math.random() * replies.length)];
        replyFound = true;
        break;
      }
    }
    if (replyFound) {
      break;
    }
  }
  return reply;
}

function addChatEntry(input, product) {
  const messagesContainer = document.getElementById("messages");
  let userDiv = document.createElement("div");
  userDiv.id = "user";
  userDiv.className = "user response";
  userDiv.innerHTML = `<span>${input}</span>`;
  messagesContainer.appendChild(userDiv);

  let botDiv = document.createElement("div");
  let botText = document.createElement("span");
  botDiv.id = "bot";
  botDiv.className = "bot response";
  botText.innerText = "Typing...";
  botDiv.appendChild(botText);
  messagesContainer.appendChild(botDiv);

  messagesContainer.scrollTop =
    messagesContainer.scrollHeight - messagesContainer.clientHeight;

  setTimeout(() => {
    botText.innerText = `${product}`;
  }, 2000);
}

</script>

