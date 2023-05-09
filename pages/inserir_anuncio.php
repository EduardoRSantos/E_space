<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/imagens.js"></script>
    <title>Inserir Anúncio</title>
    <style>
        <?php include '../css/style_tela_inserir_anuncio.css'; ?>
        <?php include '../css/navbar.css'; ?>
    </style>
</head>

<body>
    <?php include '../navbar.php'; ?>
    <section class="estrutura_da_tela ">
        <h1 class="titulo">Inserir Anúncio</h1>
        <form class="form wrapper" method="POST" enctype="multipart/form-data">
            <div class="inserir-imagem">
                <label for="images">Adicionar Fotos</label>
                <input  accept="image/png, image/jpeg"  class="inputUserArquivos" type="file" id="images" name="imagens[]" multiple onchange="previewImages(this);"  required>
                <div  id="preview"></div>
            </div>
            <div class="campotexto">
                <input type="text" placeholder="Título" name="titulo" id="titulo" class="inputUser" required>
                <label for="titulo"></Label>
            </div>
            <div class="campotexto ">
                <input  type="number" placeholder=" R$" name="preco" id="preco" class="inputUser" required>
                <label for="preco"></Label>
            </div>
            <div class="campotexto">
                <input type="text" placeholder="Localização" name="localizacao" id="localizacao" class="inputUser" required>
                <label for="localizacao"></Label>
            </div>
            <div class="campotexto">
                <input type="text" placeholder="Cep" name="cep" id="cep" class="inputUser" required>
                <label for="cep"></Label>
            </div>
            <div class="campotexto">
                <input type="number" placeholder=" Número" name="numero" id="numero" class="inputUser" required>
                <label for="numero"></Label>
            </div>
            <div class="campotexto">
                <input type="number" placeholder=" Pessoas" name="quantidade_pessoas" id="quantidadedepessoas" class="inputUser" required>
                <label for="quantidadedepessoas"></Label>
            </div>
            <div class="campotexto">
                <input class="descricao" type="text" placeholder="Descricao" name="descricao" id="info" required>
                <label for="info"></Label>
            </div>
            <input class="anunciar" type="submit" name="submit" id="button_anuncio" value="Anunciar">
        </form>
    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/mascaras.js"></script>
    <script src="../js/js.js"></script>
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

        $anuncio = [
            'id_usuario' => $_SESSION['id'],
            'titulo' => $titulo,
            'descricao' => $descricao,
            'preco' => $preco,
            'localizacao' => $localizacao,
            'cep' => $cep,
            'numero' => $numero,
            'quantidade_pessoas' => $quantidade_pessoas
        ];

        $body = [
            0 => $anuncio
        ];

        $imagens = $_FILES['imagens'];
        foreach ($imagens['name'] as $index => $imagem) {

            $nome_imagen = $imagens['name'][$index];
            $novo_nome_imagem = uniqid();
            $extensao = strtolower(pathinfo($nome_imagen, PATHINFO_EXTENSION));
            $href_imagen_mover = "../imagens/$novo_nome_imagem.$extensao";
            $href_imagen_upa = "./imagens/$novo_nome_imagem.$extensao";
            $verify = move_uploaded_file($imagens['tmp_name'][$index], $href_imagen_mover);
            $body["imagem" . $index + 1] = $href_imagen_upa;
        }

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
                    text: 'Em breve seu anuncio sera avaliado e postado, Obrigado!',
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