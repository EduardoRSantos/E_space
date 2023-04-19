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
    <?php if (isset($_SESSION)) { ?>
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
    <?php }else { ?>
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
    <form action="salvar_imagem.php" method="post" enctype="multipart/form-data">
    <input type="file" name="imagem">
    <input type="submit" value="Enviar">
    </form>
        <!-- <form method="POST" enctype="multipart/form-data">
            <h2>Perfil</h2>
            <br>
            <div class="inputBox">
                <label for="nome">Imagem perfil</Label>
                <br>
                <input type="file" name="imagem" id="img1" placeholder="O melhor e-mail" required>
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
                <input type="tel" name="telefone" id="telefone" required>
            </div>
            <br>
            <br>
            <input type="submit" name="submit" id="submit" value="Salvar">
            </fieldset>
        </form> -->
    </div>
    
</body>
</html>