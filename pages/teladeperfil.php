<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Makaan - Real Estate HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
<style>
#submit{
    background-color: rgb(255, 255, 255);
    border: none;
    padding: 10px;
    width: 30%;
    border-radius: 10px;
}
#perfil{
    background-color: #1C1C1C;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 40px;
    border-radius: 10px;
    color: white;
}
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
#nome{
border-radius: 10px;
border: none;
padding: 10px;
width: 50%;
}
#email{
border-radius: 10px;
border: none;
padding: 10px;
width: 50%;
}
#telefone{
border-radius: 10px;
border: none;
padding: 10px;
width: 50%;
}
#senha{
border-radius: 10px;
border: none;
padding: 10px;
width: 50%;
}
#datanascimento{
border-radius: 10px;
border: none;
padding: 10px;
width: 30%;
}
</style>
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

