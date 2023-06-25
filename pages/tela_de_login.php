<!DOCTYPE html>
<html lang="pt-br">
  <?php 
  session_start();
  $_SESSION = array();
  ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico"/>
  <title>Tela de Login</title>
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script>

  <style>
    <?php include '../css/navbar_login.css'; ?>
        <?php include '../css/style_tela_de_login.css'; ?>
    </style>

</head>

<body>

    <?php include '../navbar-login.php'; ?>
<div class="page">
        <form method="POST" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <input type="email" placeholder="Digite o seu e-mail" name="email" id="email" class="inputUser" required autofocus="true" />
            <input type="password" placeholder="Digite a sua senha" name="senha" id="senha" class="inputUser"  required/>
            <input type="submit" name="submit" id="submit" value="Acessar" class="btn" />
            <a href="/">Esqueci minha senha</a>
            <br>
         
           <label for="login">Não tem conta ? <a href="../pages/tela_de_registro.php">Registra-se</a></label>
        </form>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="../js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

<?php

if (!empty($_POST['email'])) {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $body = [
    'email' => $email,
    'senha' => $senha
  ];

  $json = json_encode($body);

  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => 'http://localhost/E_space/routes/index.php/login',
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $json,
    CURLOPT_HTTPHEADER => [
      'Content-Type: application/json'
    ]
  ]);

  $response = curl_exec($curl);

  $array = json_decode($response, true);

  $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

  curl_close($curl);

  if (!empty($array)) { 
    $_SESSION['id'] = $array['id'];
    $_SESSION['nome'] = $array['nome'];
    $_SESSION['email'] = $array['email'];
    $_SESSION['telefone'] = $array['telefone'];
    $_SESSION['tipo_conta'] = $array['tipo_de_conta'];
     ?>
    <script type="text/javascript">
      Swal.fire({
        title: 'OK',
        text: 'Bem vindo!',
        icon: 'success',
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "../index.php";
        }
      })
    </script>
  <?php }
  if ($http_code == 404) { ?>
    <script type="text/javascript">
      Swal.fire({
        title: 'Ops!',
        text: 'Email não cadastrado',
        icon: 'error',
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "../pages/tela_de_login.php";
        }
      })
    </script>
  <?php } elseif ($http_code == 401) { ?>
    <script type="text/javascript">
      Swal.fire({
        title: 'Ops!',
        text: 'Email ou senha incorreto',
        icon: 'error',
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "../pages/tela_de_login.php";
        }
      })
    </script>
<?php }
}
?>

</html>