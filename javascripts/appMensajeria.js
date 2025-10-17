document.addEventListener("DOMContentLoaded", () => {
  const widget = document.createElement("div");
  widget.id = "chat-widget";
  widget.className = "chat-widget minimized";
  widget.innerHTML = `
    <div class="chat-header" onclick="toggleChat()"> Chat </div>
    <div id="chat-body" class="chat-body hidden">
      <div id="chat-messages" class="chat-messages"></div>
      <div class="chat-input-container">
        <input id="chat-input" type="text" placeholder="Escribe un mensaje">
        <button onclick="enviar()">Enviar</button>
      </div>
    </div>
  `;
  document.body.appendChild(widget);
});

let isExpanded = false;
let idChat = 1; // 🔹 Chat actual (se puede pasar dinámicamente desde PHP)
let idUser = 1; // 🔹 Usuario actual (igual)
let eventSource;

function toggleChat() {
  const widget = document.getElementById("chat-widget");
  const body = document.getElementById("chat-body");
  widget.classList.toggle("expanded");
  widget.classList.toggle("minimized");
  body.classList.remove("hidden");

  if (!eventSource) iniciarSSE();
  isExpanded = !isExpanded;
}

function iniciarSSE() {
  eventSource = new EventSource(`../apis/apiStream.php?idchat=${idChat}`);
  eventSource.onmessage = (event) => {
    const data = JSON.parse(event.data);
    data.forEach(msg => {
      mostrarMensaje(msg.contenido, msg.username);
    });
  };
}

async function enviar() {
  const input = document.getElementById("chat-input");
  const texto = input.value.trim();
  if (!texto) return;

  await fetch("../apis/apiEnviarMensaje.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      idchat: idChat,
      emisor: idUser,
      texto
    })
  });

  mostrarMensaje(texto, "Tú");
  input.value = "";
}

function mostrarMensaje(texto, emisor) {
  const chat = document.getElementById("chat-messages");
  const div = document.createElement("div");
  div.className = emisor === "Tú" ? "msg self" : "msg other";
  div.textContent = `${emisor}: ${texto}`;
  chat.appendChild(div);
  chat.scrollTop = chat.scrollHeight;
}