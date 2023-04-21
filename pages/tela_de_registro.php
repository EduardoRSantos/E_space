<!DOCTYPE html>
<html lang="pt-br">

<head>
      <meta charset="utf-8">
      <title>Tela de Registro</title>
      <link rel="stylesheet" type="text/css" href="../css/style_tela_de_registro.css">

</head>

<body id="perfil">
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
                              <input type="password" placeholder="Confirmar Senha" name="senha_confirmar" id="senha" class="inputUser" required>
                              <label for="senha"></Label>
                              <br>
                              <div class="inputBox">
                                    <label for="telefone"></Label>
                                    <br>
                                    <input type="tel" placeholder="Telefone" name="telefone" id="telefone" required>
                              </div>
                        </div>
                        <br>
                        <input type="submit" name="submit" id="submit" value="Registrar">
            </form>
      </div>
      </nav>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="js/custom.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="../js/mascaras.js"></script>

</body>
<?php

if (!empty($_POST['email'])) {

      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $senha_confirmar = $_POST['senha_confirmar'];
      $telefone = $_POST['telefone'];

      if ($senha != $senha_confirmar) { ?>
            <script type="text/javascript">
                  Swal.fire({
                        icon: 'error',
                        title: 'Senha',
                        text: 'conferir se está correta',
                        confirmButtonText: 'Ok'
                  }).then((result) => {
                        if (result.isConfirmed) {
                              location.href = "../pages/tela_de_registro.php";
                        }
                  })
            </script>
            <?php } else {
            $body = [
                  'nome' => $nome,
                  'email' => $email,
                  'senha' => $senha,
                  'telefone' => $telefone
            ];

            $json = json_encode($body);

            $curl = curl_init();
            curl_setopt_array($curl, [
                  CURLOPT_URL => 'http://localhost/E_space/routes/index.php/cadastro/usuario',
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => $json,
                  CURLOPT_HTTPHEADER => [
                        'Content-Type: application/json'
                  ]
            ]);

            curl_exec($curl);

            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);

            if ($http_code == 200) { ?>
                  <script type="text/javascript">
                        Swal.fire({
                              icon: 'success',
                              title: 'Sucesso',
                              text: 'Cadastro feito!',
                              confirmButtonText: 'Ok'
                        }).then((result) => {
                              if (result.isConfirmed) {
                                    location.href = "../pages/tela_de_login.php";
                              }
                        })
                  </script>

            <?php } else { ?>

                  <script type="text/javascript">
                        Swal.fire({
                              icon: 'error',
                              title: 'Triste',
                              text: 'Email ja cadastrado!',
                              confirmButtonText: 'Ok'
                        }).then((result) => {
                              if (result.isConfirmed) {
                                    location.href = "../pages/tela_de_registro.php";
                              }
                        })
                  </script>

<?php }
      }
}
?>

</html>