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
        <?php include '../css/style_tela_inserir_anuncio.css'; ?>
    </style>
</head>

<body>
    <section class="estrutura_da_tela">
        <h1>Inserir Anúncio</h1>
        <form method="POST">
            <div id="divid">
                <input type="file" name="" id="img1" placeholder="O melhor e-mail" required>
            </div>
            <div class="container">
                <input type="text" placeholder="Titulo" name="titulo" id="titulo" class="inputUser" required>
                <label for="titulo"></Label>
            </div>
            <div class="info">
                <input type="text" placeholder="Descricao" name="descricao" id="info" class="inputUser" required>
                <label for="info"></Label>
            </div>
            <div class="preco">
                <input type="number" placeholder="Preço R$" name="preco" id="preco" class="inputUser" required>
                <label for="preco"></Label>
            </div>
            <div class="container">
                <input type="text" placeholder="localizacão" name="localizacao" id="localizacao" class="inputUser" required>
                <label for="localizacao"></Label>
            </div>
            <div class="cep">
                <input type="text" placeholder="cep" name="cep" id="cep" class="inputUser" required>
                <label for="cep"></Label>
            </div>
            <div>
                <input type="number" placeholder="Numero" name="numero" id="numero" class="inputUser" required>
                <label for="numero"></Label>
            </div>
            <div class="quant">
                <input type="number" placeholder="quantpessoas" name="quantidade_pessoas" id="quantidadedepessoas" class="inputUser" required>
                <label for="quantidadedepessoas"></Label>
            </div>
            <input type="submit" name="submit" id="button_anuncio" value="Anunciar">
        </form>
    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/mascaras.js"></script>
</body>
<?php


if (!empty($_SESSION)) {
    if (!empty($_POST['titulo'])) {

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $localizacao = $_POST['localizacao'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $quantidade_pessoas = $_POST['quantidade_pessoas'];

        $body = [
            'id_usuario' => $_SESSION['id'],
            'titulo' => $titulo,
            'descricao' => $descricao,
            'preco' => $preco,
            'localizacao' => $localizacao,
            'cep' => $cep,
            'numero' => $numero,
            'quantidade_pessoas' => $quantidade_pessoas
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
        
        curl_close($curl);
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