

<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/imagens.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <title>Inserir Anúncio</title>
    <style>
        <?php include '../css/mais_informacoes.css'; ?>
        <?php include '../css/navbar.css'; ?>
        <?php include '../css/footer.css';?>
        <?php include '../css/ionicons.min.css';?>
    </style>
</head>

<body>
    <?php include '../navbar.php'; ?>
    <section class="estrutura_da_tela ">
        <h2 class="titulo wrapper">Informações de anuncios</h2>
        <br>
        <form class="form wrapper" method="POST" enctype="multipart/form-data">
            <div class="campotexto-title">
                <h5>Villa dos Sonhos</h5>
                <p>Publicado em 16/05 às 19:31
            </p>
            </div>
            <div class="gallery">
           <div class="main-photo-container">
           <img class="main-photo" src="../img/casa3.jfif" alt="Foto Grande">
            <div class="thumbnails">
        <img class="thumbnail" src="../img/casa3.jfif" alt="Foto Pequena 1">
        <img class="thumbnail" src="../img/casa3.jfif" alt="Foto Pequena 2">
        <img class="thumbnail" src="../img/casa3.jfif" alt="Foto Pequena 3">
           </div>
          </div>
          </div>
          <div class="botao-seguro row d-flex p-3 ">
            <button class="btn-outline m-1"><img src="" alt="" sizes="" srcset="">compra segura</button>
        
           </div>
            <div class="campotexto">
               <h3>R$: 540,00</h3>
            </div>
            <div class="campotexto-descricao">
              <details  >A Villa dos Sonhos é uma elegante mansão colonial, cercada por jardins exuberantes e uma piscina deslumbrante. Com espaçosos salões de festas, um terraço coberto e um gazebo ao ar livre, é o local perfeito para casamentos, festas de aniversário e eventos corporativos de prestígio</details>
            </div>
           <div class="botao-anuncio p-3 ">
            <button class="btn-outline m-1"><img src="../img/favorito.png" alt="" sizes="" srcset="">Favoritos</button>
            <button class="btn-outline m-1"><img src="../img/compartilhar.png" alt="" sizes="" srcset="">Compartilhar</button>
           </div>
           <hr>

           <!-- DETALHES -->
            <div class="campotexto-detalhes">
           <h2>Detalhes</h2>
           <div class="campotexto">
              <p>Pessoas</p>
            <label for="quantidadedepessoas"></Label>
            </div>
            </div>
            <hr>
            <!-- LOCALIZAÇÃO -->
            <div class="campotexto-localizacao">
            <h2>Localização</h2>
                <div class="campotexto">
                    <p>Cep</p>
                    <label for="cep"></Label>
                </div>
                <div class="campotexto">
                   <p>Nº</p>
                    <label for="numero"></Label>
                </div>
                <div class="campotexto">
                   <p>Bairro</p>
                    <label for="numero"></Label>
                </div>
        </form>
    </section>


    <br><br>
        <br><br>
    <?php include '../footer.php'; ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/mascaras.js"></script>
    <script src="../js/js.js"></script>
</body>

</html>