<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-space</title>
  <link rel="stylesheet" href="./pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
  <header>
  <div class="pos-f-t-mobile">
  <div class="collapse" id="navbarToggleExternalContent">

    <div class="mobile-button  bg-white p-4">
      <button class=""><a class="text-light" href="../E_space/avaliar_anuncios/anuncios_avaliar.php">Avaliar anuncios</a></button>
      <button class=""><a  class="text-white" href="../E_space/pages/inserir_anuncio.php">Meus anuncios</a></button>
      <button class=""><a class="text-white" href="../E_space/pages/tela_meus_anuncios.php">Inserir anuncio</a></button>
      <button class=""><a  class="text-white" href="../E_space/pages/tela_de_perfil.php">Perfil</a></button>

      <form class="searchbarmobile" method="post">
      <div class="pesquisar">
        <input type="search" name="pesquisar" id="" size="50" placeholder="Realizar Pesquisa" required />
        <button class="botaopequisar" type="submit"><img  class="lupa" src="./img/lupa.png" alt="" srcset=""></button>
      </div>
    </form>

    </div>
  </div>
  <nav class="navbar navbar-light bg-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="logo">
        <a href="../E_space/index.php"><img src="./img/logo.png" alt="Logo" /></a>
      </div>
  </nav>
</div>
 

    <!-- <form class="searchbarmobile" method="post">
      <div class="pesquisar">
        <input type="search" name="pesquisar" id="" size="50" placeholder="Realizar Pesquisa" required />
        <button class="botaopequisar" type="submit"><img class="lupa" src="./img/lupa.png" alt="" srcset=""></button>
      </div>
    </form> -->  


    <nav class="navbarheader">
      <div class="logo">
        <a href="../E_space/index.php"><img src="./img/logo.png" alt="Logo" /></a>
      </div>
      <form class="searchbar" method="post">
        <div class="pesquisar">
          <input type="search" name="pesquisar" id="" size="50" placeholder="Realizar Pesquisa" required />
          <button class="botaopequisar" type="submit"><img class="lupa" src="./img/lupa.png" alt="" srcset=""></button>
        </div>
      </form>
      <ul class="menu">
        <?php if (!empty($_SESSION['tipo_conta']) && $_SESSION['tipo_conta'] == 'adm') { ?>
          <li class=""><a href="../E_space/avaliar_anuncios/anuncios_avaliar.php"><img width="30" src="./img/avaliacao.png" alt="Avaliar"></a></li>
        <?php } ?>

        <li class=""><a href="../E_space/pages/inserir_anuncio.php"><img width="30" src="./img/inserir.png" alt=""></a></li>
        <li class=""><a href="../E_space/pages/tela_meus_anuncios.php"><img width="30" src="./img/anuncio.png" alt=""></a></li>
        <li class=""><a href="../E_space/pages/tela_de_perfil.php"><img width="30" src="./img/perfil.png" alt=""></a></li>
        <?php if (empty($_SESSION)) { ?>
          <li class="cadastro"><a href="../E_space/pages/tela_de_login.php">Fazer Login </a></li>
        <?php } ?>



        <?php
        if (!empty($_SESSION)) {
          $id = $_SESSION['id'];

          $body = [
            'id' => $id,
          ];

          
          $json = json_encode($body, true);

          $curl = curl_init();
          curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/E_space/routes/index.php/imagem',
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
              'Content-Type: application/json'
            ]
          ]);

          $response = curl_exec($curl);

          $data = json_decode($response, true);

          curl_close($curl);

          if (!empty($data)) { ?>
            <li><img style="border-radius: 50%;" width="35" height="35" src="<?= $data[0]['path'] ?>" alt=""></li>
        <?php }
        } ?>
      </ul>
    </nav>

    <!-- <form class="searchbarmobile" method="post">
      <div class="pesquisar">
        <input type="search" name="pesquisar" id="" size="50" placeholder="Realizar Pesquisa" required />
        <button class="botaopequisar" type="submit"><img class="lupa" src="./img/lupa.png" alt="" srcset=""></button>
      </div>
    </form> -->

  </header>


  



  <main class="main-home">
  <div class="main-espace" >
    <section class="conteudo wrapper">
 

  
      <div class="imagem">
        <img src="./img/arte1.png" alt="Descrição da imagem">
      </div>
     <div class="texto">
    <div class="chat">
          <div class="chat-header">
            <?php if (!empty($_SESSION)) { ?>
              <span><?= $_SESSION['nome'] ?></span>
            <?php } else { ?>
              <span>E-space</span>
            <?php } ?>
          </div>
          <div class="chat-body">
            <div class="message">
              <p>Já olhou no E-SPACE?</p>
            </div>
            <div class="message">
              <p>Seu espaço está aqui!</p>
            </div>
            <div class="message">
              <p>em Feira de Santana-Ba</p>
            </div>
            <div class="typing-indicator">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="chat-footer">
            <input type="text" placeholder="Digite sua mensagem...">
            <button>Enviar</button>
          </div>
          <button type="button" class="share-button">Compartilhar nas redes sociais</button>
    </div>
     </div>

