<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='assets/css/style.css'>
</head>
<body>
    <!-- <aside>
        <img src="assets/imgs/Icon ionic-ios-chatboxes.png" alt="Chat" title="Chat"/>

        <form id="form1">
            <input type="text" placeholder="Digite seu nome..." name="name" id="name" />
            <input type="text" placeholder="Digite sua mensagem..." name="message" id="message" />
        </form>

        <button id="btn1">Enviar</button>
    </aside>

    <section id="content">
        
    </section> -->
<div>
    <div class="card">
        <div class="card-header"><h3>Chat Room</h3></div>
            <div class="card-body" id="message_area">

        </div>
    </div>
    <br>
    <form method="post" action="" id="chat_form">

    <div class="input-group mb-3">
        <textarea class="form-control" id="chat_message" name="chat_message" placeholder="Escreva menssagem aqui!" data-parsley-maxlength="1000" data-parsley-pattern="/^[a-zA-Z0-9\s]+$/" required></textarea>
        <div class="input-group-append">
        <button type="submit" name="send" id="send" class="btn btn-primary">Enviar</i></button>
        </div>
    </div>
    <div id="validation_error"></div>
    <input type="hidden" value="<?= $_SESSION['id'] ?>" name="login_user" id="login_user">
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src='assets/js/script.js'></script>
    
</body>
</html>