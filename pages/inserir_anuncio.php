<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>Inserir Anúncio</title>
    <style>
        <?php include '../css/style.css'; ?>
    </style>
</head>

<body>
    <section class="s">
        <h1>Inserir Anúncio</h1>
        <form method="POST">
            <!-- <div id="divid">
                <input type="file" name="" id="img1" placeholder="O melhor e-mail" required>
                <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
                <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
                <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
                <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
                <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
                <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
                <input type="file" name="" id="email_usuario" placeholder="O melhor e-mail" required>
            </div> -->
            <div class="preco">
                <input type="number" placeholder="Preço R$" name="preco" id="preco" class="inputUser" required>
                <label for="preco"></Label>
            </div>
            <div class="container">
                <input type="text" placeholder="Titulo" name="titulo" id="titulo" class="inputUser" required>
                <label for="titulo"></Label>
            </div>
            <div class="container">
                <input type="text" placeholder="localizacão" name="localizacao" id="localizacao" class="inputUser" required>
                <label for="localizacao"></Label>
            </div>
            <div class="cep">
                <input type="number" placeholder="cep" name="cep" id="cep" class="inputUser" required>
                <label for="cep"></Label>
            </div>
            <div class="tel">
                <input type="number" placeholder="Número" name="number" id="numero" class="inputUser" required>
                <label for="numero"></Label>
            </div>
            <div class="info">
                <input type="text" placeholder="info" name="descricao" id="info" class="inputUser" required>
                <label for="info"></Label>
            </div>
            <div class="quant">
                <input type="number" placeholder="quantpessoas" name="quantidadedepessoas" id="quantidadedepessoas" class="inputUser" required>
                <label for="quantidadedepessoas"></Label>
            </div>




            <input type="submit" name="submit" id="buttonanuncio" value="Anunciar">
        </form>
    </section>
    <section>

    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<?php


if (!empty($_SESSION)) {
    if (!empty($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $cep = $_POST['cep'];
        $body = [
            'id_usuario' => $_SESSION['id'],
            'titulo' => $titulo,
            'descricao' => $descricao,
            'preco' => $preco,
            'cep' => $cep
        ];

        $json = json_encode($body);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/E_space/routes/index.php/cadastrar/anuncios',
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ]);

        curl_exec($curl);

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($http_code == 200) { ?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Sucesso',
                    text: 'Anuncio postado',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "../index.php";
                    }
                })
            </script>
        <?php } else { ?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Ops!',
                    text: 'Erro ao salvar, tente novamente',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "../pages/inserir_anuncio.php";
                    }
                })
            </script>
    <?php }
    }
} else { ?>

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

</html>