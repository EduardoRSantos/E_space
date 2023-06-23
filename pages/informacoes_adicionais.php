
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
    <title>Inserir Anúncio</title>
    <style>
        <?php include '../css/informacoes_adicionais.css'; ?>
        <?php include '../css/navbar.css'; ?>
    </style>
</head>

<body>
    <?php include '../navbar.php'; ?>
    <main class="wrapper">
		<section class="hero">
			<div class="container">
				<h1>Alugue o espaço perfeito para o seu evento</h1>
				<p>Oferecemos uma ampla variedade de espaços para todos os tipos de eventos. Desde pequenas reuniões até grandes eventos corporativos.</p>
				<a href="#" class="cta-btn">Ver espaços</a>
			</div>
		</section>

		<section class="about">
			<div class="container">
				<h2>Sobre Nós</h2>
				<p>Somos uma empresa especializada em aluguel de espaços para eventos. Nosso objetivo é oferecer espaços incríveis, com o melhor custo-benefício do mercado.</p>
			</div>
		</section>

		<section class="spaces">
  <div class="container">
    <h2>Nossos Espaços</h2>
    <div class="gallery">
      <img src="../img/casa3.jfif" alt="Espaço 1">
      <img src="../img/casa3.jfif" alt="Espaço 2">
      <img src="../img/casa3.jfif" alt="Espaço 3">
      <img src="../img/casa3.jfif" alt="Espaço 4">
    </div>
  </div>
</section>

<section class="services">
  <div class="container">
    <ul>
      <li>
        <h3>Serviços de Decoração</h3>
        <p>Ofereça opções de catering para os eventos realizados nos espaços, seja através de um serviço próprio ou por meio de parcerias com empresas de catering. Isso pode incluir fornecer refeições completas, buffet, coquetéis e opções personalizadas de acordo com as necessidades dos clientes.</p>
      </li>
      <li>
        <h3>Serviços de Audiovisual</h3>
        <p>Forneça serviços de decoração para os eventos, incluindo arranjos florais, iluminação, mobiliário e decoração temática. Isso pode ajudar os clientes a criar a atmosfera desejada e personalizar o espaço de acordo com o tipo de evento.</p>
      </li>
      <li>
        <h3>Coordenação de Eventos</h3>
        <p>Ofereça serviços de áudio, vídeo e iluminação para eventos que exigem equipamentos audiovisuais profissionais. Isso inclui projeção de tela, sistemas de som, iluminação cênica e equipamentos de apresentação para conferências, palestras e eventos corporativos.</p>
      </li>
      <li>
        <h3>Serviço de Catering</h3>
        <p>Proporcione serviços de coordenação de eventos, ajudando os clientes a planejar e executar seus eventos com sucesso. Isso pode envolver a coordenação de fornecedores, gerenciamento de logística, cronograma de eventos e supervisão geral para garantir que tudo ocorra sem problemas.</p>
      </li>
    </ul>
  </div>
</section>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/mascaras.js"></script>
    <script src="../js/js.js"></script>
</body>


</html>