<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body id="body">
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
            <div class="inputBox">
                <label for="senha">Senha</Label>
                <br>
                <label for="senha">***************</Label>
            </div>
            <br>
            </fieldset>
        </form>
    </div>
    <div class="box" id="perfil">
        <form method="POST">
            <h2>Perfil</h2>
            <br>
            <div class="inputBox">
                <label for="nome">Nome Completo</Label>
                <br>
                <input type="text" name="nome" id="nome" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="email">E-mail</Label>
                <br>
                <input type="email" name="email" id="email" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="telefone">Telefone</Label>
                <br>
                <input type="tel" name="telefone" id="telefone" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="senha">Senha</Label>
                <br>
                <input type="password" name="senha" id="senha" required>
            </div>
            <br>
            <input type="submit" name="submit" id="submit" value="Salvar">
            </fieldset>
        </form>
    </div>
</body>
</html>