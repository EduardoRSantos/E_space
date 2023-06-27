<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico" />
    <link rel="stylesheet" href="../style/termos_de_uso.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Termos de Uso</title>

    <style>
        <?php include '../css/navbar.css'; ?><?php include '../css/footer.css'; ?>
    </style>

</head>

<body>
    <?php include '../navbar.php'; ?>

    <section class="content wrapper">
        <div class="atalhos">
            <div class="links">
                <a href="../">Página Inicial > </a>
                <a href="#mapasDoSite">Mapas do site</a>
            </div>
        </div>


        <div id="mapasDoSite" class="wrapper">
            <div class="box">
                <div class="description">
                    <div class="item">
                        <h2>Mapa do site</h2>
                    </div>

                    <div class="item">
                        <ul>
                            <li>Página inicial: Apresentação do e-space e visão geral do sistema.
                            </li>
                            <li> Pesquisa de espaços: Ferramenta de pesquisa para encontrar espaços disponíveis com base em critérios como localização, capacidade e tipo de evento.
                            </li>
                            <li>
                                Detalhes do espaço: Páginas individuais para cada espaço disponível, com informações detalhadas, fotos, descrição, comodidades, disponibilidade e preço.
                            </li>
                            <li>
                                Processo de reserva: Guia passo a passo sobre como reservar um espaço, incluindo a seleção de datas, horários e número de convidados.
                            </li>
                            <li>
                                Políticas e termos: Informações sobre as políticas de reserva, cancelamento, reembolso e termos de uso do sistema.
                            </li>
                            <li>Contato e suporte: Informações de contato para suporte ao cliente, perguntas frequentes e possíveis canais de suporte, como chat ao vivo ou suporte por telefone.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>




    <?php include '../footer.php'; ?>
</body>

</html>