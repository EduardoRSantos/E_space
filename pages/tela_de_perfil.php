<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="body">
    <?php if (!empty($_SESSION)) { ?>
        <div class="box" id="perfil">
            <form method="POST">
                <h2>Perfil</h2>
                <br>
                <div class="inputBox">
                    <label for="nome">Nome Completo</Label>
                    <br>
                    <label for="nome"><?= $_SESSION['nome'] ?></Label>
                </div>
                <br>
                <div class="inputBox">
                    <label for="email">E-mail</Label>
                    <br>
                    <label for="email"><?= $_SESSION['email'] ?></Label>
                </div>
                <br>
                <div class="inputBox">
                    <label for="telefone">Telefone</Label>
                    <br>
                    <label for="telefone"><?= $_SESSION['telefone'] ?></Label>
                </div>
                <br>
                <br>
                </fieldset>
            </form>
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
    <?php } ?>
    <div class="box" id="perfil">
        <form method="POST" enctype="multipart/form-data">
            <h2>Perfil</h2>
            <br>
            <div class="inputBox">
            <input type="file" name="imagem">
            </div>
            <br>
            <div class="inputBox">
                <label for="nome">Nome Completo</Label>
                <br>
                <input type="text" name="nome" id="nome" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="telefone">Telefone</Label>
                <br>
                <input type="text" name="telefone" id="telefone" required>
            </div>
            <br>
            <br>
            <input type="submit" name="submit" id="submit" value="Salvar">
        </form>
        <?php

        if (!empty($_POST['nome'])) {

            $arquivo = $_FILES["imagem"];
            $pasta = "../imagens/";
            $nome_imagen = $arquivo["name"];
            $novo_nome_imagem = uniqid();
            $extensao = strtolower(pathinfo($nome_imagen, PATHINFO_EXTENSION));
            $href_imagen_mover = "$pasta$novo_nome_imagem.$extensao";
            $href_imagen_upa = "./imagens/$novo_nome_imagem.$extensao";
            $verify = move_uploaded_file($arquivo["tmp_name"], $href_imagen_mover);

            if ($verify) {
                $nome = $_POST["nome"];
                $telefone = $_POST["telefone"];
                $id = $_SESSION["id"];

                $body = [
                    'referencia_imagen' => $href_imagen_upa,
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

                if($http_code == 200)
                    $_SESSION['nome'] = $nome;
                    $_SESSION['telefone'] = $telefone;
                    echo "boa";

                if($http_code == 403)
                    echo "ruim";
            }
        }

        ?>
    </div>

</body>

</html>