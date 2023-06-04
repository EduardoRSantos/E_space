<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='assets/css/style.css'>
    <style>
        <?php include '../css/footer.css';?>
        <?php include '../css/ionicons.min.css';?>
    </style>

</head>
<body>
    <aside>
        <img src="assets/imgs/Icon ionic-ios-chatboxes.png" alt="Chat" title="Chat"/>

        <form id="form1">
            <input type="text" placeholder="Digite seu nome..." name="name" id="name" />
            <input type="text" placeholder="Digite sua mensagem..." name="message" id="message" />
        </form>

        <button id="btn1">Enviar</button>
    </aside>

    <section id="content">
        
    </section>

    <?php include '../footer.php'; ?>
    <script src='assets/js/script.js'></script>
    
</body>
</html>