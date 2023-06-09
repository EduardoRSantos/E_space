<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-space</title>
  <link rel="shortcut icon" type="image/jpg" href="./img/logo-ConversImagem.ico"/>
  <link rel="stylesheet" href="./pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://unpkg.com/scrollreveal@4.0.7/dist/scrollreveal.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



</head>

<body>

  <header>
    <div class="pos-f-t-mobile">
      <div class="collapse" id="navbarToggleExternalContent">

        <div class="mobile-button  bg-white p-4">
          <button class=""><a class="text-light" href="../E_space/avaliar_anuncios/anuncios_avaliar.php">Avaliar anuncios</a></button>
          <button class=""><a class="text-white" href="../E_space/pages/inserir_anuncio.php">Meus anuncios</a></button>
          <button class=""><a class="text-white" href="../E_space/pages/tela_meus_anuncios.php">Inserir anuncio</a></button>
          <button class=""><a class="text-white" href="../E_space/pages/tela_de_perfil.php">Perfil</a></button>



        </div>
      </div>
      <nav class="navbar navbar-light bg-white">
        <form class="searchbarmobile" method="post">
          <div class="pesquisar">
            <input type="search" name="pesquisar" id="" size="50" placeholder="Realizar Pesquisa" required />
            <button class="botaopequisar" type="submit"><img class="lupa" src="./img/lupa.png" alt="" srcset=""></button>
          </div>
        </form>
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
        <a href="../E_space/"><img src="./img/logo.png" alt="Logo" /></a>
      </div>
      <form class="searchbar" method="post">
        <div class="pesquisar">
          <input type="search" name="pesquisar" id="pesquisar" size="50" placeholder="Realizar Pesquisa" required />
          <button class="botaopequisar" type="submit"><img class="lupa" src="./img/lupa.png" alt="" srcset=""></button>
        </div>
      </form>
      <ul class="menu">
        <?php if (!empty($_SESSION['tipo_conta']) && $_SESSION['tipo_conta'] == 'adm') { ?>
          <li class=""><a title="Avaliar" href="../E_space/avaliar_anuncios/anuncios_avaliar"><img width="30" src="./img/avaliacao.png" alt=""></a></li>
        <?php } ?>

        <li class=""><a title="Inserir Anuncio" href="../E_space/pages/anuncio"><img width="30" src="./img/inserir.png" alt=""></a></li>
        <li class=""><a title="Meus Anuncios" href="../E_space/pages/anuncios"><img width="30" src="./img/anuncio.png" alt=""></a></li>
        <li class=""><a title="Perfil" href="../E_space/pages/perfil"><img width="30" src="./img/perfil.png" alt=""></a></li>
        <?php if (empty($_SESSION)) { ?>
          <li class="cadastro"><a title="Login" href="../E_space/pages/login">Fazer Login </a></li>
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
    <div class="main-espace">
      <section class="conteudo wrapper">



        <div class="imagem">
          <img src="./img/arte1.png" alt="Descrição da imagem">
        </div>
        <div class="texto">
          <div class="chat">
            <div class="chat-header">
              <?php if (!empty($_SESSION)) { ?>
                <?php if (empty($data[0]['path'])) {  ?>
                    <img class="foto-perfil" style="border-radius: 50%;" src="./img/perfil.png" alt="" width="35" height="35">
                <?php } else { ?>
                    <img class="foto-perfil" style="border-radius: 50%;" src="<?= $data[0]['path'] ?>" alt="" width="35" height="35">
                <?php } ?>
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
              <input type="text" id="mensagem-input" placeholder="Digite sua mensagem...">
              <button>Enviar</button>
            </div>
            <button type="button" class="share-button">Compartilhar nas redes sociais</button>
          </div>

          

          <!-- Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Como você está?</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <img width="450px" height="450px" style="width: 100%; " src="./img/qr.png" id="qrcode-img">
                </div>
              </div>
            </div>
          </div>

      </section>
    </div>

    <section class="campo-itens wrapper">
      <div class="button-container">
        <button class="principal"><a class="" href="" target="_blank" rel="noopener noreferrer"></a></button>
  
      </div>
    </section>

    <!-- DESKTOP -->

    <!-- MOBILE -->
    <!-- <section class="campo-itens-mobile">
      <div class="button-container wrapper">
        <button class="principal"> Informações adicionais</button>
        <button>Tour virtual</button>
        <button>Redes Sociais</button>
      </div>
    </section> -->


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
            <div data-aos="zoom-in" class="box">
              <img src="<?= $img[0] ?>" alt="Imagem do anúncio">
              <h2 class="limite-destaques"><?= $anuncio['titulo'] ?></h2>
              <div class="rental-details">
                <div class="dinheiro d-flex w-100 ">
                  <img style="width: 30px; height: 30px; margin-left: 15px; object-fit: cover;" src="./img/dinheiro.png" alt="">
                  <p><?= $anuncio['preco'] ?></p>
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
                <div class="dinheiro d-flex w-100 ">
                  <img style="width: 30px; height: 30px; margin-left: 15px; object-fit: cover;" src="./img/dinheiro.png" alt="">
                  <p><?= $anuncio['preco'] ?></p>
                </div>
              </div>
            </div>
        <?php
          endforeach;
        }
        ?>
      </div>
    </section>

    <div class="anuncios wrapper">
      <div class="anuncios-recentes">
        <h3 id="resultado-pesquisa" class="text-recentes">Anúncios Recentes</h3>
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
        ?>
            <script type="text/javascript">
              // Obtém uma referência ao elemento com o ID "resultado-pesquisa"
              var elementoResultado = document.getElementById("resultado-pesquisa");

              // Rola a tela até o elemento do resultado da pesquisa
              elementoResultado.scrollIntoView({
                behavior: 'smooth'
              });
            </script>
        <?php
          } else {
            echo "Anuncio não encontrado"; ?>
            <script type="text/javascript">
              // Obtém uma referência ao elemento com o ID "resultado-pesquisa"
              var elementoResultado = document.getElementById("resultado-pesquisa");

              // Rola a tela até o elemento do resultado da pesquisa
              elementoResultado.scrollIntoView({
                behavior: 'smooth'
              });
            </script>
        <?php  }
        }

        ?>

      </div>
    </div>

  </main>


  <br><br>
  <br><br>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-left">
        <p>© 2023 E-space, Inc.</p>
        <p><a id="privacidade" href="../E_space/pages/privacidade">Privacidade</a><span> | </span><a href="../E_space/pages/mapa_do_site">Mapa do site</a><span> | </span><a href="../E_space/pages/informacoes_do_sistema">Informações da empresa</a></p>
      </div>
    </div>
    <div class="footer-buttons">
      <ul>
        <?php if (!empty($_SESSION['tipo_conta']) && $_SESSION['tipo_conta'] == 'adm') { ?>
          <li><a href="../E_space/avaliar_anuncios/anuncios_avaliar"><img width="30" src="./img/avaliacao.png" alt="Avaliar"></a></li>
        <?php } ?>

        <li><a href="../E_space/pages/anuncio"><img width="30" src="./img/inserir.png" alt=""></a></li>
        <li><a href="../E_space/pages/anuncios"><img width="30" src="./img/anuncio.png" alt=""></a></li>
        <li><a href="../E_space/pages/perfil"><img width="30" src="./img/perfil.png" alt=""></a></li>
        <?php if (empty($_SESSION)) { ?>
          <li class="cadastro"><a href="../E_space/pages/login">Fazer Login </a></li>
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
      <div class="btn-group dropup">
  <button type="button" class="btn bg-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  </button>
  <ul class="dropdown-menu" style="background-color: white;">
    <li><a class="dropdown-item" href="./pages/privacidade">Privacidade</a></li>
    <li><a class="dropdown-item" href="./pages/mapa_do_site">Mapa do site</a></li>
    <li><a class="dropdown-item" href="./pages/informacoes_do_sistema">Informações da empresa</a></li>
  </ul>
</div>

      </ul>
    </div>
  </footer>








  <!-- MODAL QR CODE -->
  <!-- Inclua os arquivos JavaScript do Bootstrap e qrcode.js -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const input = document.getElementById('mensagem-input');
      const modal = new bootstrap.Modal(document.getElementById('myModal'));
      const qrCodeImg = document.getElementById('qrcode-img');

      input.addEventListener('keyup', function(event) {
        if (event.target.value.toLowerCase() === 'e-space') {
          const qrCode = new QRCode(qrCodeImg, {
            text: 'https://example.com', // Substitua pelo conteúdo desejado
            width: 200,
            height: 200
          });
          modal.show();
        }
      });
    });
  </script>
  <!-- MODAL QR CODE -->


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="./js/js.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>