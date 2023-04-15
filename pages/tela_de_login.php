<!DOCTYPE html>
<html lang="pt-br">
<?php
// Inicializa a sessão.
// Se estiver sendo usado session_name("something"), não esqueça de usá-lo agora!
session_start();

// Apaga todas as variáveis da sessão
$_SESSION = array();

// Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
// Nota: Isto destruirá a sessão, e não apenas os dados!
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
  );
}

// Por último, destrói a sessão
session_destroy();

?>

<head>
  <meta charset="utf-8">
  <title>Tela de Login</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body id="perfil">
  <div class="container" id="teladeperfil">
    <form method="POST">
      <div class="form-image">
        <h2>Login</h2>
        <div class="inputBox">
          <input type="email" placeholder="E-mail" name="email" id="email" class="inputUser" required>
          <label for="email"></Label>
          <br>
        </div>
        <div class="inputBox">
          <input type="password" placeholder="Senha" name="senha" id="senha" class="inputUser" required>
          <label for="senha"></Label>
          <br>
          <input type="submit" name="submit" id="submit" value="Login">
          <br><br>
    </form>
    <button><a href="http://localhost/E_space/pages/tela_de_registro.php">Registra-se</a></button>
  </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  $headers = array(
    'Content-Type: application/json'
  );

  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => 'http://localhost/E_space/routes/index.php/login',
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $json,
    CURLOPT_HTTPHEADER => $headers
  ]);

  $response = curl_exec($curl);

  $array = json_decode($response, true);
  $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

  curl_close($curl);
  if (!empty($array)) { 
    $_SESSION['id'] = $array['id'];
    $_SESSION['nome'] = $array['nome'];
    $_SESSION['email'] = $array['email']; ?>
    <script type="text/javascript">
      Swal.fire({
        icon: 'success',
        title: 'Ola',
        text: 'Bem vindo!',
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