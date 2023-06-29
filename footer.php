<!doctype html>
<html lang="pt">

<head>
  <title>Footer 07</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="shortcut icon" type="image/jpg" href="./img/logo-ConversImagem.ico" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/footer.css">
</head>

<body>
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-left">
        <p>© 2023 E-space, Inc.</p>
        <p><a href="../pages/privacidade">Privacidade</a><span> |  | </span><a href="../pages/mapa_do_site">Mapa do site</a><span> | </span><a href="../pages/informacoes_do_sistema">Informações da empresa</a></p>
      </div>
    </div>
    <div class="footer-buttons">
      <ul>
        <?php if (!empty($_SESSION['tipo_conta']) && $_SESSION['tipo_conta'] == 'adm') { ?>
          <li><a href="../avaliar_anuncios/anuncios_avaliar"><img width="30" src="../img/avaliacao.png" alt="Avaliar"></a></li>
        <?php } ?>

        <li><a href="../pages/anuncio"><img width="30" src="../img/inserir.png" alt=""></a></li>
        <li><a href="../pages/anuncios"><img width="30" src="../img/anuncio.png" alt=""></a></li>
        <li><a href="../pages/perfil"><img width="30" src="../img/perfil.png" alt=""></a></li>
        <?php if (empty($_SESSION)) { ?>
          <li class="cadastro"><a href="../pages/login">Fazer Login </a></li>
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
            <li><img style="border-radius: 50%;" width="35" height="35" src=".<?= $data[0]['path'] ?>" alt=""></li>
        <?php }
        } ?>
         <div class="btn-group dropup">
  <button type="button" class="btn bg-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  </button>
  <ul class="dropdown-menu" style="background-color: white;">
    <li><a class="dropdown-item" href="../pages/privacidade">Privacidade</a></li>
    <li><a class="dropdown-item" href="../pages/mapa_do_site">Mapa do site</a></li>
    <li><a class="dropdown-item" href="../pages/informacoes_do_sistema">Informações da empresa</a></li>
  </ul>
</div>
      </ul>
    </div>
  </footer>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>