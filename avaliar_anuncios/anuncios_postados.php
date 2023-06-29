<!DOCTYPE html>
<html lang="pt-br">
  <?php session_start() ?>

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico" />
    <title>Avaliar Anúncio</title>
    <link rel="stylesheet" href="../pages/modal/modal_carousel.css" />
    <link rel="stylesheet" href="../style/style.css" />
    

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <style>
      <?php include '../css/navbar.css'; ?>
      <?php include '../css/footer.css'; ?>
      <?php include '../css/ionicons.min.css'; ?>
    </style>
  </head>

  <body>
    <header>
      <?php include '../navbar.php'; ?>
    </header>

    <section class="conteudoan-section wrapper">
      <h class="titulo">Anúncios Postados - Painel Administrativo</h>
      <div class="text-avaliar wrapper">
        <p>Compartilhe sua experiência e avalie os anúncios de espaços para eventos para ajudar a melhorar a qualidade e satisfação dos nossos clientes.</p>
        </div>

  <?php
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
      $imagens = explode(';', $anuncio['imagens']);
  ?>
  
 
        
<div class="anuncios wrapper" >
<section class="rental-section">
  <div class="rental-container">
    <div data-aos="zoom-out-right" target="_blank" class="rental-ad">
      <?php $img = explode(';', $anuncio['imagens']); ?>
      <img src=".<?= $img[0] ?>" alt="Cinque Terre" width="800" height="600">
    </div>
    <div  data-aos="fade-up-right" class="rental-details">
      <h2 class="limite-chars-title" ><?= $anuncio['titulo'] ?></h2>
      <button class="capacity-button">
  <span class="capacity-icon"><img src="../img/pessoas.png" alt="" srcset=""><?= $anuncio['quantidade_pessoas'] ?></span>
</button>
      <!-- <p class="limite-chars" ><?= $anuncio['descricao'] ?></p> -->
      <div data-aos="fade-up-right" class="rental-price">
          <div class="localizacao d-flex w-100" >
          <img  src="../img/localizacao.png" alt="" srcset="">
          <p ><?= $anuncio['localizacao'] ?></p>
          </div>
          <div class="dinheiro d-flex w-100" >
            <img width="50px" src="../img/dinheiro.png" alt="">
            <p ><?= $anuncio['preco'] ?></p>
          </div>
        <div  class="rental-buttons">
        <button type="button" class="btn btn-lixeira" data-toggle="modal" data-target="#modalNegar<?= $anuncio['id'] ?>"></button>
          <button type="button" class="button-with-image" data-toggle="modal" data-target="#modal<?= $anuncio['id'] ?>"></button>
          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalFotos<?= $anuncio['id'] ?>">Imagens</button>
          <button type="button" class="btn btn-outline-mais" data-toggle="modal" data-target="#modalInfo<?= $anuncio['id'] ?>"></button>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<div class="modal fade anuncio-modal" id="modal<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-white">
      <div class="modal-header">
        <h4 class="modal-title">Deseja começar a conversar no WhatsApp?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="conversar.php">
          <input type="hidden" name="telefone" id="telefone" value="<?= $anuncio['telefone'] ?>">
          <img width="35" height="35" src="../img/whatsapp.png" alt="" srcset="" class="animated-image">
          <button type="submit" class="btn btn-success"> Abrir conversa</button>
        </form>
      </div>
    </div>
  </div>
</div>





    <div   class="modal fade anuncio-modal" id="modalInfo<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
          <!-- <div class=".header-modal">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <div  class="body-modal bg-dark">
         
            <h4 class="anunciante" > <img src="./img/do-utilizador.png" alt="" srcset=""><strong> ANUNCIANTE: </strong> <?= $anuncio ['nome'] ?></h4>
            <br>
            <h3 class="limite-chars-title-modal"><?= $anuncio['titulo'] ?></h3>
            <h4>Publicado: <?= $anuncio['criado_em'] ?></h4>
            <hr>
            <h4 class="limite-chars-modal" >Descrição <br> <?= $anuncio['descricao'] ?></h4>
            <span class="capacity-icon"><img src="../img/pessoas.png" alt="" srcset=""><?= $anuncio['quantidade_pessoas'] ?></span>
            <br>
            <br>
            <h4><strong>Telefone</strong> <br> <?= $anuncio['telefone'] ?></h4>
            <h4><strong>Cep</strong> <br> <?= $anuncio['cep'] ?></h4>
            
          </div>
          <div class="footer-modal">
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade galeria-anuncios" id="modalFotos<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="slide-modal">
          <div class="body">
            <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                <?php 
                $imagens = explode(';', $anuncio['imagens']);
                foreach ($imagens as $imagem) : 
                ?>
                  <img class='img-size' src='.<?= $imagem ?>' alt='Second slide' />
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- excluir -->
      <div class="modal fade" id="modalNegar<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title modal-title" id="exampleModalLongTitle"><strong>Anunciante</strong><?= $anuncio['nome'] ?></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Certeza que deseja excluir o anúncio ?</h4>
            </div>
            <div class="modal-footer">
              <form method="post" action="deletar_anuncio">
                <input type="hidden" value="delete" name="avaliacao">
                <input type="hidden" value="<?= $anuncio['id'] ?>" name="id">
                <button type="submit" class="btn btn-danger">Excluir</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      

  <?php endforeach;
  } ?>

<?php include '../footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>


</html>