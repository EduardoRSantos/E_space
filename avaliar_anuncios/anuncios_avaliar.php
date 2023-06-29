<!DOCTYPE html>
<html lang="pt-br">
  <?php session_start() ?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico"/>
  <title>Avaliar Anúncio</title>
  <link rel="stylesheet" href="../pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="../style/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
        <?php include '../css/navbar.css'; ?>
        <?php include '../css/footer.css';?>
        <?php include '../css/ionicons.min.css';?>
    </style>
</head>

<body>
  <header>
<?php include '../navbar.php'; ?>
  </header>


  <?php
  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/avaliar',
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
  
  <section class="conteudoan-section wrapper">
        <h2 class="titulo ">Avaliar Anúncio - Painel Administrativo</h2>
        <div class="text-avaliar wrapper">
        <p>Compartilhe sua experiência e avalie os anúncios de espaços para eventos para ajudar a melhorar a qualidade e satisfação dos nossos clientes.</p>
        </div>
        
        <div class="anuncios wrapper" >
        <section class="rental-section ">
          <div class="rental-container">
            <div data-aos="zoom-out-right" target="_blank" class="rental-ad">
              <?php $img = explode(';', $anuncio['imagens']); ?>
              <a target="_blank" href="img_5terre.jpg">
                    <img src=".<?= $imagens[0] ?>" alt="Cinque Terre"">
                  </a>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $anuncio['id'] ?>">imagens</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAceita<?= $anuncio['id'] ?>">Aceitar</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalNegar<?= $anuncio['id'] ?>">Negar</button>
          </div>
              </div>
            </div>
          </div>
        </section>
        </div>
</section>

      <!-- usuario -->
      <div class="modal fade janela-avaliar" id="modalInfo<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4><?= $anuncio['nome'] ?></h4>
              <h4><?= $anuncio['telefone'] ?></h4>
              <h4><?= $anuncio['descricao'] ?></h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- aceitar -->
      <div class="modal fade" id="modalAceita<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title" id="exampleModalLongTitle"><strong>Anunciante</strong> <?= $anuncio['nome'] ?></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Certeza que deseja aceitar o anúncio ?</h4>
            </div>
            <div class="modal-footer">
              <form method="post">
                <input type="hidden" value="aceitar" name="avaliacao">
                <input type="hidden" value="<?= $anuncio['id'] ?>" name="id">
                <button type="submit" class="btn btn-success">Aceitar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- excluir -->
      <div class="modal fade" id="modalNegar<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title modal-title" id="exampleModalLongTitle"><strong>Anunciante</strong> <?= $anuncio['nome'] ?></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Certeza que deseja negar o anúncio</h4>
            </div>
            <div class="modal-footer">
              <form method="post">
                <input type="hidden" value="delete" name="avaliacao">
                <input type="hidden" value="<?= $anuncio['id'] ?>" name="id">
                <button type="submit" class="btn btn-danger">Deletar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
      </div>

  <?php endforeach;
  } ?>

<?php include '../footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

<?php

if (isset($_POST['id'])) {
  $avaliacao = $_POST['avaliacao'];
  $id = $_POST['id'];

  $body = [
    'id' => $id,
    'avaliacao' => $avaliacao
  ];

  $json = json_encode($body, true);

  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/avaliacao',
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $json,
    CURLOPT_HTTPHEADER => [
      'Content-Type: application/json'
    ]
  ]);

  curl_exec($curl);

  $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);


  curl_close($curl);

  if ($http_code != 404) { ?>
      <script type="text/javascript">
        location.href = "../avaliar_anuncios/anuncios_avaliar"
      </script>
  <?php }
}
?>

</html>