<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-space</title>
  <link rel="stylesheet" href="./pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/footer.css">
</head>

<body>
<div id="chat-container">
    <div class="chat-box">
      <div class="chat-header">
        <img src="../img/casa2.png" alt="Usuário 1" class="user-avatar">
        <h2>Usuário 1</h2>
      </div>
      <div class="chat-messages">
        <!-- Aqui serão exibidas as mensagens do chat -->
        <div class="message user1">
            <div>
              <img src="../img/casa2.png" alt="Usuário 1" class="user-avatar">
            <span class="sender">Joabe</span>
            <span class="timestamp">10:00 AM</span>
            <p>Olá! Como você está?</p>
          </div>
        </div>
        <div class="message user2">
            <div>
              <img src="../img/casa2.png" alt="Usuário 2" class="user-avatar">
            <span class="sender">Wesly</span>
            <span class="timestamp">10:05 AM</span>
            <p>Estou bem, obrigado! E você?</p>
          </div>
        </div>
        <!-- Mais mensagens -->
      </div>
      <div class="chat-input">
        <input type="text" placeholder="Digite sua mensagem">
        <input type="submit" value="Enviar">
      </div>
    </div>
  </div>
</body>

</html>