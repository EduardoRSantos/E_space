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
      <li class=""><a href="http://localhost/E-space/pages/inserir_anuncio.php">Inserir Anúncio</a></li>
      <li class=""><a href="./pages/tela_meus_anuncios.php">Meus Anúncios</a></li>
      <li class=""><a href="http://localhost/E-space/pages/tela_de_login.php">Fazer Login</a></li>
      <div class="profile-container">
  <img width="40" height="40" id="profile-image" src="./img/perfil.png" alt="Profile Image">
  <select id="profile-options" name="profile-options">
    <option value="option1"><a href="http://localhost/E-space/pages/tela_de_perfil.php">Perfil</a></option>
    <option value="option2"><a href="./pages/tela_meus_anuncios.php">Meus Anúncios</a></option>
    <option value="option3">Sair</option>
  </select>
</div>
    </ul>
  
  </nav>

  <!-- PESQUISAR -->
  <div class="pesquisar">
    <input type="search" name="" id="" size="50" placeholder="Realizar Pesquisa" />
    <button type="submit">Pesquisar</button>
  </div>


	<main>
  <header>
		<h1>Aluguel de Espaço</h1>
		<p>O melhor lugar para você armazenar seus pertences com segurança.</p>
	</header>
		<section class="carousel">
			<div class="carousel-item">
				<img src="./img/casa.png" alt="Imagem 1">
			</div>
			<div class="carousel-item">
				<img src="./img/casa1.png" alt="Imagem 2">
			</div>
			<div class="carousel-item">
				<img src="./img/casa2.png" alt="Imagem 3">
			</div>
      <div class="carousel-item">
				<img src="./img/casa.png" alt="Imagem 1">
			</div>
			<div class="carousel-item">
				<img src="./img/casa1.png" alt="Imagem 2">
			</div>
			<div class="carousel-item">
				<img src="./img/casa2.png" alt="Imagem 3">
			</div>
		</section>
    
	</main>
  

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
    <!-- <div class="responsive">
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
    </div> -->

  <?php } ?>

  <script src="./js/js.js"></script>
</body>

</html>


