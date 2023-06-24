<!DOCTYPE html>
<html lang="pt-br">
<?php 
session_start();?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="../img/logo-ConversImagem.ico"/>
    <link rel="stylesheet" href="../style/termos_de_uso.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Termos de Uso</title>

    <style>
        <?php include '../css/navbar.css'; ?>
        <?php include '../css/footer.css'; ?>
    </style>

</head>
<body>
    <?php include '../navbar.php'; ?>

    <section class="content wrapper">
        <div class="atalhos">
            <div class="links">
            <a href="../index.php">Página Inicial > </a>
                <a href="#Informações">Informações > </a>
                <a href="#Contato">Contato </a>
            </div>
        </div>

        <div id="Informações:" class="wrapper" >
            <div class="box">
                <div class="description">
                    <div class="item">
                        <h2 class="title">Bem-vindo ao e-space - Sistema de Aluguel de Espaço para Eventos!</h2>
                        <h3 class="subTitle">Informações:</h3>
                    </div>
                    <div class="item">
                        <h6 class="subTitle">1.Sobre o e-space:</h6>
                        <p>
                        <strong>1.1</strong> O e-space é um sistema online que permite a locação de espaços para a realização de eventos diversos. Oferecemos uma ampla variedade de espaços, incluindo salões de festas, auditórios, áreas ao ar livre e muito mais. Com o e-space, você pode encontrar o local perfeito para o seu evento e realizar reservas de forma rápida e fácil.</p>
                    </div>
                    <div class="item">
                        <h6 class="subTitle">2.Nossos serviços:</h6>
                        <p>
                        <strong>2.1</strong>
                        Nosso sistema simplifica o processo de reserva. Basta seguir três passos simples: pesquisar, selecionar e reservar. Utilize nossos filtros de pesquisa para encontrar espaços com base na localização, capacidade, tipo de evento e outras preferências. Visualize os detalhes dos espaços, incluindo fotos, descrição, comodidades e disponibilidade. Após escolher o espaço ideal, basta selecionar as datas desejadas e fazer a reserva. Forneceremos todas as informações necessárias para garantir que seu evento seja um sucesso.
                        <h6 class="subTitle">3.Preços e políticas de pagamento:</h6>
                        <p>
                        <strong>3.1</strong>
                        Nossos preços de aluguel são competitivos e variam de acordo com o tipo de espaço e sua localização. Oferecemos opções flexíveis de pagamento, como depósitos e parcelamentos, para atender às suas necessidades. Certifique-se de ler nossas políticas de pagamento para obter detalhes adicionais sobre reembolsos, taxas adicionais e políticas de cancelamento.
                        </p>
                        <h6 class="subTitle">4.Requisitos e restrições:</h6>
                        <p>
                        <strong>4.1</strong>
                        Para alugar um espaço através do e-space, é importante observar alguns requisitos e restrições. Alguns espaços podem ter uma idade mínima exigida ou solicitar documentação específica. Certifique-se de revisar as informações do espaço antes de fazer sua reserva. Além disso, nossas políticas de cancelamento e reembolso podem variar de acordo com cada espaço. Recomendamos ler atentamente as políticas individuais de cada local antes de finalizar sua reserva.
                        </p>
                </div>
            </div>
        </div>

        <div id="Contato" class="wrapper" >
            <div class="box">
                <div class="description">
                    <div class="item">
                        <h4>Contato:</h4>
                    </div>

                    <div class="item">
                        <p><strong>Estamos aqui para ajudar! Se você tiver alguma dúvida, precisar de suporte ou quiser mais informações, entre em contato conosco através dos seguintes canais:</strong></p>
                        <ul>
                            <li> Telefone: (75) 99101-6263
                            </li>
                            <li> E-mail: e-space.contato@outlook.com
                            </li>
                            <li>
                            Formulário de contato: [Inserir link para formulário de contato online]
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