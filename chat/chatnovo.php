<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../chat/styles/style.css">
      <style>
      <?php include '../css/navbar.css'; ?>
           <?php include '../css/footer.css';?>
    </style>
</head>
<body>
<?php include '../navbar.php'; ?>
  <div class="chat-container wrapper">
    <div class="profile-window">
      <div class="profile" onclick="loadChat('perfil1')">
        <img class="avatar" src="../img/perfil.png" alt="Avatar">
        <span class="name">Nome do Perfil 1-</span>
      </div>
      <hr>
      <div class="profile" onclick="loadChat('perfil2')">
        <img class="avatar" src="../img/perfil.png" alt="Avatar">
        <span class="name">Nome do Perfil 2</span>
      </div>
      <hr>
      <div class="profile" onclick="loadChat('perfil3')">
        <img class="avatar" src="../img/perfil.png" alt="Avatar">
        <span class="name">Nome do Perfil 3</span>
      </div>
      <hr>
    </div>
    <div class="conversation-window" id="conversation-window">
      <!-- Mensagens da conversa serão adicionadas aqui dinamicamente -->
    </div>
  </div>

  <script>
    function loadChat(profileName) {
      // Lógica para carregar o chat correspondente ao perfil selecionado
      var conversationWindow = document.getElementById('conversation-window');
      conversationWindow.innerHTML = ''; // Limpa as mensagens atuais

      // Adicione aqui a lógica para carregar as mensagens do chat correspondente ao perfil selecionado

      // Exemplo de adição de mensagens
      conversationWindow.innerHTML += '<div class="message sender">Olá! Como você está?</div>';
      conversationWindow.innerHTML += '<div class="message">Oi! Estou bem, obrigado. E você?</div>';
      conversationWindow.innerHTML += '<div class="message sender">Também estou bem, obrigado!</div>';
    }
  </script>
</body>
</html>
