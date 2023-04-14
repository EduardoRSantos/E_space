<!DOCTYPE html>
<html lang="en">
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
                    <input type="text" name="nome" id="nome" required> 
                </div>
                <br>
                <div class="inputBox">
                    <label for="email">E-mail</Label>
                    <br>
                    <input type="email" name="email" id="email"  required>    
                </div>
                <br>
                <div class="inputBox">
                    <label for="telefone">Telefone</Label>
                    <br>
                    <input type="tel" name="telefone" id="telefone"  required>    
                </div>
                <br>
                <div class="inputBox">
                    <label for="senha">Senha</Label>
                    <br>
                    <input type="password" name="senha" id="senha"  required>  
                </div>
                <p>Sexo
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="Masculino" name="genero" value="Masculino" required>
                <label for="Masculino">Masculino</label>
                <input type="radio" id="outros" name="genero" value="outros" required>
                <label for="outros">Outros</label>
                </p>
                <div class="inputBox">
                     <label for="datanascimento">Data de Nascimento</Label>
                    <br>
                    <input type="date" name="datanascimento" id="datanascimento"  required>
                </div>
                <br>
                <input type ="submit" name="submit" id="submit" value="Salvar">
                <a href="http://localhost/tccatual/tccatual/pages/teladelogin.php"></a>
            </fieldset>
        </form>
    </div>
</body>
</html>