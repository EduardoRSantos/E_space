<header>
      <nav class="navbarheader wrapper" >
    <div class="logo">
      <a href="../index.php"><img  src="../img/logo.png" alt="Logo" /></a>
    </div>
    <!-- <form class="searchbar" method="post">
    <div class="pesquisar">
      <input type="search" name="pesquisar" id="" size="50"  placeholder="Realizar Pesquisa" required/>
      <button  class="botaopequisar"type="submit"><img class="lupa" src="../img/lupa.png" alt="" srcset=""></button>
    </div>
  </form> -->
    <ul class="menu">
       <?php if(!empty($_SESSION['tipo_conta']) && $_SESSION['tipo_conta'] == 'adm'){ ?>
        <li class=""><a href="../avaliar_anuncios/anuncios_avaliar.php"><img width="30" src="../img/avaliacao.png" alt="Avaliar"></a></li>
        <?php } ?>
      
      <li class=""><a href="../pages/inserir_anuncio.php"><img width="30" src="../img/inserir.png" alt=""></a></li>
      <li class=""><a href="../pages/tela_meus_anuncios.php"><img width="30" src="../img/anuncio.png" alt=""></a></li>
      <li class=""><a href="../pages/tela_de_perfil.php"><img width="30" src="../img/perfil.png" alt=""></a></li>
      <?php if (empty($_SESSION)) { ?>
      <li class="cadastro"><a href="../E_space/pages/tela_de_login.php">Fazer Login </a></li>
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
          <li><img src=".<?= $data[0]['path'] ?>" alt="" width="50" height="50"></li>
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