<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style/style.css">
  <title>TCCs</title>
</head>

<body>
  
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
      </ul>
      <form class="d-flex" role="">
   
        <button class="btn btn-outline-success" type="button"  data-bs-toggle='modal' data-bs-target="#loginModal" >CADASTRAR</button>
        </form method="post" action="_scrip/validar.php">
      <form class="d-flex">
       
    </div>
  </div>
</nav>
  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex">
          <h5 class="modal-title" id="loginModalLabel">Cadastro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="login-usuario-form" method="post">
            <span id="msgAlertErroLogin"></span>
            <div class="mb-3">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nome">
            </div>
            <div class="mb-3">
              <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>

            <div class="mb-3">
              <input type="password" name="senha" class="form-control" id="senha" autocomplete="on"
                placeholder="Senha"></input>
            </div>
            
            <div class="mb-3">
              <input type="password" name="senha_confirmar" class="form-control" id="senhaConfirmar" autocomplete="on"
                placeholder="Confirmar senha"></input>
            </div>
            <br>
            <br>
            <br>
            <div class="mb-5 text-center d-grid gap-2">
              <input type="submit" class="btn btn-outline-primary bt-sm" id="login-usuario-btn" value="Acessar">
            </div>
           
          </form>
          <hr>
          <div class="text-center" >
            <span>Deseja fazer login ? <a href="../index.php">  Fazer Login</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>
</body>

</html>