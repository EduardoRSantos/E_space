<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>Inserir Anúncio</title>
    <style>
        <?php include '../css/style.css';?>
    </style>
</head>
<body>
    <section class="s">
    <h1>Inserir Anúncio</h1>
        <form>
    <div id="divid">
        <input type="file" name="" id="img1" placeholder="O melhor e-mail" required>
        <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>  
        <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
        <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
        <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>     
        <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>      
        <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
        <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
        </div>
    <div class="preco">
        <input type="number" placeholder="Preço R$" name="preco" id="preco" class="inputUser" required>
        <label for="preco"></Label>
    </div>
    <div class="container">
        <input type="text" placeholder="Titulo" name="titulo" id="titulo" class="inputUser" required>
        <label for="titulo"></Label>
    </div>
    <div class="container">
        <input type="text" placeholder="localizacão" name="localizacao" id="localizacao" class="inputUser" required>
        <label for="localizacao"></Label>
    </div>
    <div class="cep">
        <input type="number" placeholder="cep" name="cep" id="cep" class="inputUser" required>
        <label for="cep"></Label>
    </div>
    <div class="tel">
        <input type="number" placeholder="Número" name="number" id="numero" class="inputUser" required>
        <label for="numero"></Label>
    </div>
    <div class="info">
        <input type="text" placeholder="info" name="info" id="info" class="inputUser" required>
        <label for="info"></Label>
    </div>
    <input type="submit" name="submit" id="buttonanuncio" value="Anunciar">
    </form>
    </section>
    <section>
    
    </section>
</body>

</html>