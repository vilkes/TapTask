<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['usuario_id'])):
?>
<link rel="stylesheet" href="../css/stylesMensajeria.css">

<div id="chat-widget" class="chat-widget minimized">
  <div class="chat-header" onclick="toggleChat()">Chat</div>
  <div class="chat-container">
    <div id="contact-list" class="contact-list hidden"></div>
    <div id="chat-body" class="chat-body hidden">
      <div id="chat-messages" class="chat-messages"></div>
      <div class="chat-input-container">
        <input id="chat-input" type="text" placeholder="Escribe un mensaje">
        <button class="msg-button" onclick="enviar()">Enviar</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="usuarioId" value="<?= $_SESSION['usuario_id'] ?>">
<script src="../javascripts/appMensajeria.js"></script>
<script src="../javascripts/appValidaciones.js"></script>
<?php endif; ?>