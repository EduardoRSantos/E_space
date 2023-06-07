<!doctype html>
<html lang="pt">
  <head>
  	<title>Footer 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	
		<link rel="stylesheet" href="css/ionicons.min.css">
		<link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-left">
        <p>© 2023 E-space, Inc.</p>
        <p><a href="#">Privacidade</a><span> | </span><a href="http://localhost/routes/E_space/pages/termos_de_uso.php">Termos</a><span> | </span><a href="#">Mapa do site</a><span> | </span><a href="#">Informações da empresa</a></p>
      </div>
    </div>
    <div class="footer-buttons">
    <ul>
  <?php if (!empty($_SESSION['tipo_conta']) && $_SESSION['tipo_conta'] == 'adm') { ?>
    <li><a href="../pages/avaliar_anuncios/anuncios_avaliar.php"><img width="30" src="../img/avaliacao.png" alt="Avaliar"></a></li>
  <?php } ?>

  <li><a href="../pages/inserir_anuncio.php"><img width="30" src="../img/inserir.png" alt=""></a></li>
  <li><a href="../pages/tela_meus_anuncios.php"><img width="30" src="../img/anuncio.png" alt=""></a></li>
  <li><a href="../pages/tela_de_perfil.php"><img width="30" src="../img/perfil.png" alt=""></a></li>
  <?php if (empty($_SESSION)) { ?>
    <li class="cadastro"><a href="../pages/tela_de_login.php">Fazer Login </a></li>
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
</ul>
    </div>
  </footer>

  
		

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>