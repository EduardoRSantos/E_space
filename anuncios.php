
<div class="anuncios wrapper" >
<section class="rental-section">
  <div class="rental-container">
    <div target="_blank" class="rental-ad">
      <?php $img = explode(';', $anuncio['imagens']); ?>
      <img src="<?= $img[0] ?>" alt="Cinque Terre" width="800" height="600">
    </div>
    <div class="rental-details">
      <h2 class="limite-chars-title" ><?= $anuncio['titulo'] ?></h2>
      <p class="limite-chars" ><?= $anuncio['descricao'] ?></p>
      <div class="rental-price">
          <div class="localizacao d-flex w-100" >
          <img  src="./img/localizacao.png" alt="" srcset="">
          <p ><?= $anuncio['localizacao'] ?></p>
          </div>
          <div class="dinheiro d-flex w-100" >
            <img width="50px" src="./img/dinheiro.png" alt="">
            <p ><?= $anuncio['preco'] ?></p>
          </div>
        <div class="rental-buttons">
          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalInfo <?= $anuncio['id'] ?>">Mensagem</button>
          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal<?= $anuncio['id'] ?>">Imagens</button>
          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalInfo<?= $anuncio['id'] ?>"><a href="./pages/mais_informacoes.php">+ Informações</a></button>
        </div>
      </div>
    </div>
  </div>
</section>
</div>


    <div class="modal fade anuncio-modal" id="modalInfo<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <!-- <div class=".header-modal">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <div class="body-modal">
            <h4><strong>NOME:</strong> <?= $anuncio['nome'] ?></h4>
            <h4><strong>TEL:</strong> <?= $anuncio['telefone'] ?></h4>
            <h4><strong>CEP:</strong> <?= $anuncio['cep'] ?></h4>
            <h4><?= $anuncio['criado_em'] ?></h4>
          </div>
          <div class="footer-modal">
        
            <button type="button" class="btn btn-success">Fechar</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modal<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="slide-modal">
          <div class="body">
            <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                <?php 
                $imagens = explode(';', $anuncio['imagens']);
                foreach ($imagens as $imagem) : 
                ?>
                  <img class='img-size' src='<?= $imagem ?>' alt='Second slide' />
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>