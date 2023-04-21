<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/mascaras.js"></script>
</head>

<body id="body">
    <?php if (!empty($_SESSION)) { ?>
        <div class="box" id="perfil">
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
        </div>
        <div class="box" id="perfil">
            <form method="POST" enctype="multipart/form-data">
                <h2>Perfil</h2>
                <br>
                <div class="inputBox">
                    <input type="file" name="imagem">
                </div>
                <input type="submit" name="submit" id="submit" value="Salvar">
            </form>

            <form method="POST">
                <br>
                <div class="inputBox">
                    <label for="nome">Nome Completo</Label>
                    <br>
                    <input type="text" name="nome" id="nome" value="<?= $_SESSION['nome'] ?>" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="telefone">Telefone</Label>
                    <br>
                    <input type="text" name="telefone" id="telefone" value="<?= $_SESSION['telefone'] ?>" required>
                </div>
                <br>
                <br>
                <input type="submit" name="submit" id="submit" value="Salvar">
            </form>

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

            if ($http_code == 200)
                echo "ok";

            if ($http_code == 403)
                echo "ruim";
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

        if ($http_code == 200)
            $_SESSION['nome'] = $nome;
        $_SESSION['telefone'] = $telefone;
        echo "ok2";

        if ($http_code == 403)
            echo "ruim2";
    }

        ?>
        </div>

</body>

</html>