<?php session_start();

if (empty($_SESSION)) {

  header('Location: http://localhost/E_space/pages/login');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico" />
  <title>Meus Anúncios</title>
  <link rel="stylesheet" href="./pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="../css/tela_meus_anuncios.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <style>
    <?php include '../css/navbar.css'; ?><?php include '../css/footer.css'; ?><?php include '../css/ionicons.min.css'; ?>
  </style>

</head>

<body>
  <?php include '../navbar.php'; ?>


  <main class="meus-anuncios wrapper">
    <header>
      <h2 class="titulo wrapper">Meus anuncios</h2>
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
          <div class="anuncios">
            <section data-aos="zoom-out-right" class="rental-section wrapper">
              <div data-aos="fade-up-right" class="rental-container">
                <div target="_blank" class="rental-ad">
                  <img src=".<?= $imagens[0] ?>" alt="Cinque Terre">
                </div>
                <div class="rental-details">
                  <?php if ($anuncio['autorizacao'] == 0) { ?>
                    <h4 class="aguardar limite-chars">Aguarde a avaliação, logo seu anúncio sera postado!</h4>
                  <?php } else { ?>
                    <h4 class="limite-chars postado">Anúncio postado!</h4>
                  <?php } ?>
                  <h2 class="limite-chars-titulo"><?= $anuncio['titulo'] ?></h2>
                  <!-- <p class="limite-chars-descricao" ><?= $anuncio['descricao'] ?></p> -->

                  <div class="rental-price">
                    <div class="localizacao d-flex w-100">
                      <img src="../img/localizacao.png" alt="" srcset="">
                      <p><?= $anuncio['localizacao'] ?></p>
                    </div>
                    <div class="dinheiro d-flex w-100">
                      <img width="50px" src="../img/dinheiro.png" alt="">
                      <p><?= $anuncio['preco'] ?></p>
                    </div>
                    <div class="rental-buttons">
                      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEditar<?= $anuncio['id'] ?>">Editar</button>
                      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalEcluir<?= $anuncio['id'] ?>">Excluir</button>

                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <div class="modal fade anuncio-modal" id="modalInfo<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content bg-dark">
                <!-- <div class=".header-modal">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
                <div class="body-modal bg-dark">
                  <h4 class="anunciante"><strong>Anunciante</strong> <?= $anuncio['nome'] ?></h4>
                  <br>
                  <h3 class="limite-chars-title-modal"><?= $anuncio['titulo'] ?></h3>
                  <h4>Publicado: <?= $anuncio['criado_em'] ?></h4>
                  <hr>
                  <h4 class="limite-chars-modal">Descrição <br> <?= $anuncio['descricao'] ?></h4>
                  <br>
                  <h4><strong>Telefone</strong> <br> <?= $anuncio['telefone'] ?></h4>
                  <h4><strong>Cep</strong> <br> <?= $anuncio['cep'] ?></h4>
                </div>
                <div class="footer-modal">
                </div>
              </div>
            </div>
          </div>




          <!-- modal de editar -->
          <div class="modal fade" id="modalEditar<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Anúncio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post">
                  <div class="modal-body">
                    <input type="hidden" value="salvar" name="fazer">
                    <input type="hidden" value="<?= $anuncio['id'] ?>" name="id">
                    <br>


                    <h5>Publicado</h5> <?= $anuncio['criado_em'] ?>
                    <h5>Ultima atualização</h5> <?= $anuncio['atualizado_em'] ?>
                    <hr>

                    <h5>Titulo</h5>
                    <input type="text" name="titulo" value="<?= $anuncio['titulo'] ?>">
                    <br>

                    <h5>Preço</h5>
                    <input type="number" name="preco" value="<?= $anuncio['preco'] ?>">
                    <br>
                    <h5>Bairro</h5>
                    <input type="text" name="localizacao" value="<?= $anuncio['localizacao'] ?>">
                    <br>
                    <h5>Cep</h5>
                    <input type="text" name="cep" id="cep" value="<?= $anuncio['cep'] ?>">
                    <br>
                    <h5>Nº</h5>
                    <input type="number" name="numero" value="<?= $anuncio['numero'] ?>">
                    <br>
                    <h5>Pessoas</h5>
                    <input type="text" name="quantidade_pessoas" value="<?= $anuncio['quantidade_pessoas'] ?>">
                    <br>

                    <h5>Descricao</h5>
                    <textarea class="descricao-meus" maxlength="25" name="descricao"><?= $anuncio['descricao'] ?></textarea>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- excluir -->
          <div class="modal fade" id="modalEcluir<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Anúncio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post">
                  <div class="modal-body">
                    <input type="hidden" value="excluir" name="fazer">
                    <input type="hidden" value="<?= $anuncio['id'] ?>" name="id">
                    <p>Certeza que deseja excluir o anúncio</p>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">excluir</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
          </div>
        <?php endforeach;
      } else {
        echo "Para criar anuncios"; ?> <a href="../pages/anuncio">Clique aqui!</a> <?php
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
            location.href = "../";
          }
        })
      </script>
    <?php  } ?>
  </main>



  <br><br>
  <br><br>
  <?php include '../footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="../js/mascaras.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
<?php

if (!empty($_POST['fazer'])) {

  if ($_POST['fazer'] == 'salvar') {

    $body = [
      'id' => $_POST['id'],
      'titulo' => $_POST['titulo'],
      'descricao' => $_POST['descricao'],
      'preco' => $_POST['preco'],
      'localizacao' => $_POST['localizacao'],
      'cep' => $_POST['cep'],
      'numero' => $_POST['numero'],
      'quantidade_pessoas' => $_POST['quantidade_pessoas']
    ];

    $json = json_encode($body, true);

    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/atualizar',
      CURLOPT_CUSTOMREQUEST => "PUT",
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => [
        'Content-Type: application/json'
      ]
    ]);

    curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    if ($http_code == 200) { ?>
      <script type="text/javascript">
        Swal.fire({
          title: 'Sucesso',
          text: 'Atualizado feita, por favor aguarde uma nova avaliação',
          icon: 'success',
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "../pages/anuncios";
          }
        })
      </script>
    <?php } else if ($http_code == 404) { ?>
      <script type="text/javascript">
        Swal.fire({
          title: 'Ops!',
          text: 'Erro ao salvar, tente novamente',
          icon: 'error',
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "../pages/anuncios";
          }
        })
      </script>
    <?php }
  } else if ($_POST['fazer'] == 'excluir') {

    $json = json_encode(['id' => $_POST['id']], true);

    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/delete',
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => [
        'Content-Type: application/json'
      ]
    ]);
    curl_exec($curl);
    curl_close($curl); ?>
    <script type="text/javascript">
      Swal.fire({
        title: 'Sucesso',
        text: 'Anúncio apagado com sucesso!',
        icon: 'success',
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "../";
        }
      })
    </script>
  <?php }
}

if (empty($_SESSION)) { ?>
  <script type="text/javascript">
    Swal.fire({
      title: 'Ops!',
      text: 'Antes faça login',
      icon: 'error',
      confirmButtonText: 'Ok'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = "../";
      }
    })
  </script>


<?php } ?>

</html>