<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='assets/css/style.css'>
    <style>
        <?php include '../css/footer.css';?>
        <?php include '../css/ionicons.min.css';?>
    </style>

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

    <?php include '../footer.php'; ?>
    <script src='assets/js/script.js'></script>
    
</body>
</html>