</section>
</div>
    <!-- DESKTOP -->
    <section class="campo-itens wrapper">
      <div class="button-container">
        <button class="principal"><a class="" href="http://localhost/E_space/pages/informacoes_adicionais.php" target="_blank" rel="noopener noreferrer">informações adicionais</a></button>
        <button>Tour virtual</button>
        <button>Redes Sociais</button>
      </div>
    </section>

    <!-- DESKTOP -->

    <!-- MOBILE -->
    <section class="campo-itens-mobile">
      <div class="button-container wrapper">
        <button class="principal"> informações adicionais</button>
        <button>Tour virtual</button>
        <button>Redes Sociais</button>
      </div>
    </section>


    <?php

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/destaque',
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_RETURNTRANSFER => true,
    ]);

    $response = curl_exec($curl);

    $data = json_decode($response, true);

    curl_close($curl);


    ?>

    <!-- MOBILE -->

    <h3 class="texto-destaque wrapper">Anúncios em Destaque</h3>
    <section class="anuncios-destaque wrapper">

      <div class="container">
        <?php

        if (!empty($data)) {
          foreach ($data as $anuncio) :
            $img = explode(';', $anuncio['imagens']);
        ?>
            <div class="box">
              <img src="<?= $img[0] ?>" alt="Imagem do anúncio">
              <h2 class="limite-destaques"><?= $anuncio['titulo'] ?></h2>
              <div class="rental-details">
              <div class="dinheiro d-flex w-100 " >
                <img style="width: 30px; height: 30px; margin-left: 15px; object-fit: cover;" src="./img/dinheiro.png" alt="">
                <p ><?= $anuncio['preco'] ?></p>
              </div>
              </div>
      
            </div>
        <?php
          endforeach;
        }
        ?>
    </section>

    <section class="anuncios-destaque-mobile wrapper">

      <!-- <h2 class="text-center" >Anúncios em Destaque</h2> -->
      <div class="container wrapper">

        <?php
        if (!empty($data)) {
        foreach ($data as $anuncio) :
          $img = explode(';', $anuncio['imagens']);
        ?>
          <div class="box">
            <img src="<?= $img[0] ?>" alt="Imagem do anúncio">
            <h2 class="limite-chars-box"><?= $anuncio['titulo'] ?></h2>
            <div class="rental-details">
              <div class="dinheiro d-flex w-100 " >
                <img style="width: 30px; height: 30px; margin-left: 15px; object-fit: cover;" src="./img/dinheiro.png" alt="">
                <p ><?= $anuncio['preco'] ?></p>
              </div>
              </div>
          </div>
        <?php
        endforeach; 
      }
        ?>
      </div>
    </section>

    <h3 class=" wrapper text-recentes">Anúncio Recentes</h3>
    <div class="anuncios wrapper">
      <div class="anuncios-recentes">

        <?php
        if (empty($_POST['pesquisar'])) {

          $curl = curl_init();
          curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios',
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
          ]);

          $response = curl_exec($curl);

          $data = json_decode($response, true);

          curl_close($curl);

          if (!empty($data)) {
            foreach ($data as $anuncio) :

              include 'anuncios.php';

            endforeach;
          }
        } else {

          $pesquisar = $_POST['pesquisar'];
          $json = json_encode(['pesquisar' => $pesquisar], true);

          $curl = curl_init();
          curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/pesquisa',
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
              'Content-Type: application/json'
            ]
          ]);

          $response = curl_exec($curl);

          $data = json_decode($response, true);
          $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          curl_close($curl);

          if (!empty($data)) {
            foreach ($data as $anuncio) :

              include 'anuncios.php';

            endforeach;
          } else {
            echo "Anuncio não encontrado";
          }
        }

        ?>

      </div>
    </div>

  </main>

  <footer>
    <div class="container main-footer">
      <div class="footer-logo">
        <img src="./img/arte1.png " alt="Logo da empresa">
      </div>
      <div class="footer-links">
        <h3>Links úteis</h3>
        <ul>
          <li><a href="#">Sobre nós</a></li>
          <li><a href="#">Serviços</a></li>
          <li><a href="#">Contato</a></li>
        </ul>
      </div>
      <div class="footer-social">
        <h3>Redes sociais</h3>
        <ul>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="./js/js.js"></script>

</body>

</html>