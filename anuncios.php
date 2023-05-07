<div class="anuncios wrapper" >
<section class="rental-section">
  <div class="rental-container">
    <div target="_blank" class="rental-ad">
      <img src="./img/casa3.jfif" alt="Cinque Terre" width="800" height="600">
    </div>
    <div class="rental-details">
      <h2><?= $anuncio['titulo'] ?></h2>
      <p><?= $anuncio['descricao'] ?></p>
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo <?= $anuncio['id'] ?> ">ALUGAR</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $anuncio['id'] ?>">IMAGENS</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo<?= $anuncio['id'] ?>">+ INFORMAÇÕES</button>
        </div>
      </div>
    </div>
  </div>
</section>
</div>


    <div class="modal fade anuncio-modal" id="modalInfo<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class=".header-modal">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="body-modal">
            <h4><strong>NOME:</strong> <?= $anuncio['nome'] ?></h4>
            <h4><strong>TEL:</strong> <?= $anuncio['telefone'] ?></h4>
            <h4><strong>CEP:</strong> <?= $anuncio['cep'] ?></h4>
            <h4><?= $anuncio['criado_em'] ?></h4>
          </div>
          <div class="footer-modal">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-success">Salvar</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modal<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="slide-modal">
          <div class="body">
            <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
              <ol class='carousel-indicators'>
                <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                <?php 
                $imagens = explode(';', $anuncio['imagens']);
                for($i=0; $i < count($imagens); $i++) : ?>
                <li data-target='#carouselExampleIndicators' data-slide-to='<?= $i; ?>'></li>
                <?php endfor; ?>
              </ol>
              <div class='carousel-item active'>
                  <img class='img-size' src='' alt='First slide' />
                </div>
                <?php foreach ($imagens as $imagem) : ?>
                  <img class='img-size' src='<?= $imagem ?>' alt='Second slide' />
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>