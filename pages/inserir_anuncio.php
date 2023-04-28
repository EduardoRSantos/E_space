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
    <h1 class="inserir">Inserir Anúncios</h1>
    <form  method="post">
 
  <div>
    <label for="imagem">Selecione uma imagem:</label>
    <input type="file" id="imagem" name="imagem">
  </div>
  <div>
    <label for="titulo">Título do Anúncio:</label>
    <input type="text" id="titulo" name="titulo">
  </div>
  <div>
    <label for="preco">Preço:</label>
    <input type="text" id="preco" name="preco">
  </div>
  <div>
    <label for="localizacao">Localização:</label>
    <input type="text" id="localizacao" name="localizacao">
  </div>
  <div>
    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep">
  </div>
  <div>
    <label for="numero">Número de telefone:</label>
    <input type="text" id="numero" name="numero">
  </div>
  <button type="submit">Enviar</button>
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