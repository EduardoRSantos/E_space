<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Meus Anúncios</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="../js/mascaras.js"></script>
  <link rel="stylesheet" href="./pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="../css/tela_meus_anuncios.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <header>
    <h1>Meus Anúncios</h1>
  </header>

  <?php

  if (!empty($_SESSION)) {
    $id = $_SESSION['id'];

    $body = [
      'id' => $id,
    ];

    $json = json_encode($body, true);

    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/usuario',
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

    if (!empty($data)) {
      foreach ($data as $anuncio) :
        $imagens = explode(';', $anuncio['imagens']); ?>
  <div class="anuncio">
        <div class="responsive">
          <div class="galeria">
            <a target="_blank" href="img_5terre.jpg">
              <img src="./img/casa.png" alt="Cinque Terre" width="800" height="600">
            </a>
            <h4>titulo: <?= $anuncio['titulo'] ?></h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar<?= $anuncio['id'] ?>">Editar</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#excluir<?= $anuncio['id'] ?>">Excluir</button>
          </div>
        </div>
        <!-- modal de editar -->
        <div class="modal fade" id="modalEditar<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post">
              <div class="modal-body">
              titulo: <input type="text" name="titulo" value="<?= $anuncio['titulo'] ?>">
              preco: <input type="text" name="preco" value="<?= $anuncio['preco'] ?>">
              localizacao: <input type="text" name="localizacao" value="<?= $anuncio['localizacao'] ?>">
              <br>cep: <input type="text" name="cep" value="<?= $anuncio['cep'] ?>">
              numero: <input type="text" name="numero" value="<?= $anuncio['numero'] ?>">
              quantidade_pessoas: <input type="text" name="quantidade_pessoas" value="<?= $anuncio['quantidade_pessoas'] ?>">
                <p>Criado: <?= $anuncio['criado_em'] ?></p>
                <p>Ultima atualização: <?= $anuncio['atualizado_em'] ?></p>
                descricao: <input type="text" name="descricao" value="<?= $anuncio['descricao'] ?>">
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-success">Salvar</button>
              </div>
              </form>
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
                    $imagens = explode(';', $anuncio['imagens']);
                    for ($i = 0; $i < count($imagens); $i++) : ?>
                      <li data-target='#carouselExampleIndicators' data-slide-to='<?= $i; ?>'></li>
                    <?php endfor; ?>
                  </ol>
                  <div class='carousel-item active'>
                    <img class='img-size' src='https://images.unsplash.com/photo-1485470733090-0aae1788d5af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1391&q=80' alt='First slide' />
                  </div>
                  <?php foreach ($imagens as $imagem) : ?>
                    <img class='img-size' src='<?= $imagem ?>' alt='Second slide' />
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
        </div>
    <?php endforeach;
    }else{
      echo "Para criar anuncios "; ?> <a href="../pages/inserir_anuncio.php">Clique aqui!</a> <?php
    }
  } else { ?>
    <script type="text/javascript">
      Swal.fire({
        title: 'Ops!',
        text: 'Antes faça login',
        icon: 'error',
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "../index.php";
        }
      })
    </script>
  <?php  } ?>
  <footer>
    <p>&copy; 2023 Meus Anúncios. Todos os direitos reservados.</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<?php

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$localizacao = $_POST['localizacao'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$quantidade_pessoas = $_POST['quantidade_pessoas'];

$body = [
    'titulo' => $titulo,
    'descricao' => $descricao,
    'preco' => $preco,
    'localizacao' => $localizacao,
    'cep' => $cep,
    'numero' => $numero,
    'quantidade_pessoas' => $quantidade_pessoas
];

print_r($body);

?>

</html>