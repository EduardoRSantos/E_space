<header>
  <div class="pos-f-t-mobile">
    <div class="collapse" id="navbarToggleExternalContent">

      <div class="mobile-button bg-white p-4">
        <button class=""><a class="text-light" href="../avaliar_anuncios/anuncios_avaliar">Avaliar anuncios</a></button>
        <button class=""><a class="text-white" href="../pages/anuncio">Meus anuncios</a></button>
        <button class=""><a class="text-white" href="../pages/anuncios">Inserir anuncio</a></button>
        <button class=""><a class="text-white" href="../pages/perfil">Perfil</a></button>

        <form class="searchbarmobile" method="post">
          <div class="pesquisar">
            <input type="search" name="pesquisar" id="" size="50" placeholder="Realizar Pesquisa" required />
            <button class="botaopequisar" type="submit"><img class="lupa" src="../img/lupa.png" alt="" srcset=""></button>
          </div>
        </form>

      </div>
    </div>
    <nav class="navbar navbar-light bg-white">
      <!-- <div class="logo">
        <a href="../index.php"><img src="../img/logo.png" alt="Logo" /></a>
      </div> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </div>
  <nav class="navbarheader">
    <div class="logo">
      <a href="../"><img src="../img/logo.png" alt="Logo" /></a>
    </div>
    <!-- <form class="searchbar" method="post">
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="" size="50"  placeholder="Realizar Pesquisa" required/>
      <button  class="botaopequisar"type="submit"><img class="lupa" src="../img/lupa.png" alt="" srcset=""></button>
    </div>
  </form> -->
    <ul class="menu">
      <?php if (!empty($_SESSION['tipo_conta']) && $_SESSION['tipo_conta'] == 'adm') { ?>
        <li class=""><a href="../avaliar_anuncios/anuncios_avaliar"><img width="30" src="../img/avaliacao.png" alt="Avaliar"></a></li>
      <?php } ?>

      <li class=""><a href="../pages/anuncio"><img width="30" src="../img/inserir.png" alt=""></a></li>
      <li class=""><a href="../pages/anuncios"><img width="30" src="../img/anuncio.png" alt=""></a></li>
      <li class=""><a href="../pages/perfil"><img width="30" src="../img/perfil.png" alt=""></a></li>
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
          <li><img style="border-radius: 50%;" src=".<?= $data[0]['path'] ?>" alt="" width="35" height="35"></li>
      <?php }
      } ?>
    </ul>
  </nav>

  <!-- <form class="searchbarmobile" method="post">
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="" size="50"  placeholder="Realizar Pesquisa" required/>
      <button  class="botaopequisar"type="submit"><img class="lupa" src="../img/lupa.png" alt="" srcset=""></button>
    </div>
  </form> -->

</header>