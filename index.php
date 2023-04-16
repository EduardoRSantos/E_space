<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
  <nav>
    <div class="logo">
      <img src="./img/e-space.png" alt="Logo" />
    </div>
    <label for="menu-toggle" class="menu-icon">&#9776;</label>
    <ul class="menu">
      <li class="login"><a href="http://localhost/E_space/pages/inserir_anuncio.php">Inserir Anúncio</a></li>
    </ul>
    <ul class="menu">
      <li class="login"><a href="http://localhost/E_space/pages/tela_de_perfil.php">perfil</a></li>
    </ul>
    <ul class="menu">
      <li class="login"><a href="http://localhost/E_space/pages/tela_de_login.php">Fazer Login</a></li>
    </ul>
  </nav>

  <!-- PESQUISAR -->
  <div class="pesquisar">
    <input type="search" name="" id="" size="50" placeholder="Realizar Pesquisa" />
    <button type="submit">Pesquisar</button>
  </div>


  <!-- SELEÇÃO -->
  <form class="form">
    <h5>ORDENAR POR</h5>
    <select name="plataforma">
      <option value="crescente">Preço Crescente</option>
      <option value="decrescente">Preço Decrescente</option>
    </select>
  </form>
  <!-- SELEÇÃO -->

  <!-- GALERIA D EFOTOS -->
  <?php

  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios',
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_RETURNTRANSFER => true,
  ]);

  $response  = curl_exec($curl);

  $data = json_decode($response, true);

  curl_close($curl);

  foreach ($data as $key) {

  ?>
    <div class="responsive">
      <div class="galeria">
        <a target="_blank" href="img_5terre.jpg">
          <img src="./img/casa.png" alt="Cinque Terre" width="600" height="400">
        </a>
        <h4><?= $key['titulo'] ?></h4>
        <h4><?= $key['preco'] ?></h4>
        <h4><?= $key['descricao'] ?></h4>
        <h4><?= $key['cep'] ?></h4>
        <h4><?= $key['criado_em'] ?></h4>
        <button>ALUGAR</button>
      </div>
    </div>

  <?php } ?>
</body>

</html>