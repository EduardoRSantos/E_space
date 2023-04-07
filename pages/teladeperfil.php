<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
<style>
    body{ 
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg, #5398BE,#5623A9);
    }
    .box{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        width: 40%;
    }
    fieldset{
        
    }
    .inputUser{
        background: none;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        color: white;
        font-size: 15px;
    }


</style>
</head>
<body>
    <div class="box">
        <form action="">
            <fieldset>
                <legend><b>Perfil</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome">Nome Completo</Label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email">E-mail</Label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone">Telefone</Label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha">Senha</Label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="Masculino" name="genero" value="Masculino" required>
                <label for="Masculino">Masculino</label>
                <input type="radio" id="outros" name="genero" value="outros" required>
                <label for="outros">Outros</label>
                <div class="inputBox">
                <br>
                    <input type="date" name="datanascimento" id="datanascimento" class="inputUser" required>
                    <label for="datanascimento">Data de Nascimento</Label>
                </div>
                <br>
                <input type ="submit" name="submit" id="submit" value="botao">
            </fieldset>
        </form>
    </div>
</body>
</html>

