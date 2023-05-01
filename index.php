<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./pages/modal/modal_carousel.css" />
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
  <nav>
    <div class="logo">
      <img src="./img/e-space.png" alt="Logo" />
    </div>
    <label for="menu-toggle" class="menu-icon">&#9776;</label>
    <ul class="menu">
      <?php if(!empty($_SESSION['tipo_conta']) == 'usuario'){ ?>
        <li class=""><a href="./avaliar_anuncios/anuncios_avaliar.php"><img width="30" src="./img/avaliacao.png" alt=""></a></li>
        <?php } ?>
      <li class=""><a href="../E_space/pages/inserir_anuncio.php"><img width="30" src="./img/inserir.png" alt=""></a></li>
      <?php if (empty($_SESSION)) { ?>
        <li class=""><a href="../E_space/pages/tela_de_login.php">Fazer Login</a></li>
      <?php } ?>
      <li class=""><a href="../E_space/pages/tela_meus_anuncios.php"><img width="30" src="./img/anuncio.png" alt=""></a></li>
      <li class=""><a href="../E_space/pages/tela_de_perfil.php"><img width="30" src="./img/perfil.png" alt=""></a></li>

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
          <li><img src="<?= $data[0]['path'] ?>" alt="" width="50" height="50"></li>
        <?php } else { ?>
          <li><img src="#" alt="default"></li>
      <?php }
      } ?>
    </ul>
  </nav>

  <form method="post">
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="" size="50" placeholder="Realizar Pesquisa" />
      <button type="submit">Pesquisar</button>
    </div>
  </form>

  <hr>
  <?php
  if (!isset($_POST['pesquisar'])) {

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
    
    if(!empty($data)){
      foreach ($data as $anuncio) :

        include 'anuncios.php';

      endforeach;
    }else{
      echo "Anuncio não encontrado";
    }
  }

  ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>