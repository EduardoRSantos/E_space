
<div class="anuncios wrapper" >
<section class="rental-section">
  <div class="rental-container">
    <div data-aos="zoom-out-right" target="_blank" class="rental-ad">
      <?php $img = explode(';', $anuncio['imagens']); ?>
      <img src="<?= $img[0] ?>" alt="Cinque Terre" width="800" height="600">
    </div>
    <div  data-aos="fade-up-right" class="rental-details">
      <h2 class="limite-chars-title" ><?= $anuncio['titulo'] ?></h2>
      <button class="capacity-button">
  <span class="capacity-icon"><img src="./img/pessoas.png" alt="" srcset=""><?= $anuncio['quantidade_pessoas'] ?></span>
</button>
      <!-- <p class="limite-chars" ><?= $anuncio['descricao'] ?></p> -->
      <div data-aos="fade-up-right" class="rental-price">
          <div class="localizacao d-flex w-100" >
          <img  src="./img/localizacao.png" alt="" srcset="">
          <p ><?= $anuncio['localizacao'] ?></p>
          </div>
          <div class="dinheiro d-flex w-100" >
            <img width="50px" src="./img/dinheiro.png" alt="">
            <p ><?= $anuncio['preco'] ?></p>
          </div>
        <div  class="rental-buttons">
          <button type="button" class="button-with-image" data-toggle="modal" data-target="#modal<?= $anuncio['id'] ?>"></button>
          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalFotos<?= $anuncio['id'] ?>">Imagens</button>
          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalInfo<?= $anuncio['id'] ?>">Descrição</button>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<div class="modal fade anuncio-modal" id="modal<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-white">
      <div class="modal-header">
        <h4 class="modal-title">Deseja começar a conversar no WhatsApp?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="conversar.php">
          <input type="hidden" name="telefone" id="telefone" value="<?= $anuncio['telefone'] ?>">
          <img width="35" height="35" src="./img/whatsapp.png" alt="" srcset="" class="animated-image">
          <button type="submit" class="btn btn-success"> Abrir conversa</button>
        </form>
      </div>
    </div>
  </div>
</div>





    <div   class="modal fade anuncio-modal" id="modalInfo<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
          <!-- <div class=".header-modal">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <div  class="body-modal bg-dark">
         
            <h4 class="anunciante" > <img src="./img/do-utilizador.png" alt="" srcset=""><strong> ANUNCIANTE: </strong> <?= $anuncio ['nome'] ?></h4>
            <br>
            <h3 class="limite-chars-title-modal"><?= $anuncio['titulo'] ?></h3>
            <h4>Publicado: <?= $anuncio['criado_em'] ?></h4>
            <hr>
            <h4 class="limite-chars-modal" >Descrição <br> <?= $anuncio['descricao'] ?></h4>
            <span class="capacity-icon"><img src="./img/pessoas.png" alt="" srcset=""><?= $anuncio['quantidade_pessoas'] ?></span>
            <br>
            <br>
            <h4><strong>Telefone</strong> <br> <?= $anuncio['telefone'] ?></h4>
            <h4><strong>Cep</strong> <br> <?= $anuncio['cep'] ?></h4>
            
          </div>
          <div class="footer-modal">
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade galeria-anuncios" id="modalFotos<?= $anuncio['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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