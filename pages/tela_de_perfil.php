

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
    <style>
           <?php include '../css/navbar.css'; ?>
    </style>
</head>

<body>
<?php include '../navbar.php';?>
    <?php if (!empty($_SESSION)) { ?>
        <div class="formulario-de-dados wrapper" >
            <h2 class="titulo wrapper">Dados cadastrados</h2>

            <div class="tela-perfil">
     
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
            </div>
            <hr>
<br>
            <h2 class="titulo wrapper">Editar dados</h2>
            
            <div class="editar-foto">
            <br>
                <form  class="file"  method="POST" enctype="multipart/form-data">
                <label class="mudar-nome" for="nome"><strong>Editar foto do perfil</strong></Label>
                
                    <div class="file">      
                        <input  type="file" name="imagem">
                        <br>
                        <input  class="salvar" type="submit" name="submit" id="submit" value="Salvar Foto">
                    </div>
            
                </form>
                <br>
            

             
               
                <form class="editar-dados" method="POST">
                    <br>
                    <div class="dados">
                        <label for="nome"><strong>Nome Completo</strong></Label>
                        <br>
                        <input type="text" name="nome" id="nome" value="<?= $_SESSION['nome'] ?>" required>
                    </div>
                    <br>
                    <div class="dados">
                        <label for="telefone"><strong>Telefone</strong></Label>
                        <br>
                        <input type="text" name="telefone" id="telefone" value="<?= $_SESSION['telefone'] ?>" required>
                    </div>
                    <br>
                    <div class="salvar-dados" >
                    <input class="salvar" type="submit" name="submit" id="submit" value="Salvar">
                    </div>
            
                </form>
                
                <br>
                <hr>
                <br>
                
                <form class="sair-tela" action="sair.php" method="post">
                    <input type="submit" value="Sair">
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
            if ($http_code == 403){ ?>
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

</body>

</html>