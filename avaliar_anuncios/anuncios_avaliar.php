<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="../style/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
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

      <div class="responsive">
        <div class="galeria">
          <a target="_blank" href="img_5terre.jpg">
            <img src=".<?= $imagens[0] ?>" alt="Cinque Terre" width="800" height="600">
          </a>
          <h4><?= $anuncio['titulo'] ?></h4>
          <h4><?= $anuncio['preco'] ?></h4>
          <h4><?= $anuncio['cep'] ?></h4>
          <h4><?= $anuncio['criado_em'] ?></h4>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo<?= $anuncio['id'] ?>">ALUGAR</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $anuncio['id'] ?>">imagens</button>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAceita<?= $anuncio['id'] ?>">Aceita</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalNegar<?= $anuncio['id'] ?>">Negar</button>
        </div>
      </div>
      <!-- usuario -->
      <div class="modal fade" id="modalInfo<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
              <h5 class="modal-title" id="exampleModalLongTitle">Anuncios de <?= $anuncio['nome'] ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Certeza que deseja aceitar o anuncio</h4>
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
              <h5 class="modal-title" id="exampleModalLongTitle">Anuncios de <?= $anuncio['nome'] ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Certeza que deseja excluir o anuncio</h4>
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
          <div class="modal-content">
            <div class="modal-body">

              <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                <ol class='carousel-indicators'>
                  <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                  <?php

                  for ($i = 0; $i < count($imagens); $i++) : ?>
                    <li data-target='#carouselExampleIndicators' data-slide-to='<?= $i; ?>'></li>
                  <?php endfor; ?>
                </ol>
                <div class='carousel-item active'>
                  <img class='img-size' src='https://images.unsplash.com/photo-1485470733090-0aae1788d5af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1391&q=80' alt='First slide' />
                </div>
                <?php foreach ($imagens as $imagem) : ?>
                  <img class='img-size' src='.<?= $imagem ?>' alt='Second slide' />
                <?php endforeach; ?>
              </div>
              <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='sr-only'>Previous</span>
              </a>
              <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='sr-only'>Next</span>
              </a>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
      </div>

  <?php endforeach;
  } ?>
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
        location.href = "../avaliar_anuncios/anuncios_avaliar.php"
      </script>
  <?php }
}
?>

</html>