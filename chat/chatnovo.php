<!DOCTYPE html>
<html lang="pt">
  <?php 
  session_start();

  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../chat/styles/style.css">
      <style>
      <?php include '../css/navbar.css'; ?>
           <?php include '../css/footer.css';?>
    </style>
</head>
<body>
  
        <br><br>
        <br><br>
<?php include '../navbar.php'; ?>
<h2 class="wrapper" >Chat</h2>
<div class="chat-container wrapper">
    <div class="profile-window">
      <div class="profile" onclick="loadChat('perfil1')">
      <img class="avatar" style="border-radius: 50%;"  src=".<?= $data[0]['path'] ?>" alt=""  width="50" height="50">
      <span><strong class="name" ><?= $_SESSION['nome'] ?></strong></span> 
      </div>
      <hr>
      <div class="profile" onclick="loadChat('perfil2')">
      <img class="avatar" style="border-radius: 50%;"  src=".<?= $data[0]['path'] ?>" alt=""  width="50" height="50">
      <span><strong class="name" ><?= $_SESSION['nome'] ?></strong></span> 
      </div>
      <hr>
      <div class="profile" onclick="loadChat('perfil3')">
      <img class="avatar" style="border-radius: 50%;"  src=".<?= $data[0]['path'] ?>" alt=""  width="50" height="50">
      <span><strong class="name" ><?= $_SESSION['nome'] ?></strong></span> 
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

  // Adicionar campo de texto e botão de envio
  conversationWindow.innerHTML += '<div class="input-container"><input type="text" id="message-input" placeholder="Digite sua mensagem"><button onclick="sendMessage()">Enviar</button></div>';
}
  </script>
</body>
</html>
