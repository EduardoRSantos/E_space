<?php session_start();

if (empty($_SESSION)) {

    header('Location: http://localhost/E_space/pages/tela_de_login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/mascaras.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        <?php include '../css/navbar.css'; ?><?php include '../css/footer.css'; ?><?php include '../css/ionicons.min.css'; ?>
    </style>
</head>

<body>
    <?php include '../navbar.php'; ?>
    <?php if (!empty($_SESSION)) { ?>
        <div class="formulario-de-dados wrapper">
            <h2 class="titulo wrapper">Informações do perfil</h2>
            <div class="dados-user d-flex">
            <img class="config" src="../img/configuracoes.gif" alt="" srcset="">
                <button class="" type="button"><a href="./tela_de_perfil.php">Visualizar Perfil</a></button>
                <button class="" type="button"><a href="./tela_de_editar.php">Editar Perfil</a></button>
            </div>
            <div class="container e-space-user">
                <?php if(empty($data[0]['path'])){  ?> 
                    <img class="foto-perfil" style="border-radius: 50%;"  src="../img/perfil.png" alt=""  width="150" height="150">
                <?php }else { ?> 
                <img class="foto-perfil" style="border-radius: 50%;"  src=".<?= $data[0]['path'] ?>" alt=""  width="150" height="150">
                <?php } ?>
                <img class="user-space" width="320" height="80" src="../img/space-user.png" alt="">
            </div>

            <div class="tela-perfil">
                <div>
                    <h3>Bem-vindo, <strong><?= $_SESSION['nome'] ?></strong></h3>
                    <p>
                        Para visualizar seus dados cadastrados, clique no botão 'Visualizar Perfil'.<br>Para fazer alterações nos seus dados, clique no botão 'Editar Perfil'.
                    </p>
                </div>
                <hr>
                <br>
                <label for="nome"><strong>Nome Completo</strong></Label>
                <div class="dados">
                    <label for="nome"><?= $_SESSION['nome'] ?></Label>
                </div>
                <br>
                <label for="email"><strong>E-mail</strong></Label>
                <div class="dados">
                    <label for="email"><?= $_SESSION['email'] ?></Label>
                </div>
                <br>
                <label for="telefone"><strong>Telefone</strong></Label>
                <div class="dados">
                    <label for="telefone"><?= $_SESSION['telefone'] ?></Label>
                </div>
                </fieldset>
                <form class="sair-tela" action="sair.php" method="post">
                    <input type="submit" value="Sair">
                </form>
            </div>

        </div>

    <?php } else { ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'Ops!',
                text: 'Antes faça login',
                icon: 'error',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "../index.php";
                }
            })
        </script>
        <?php
    }

    if (!empty($_FILES['imagem'])) {

        $arquivo = $_FILES["imagem"];
        $nome_imagen = $arquivo["name"];
        $novo_nome_imagem = uniqid();
        $extensao = strtolower(pathinfo($nome_imagen, PATHINFO_EXTENSION));
        $href_imagen_mover = "../imagens/$novo_nome_imagem.$extensao";
        $href_imagen_upa = "./imagens/$novo_nome_imagem.$extensao";
        $verify = move_uploaded_file($arquivo["tmp_name"], $href_imagen_mover);

        if ($verify) {
            $id = $_SESSION["id"];

            $body = [
                'referencia_imagen' => $href_imagen_upa,
                'id' => $id
            ];

            $json = json_encode($body);

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost/E_space/routes/index.php/atualizar/usuario/imagen',
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
                        title: 'OK!',
                        text: 'Salvo com sucesso',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "../pages/tela_de_perfil.php";
                        }
                    })
                </script>
            <?php }
            if ($http_code == 403) { ?>
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Ops!',
                        text: 'Ocorreu um error, tente novamente',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "../pages/tela_de_perfil.php";
                        }
                    })
                </script>
            <?php    }
        }
    }

    if (!empty($_POST['nome'])) {

        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $id = $_SESSION["id"];

        $body = [
            'nome' => $nome,
            'telefone' => $telefone,
            'id' => $id
        ];

        $json = json_encode($body);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/E_space/routes/index.php/atualizar/usuario',
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ]);

        curl_exec($curl);

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($http_code == 200) {
            $_SESSION['nome'] = $nome;
            $_SESSION['telefone'] = $telefone; ?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'OK!',
                    text: 'Salvo com sucesso',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "../pages/tela_de_perfil.php";
                    }
                })
            </script>

        <?php }
        if ($http_code == 403) { ?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Ops!',
                    text: 'Ocorreu um error, tente novamente',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "../pages/tela_de_perfil.php";
                    }
                })
            </script>
    <?php }
    } ?>
    </div>

        <br><br>
        <br><br>


    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>