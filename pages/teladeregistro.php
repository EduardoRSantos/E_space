<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tela de Registro</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body  id="perfil">
    <div class="container" id="teladeperfil">
    <form method="POST">
        <div class="form-image">
        <h2>Registra-se</h2>
        <div class="inputBox">
              <input type="text" placeholder="Nome Completo" name="nome" id="nome" class="inputUser" required>
              <label for="nome"></Label>   
        </div>
        <br>
        <div class="inputBox">
              <input type="email" placeholder="E-mail" name="email" id="email" class="inputUser" required>
              <label for="email"></Label>
        </div>
        <br>
        <div class="inputBox">
              <input type="password" placeholder="Senha" name="senha" id="senha" class="inputUser" required>
              <label for="senha"></Label>
        </div>
        <br>
        <div class="inputBox">
              <input type="password" placeholder="Confirmar Senha" name="senha" id="senha" class="inputUser" required>
              <label for="senha"></Label>
              <br>
              <div class="inputBox">
                    <label for="telefone"></Label>
                    <br>
                    <input type="tel" placeholder="Telefone" name="telefone" id="telefone"  required>    
                </div>
                <br>
              <label for="birthday"></label>
              <input type="date" id="nascimento" name="nascimento">
        </div>
        <br>
        <input type ="submit" name="submit" id="submit" value="Registrar">
        </form>
      </div>
</nav>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>
</body>
</html>