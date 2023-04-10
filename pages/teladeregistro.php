<!DOCTYPE html>
<html lang="en">
<head>
<style>
#nascimento{
  border-radius: 10px;
  border: none;
  padding: 15px;
  width: 48%;
}
#nome{
  border-radius: 10px;
  border: none;
  padding: 15px;
  width: 85%;
}
#email{
  border-radius: 10px;
  border: none;
  padding: 15px;
  width: 85%;
}
#senha{
  border-radius: 10px;
  border: none;
  padding: 15px;
  width: 85%;
}
#submit{
  background-color: rgb(255, 255, 255);
  border: none;
  padding: 15px;
  width: 100%;
  border-radius: 10px;
}
button{
    background-color: rgb(255, 255, 255);
    border: none;
    padding: 15px;
    width: 100%;
    border-radius: 10px;
}
.nickpassword{
    padding: 15px;
    border-radius: 10px;
}
#teladeperfil{
    background-color: rgb(0, 0, 0);
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 40px;
    border-radius: 10px;
    color: white;
}
#perfil {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(45deg, #5398BE,#5623A9);

  }
  .imagem-perfil {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-top: 20px;
  }
  .nome {
    font-size: 24px;
    font-weight: bold;
    margin-top: 20px;
  }
  .informacoes {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    width: 80%;
    margin-top: 20px;
  }
  .informacoes p {
    font-size: 18px;
  }
.back-to-top {
    position: fixed;
    display: none;
    right: 45px;
    bottom: 45px;
    z-index: 99;
}
</style>
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
</head>
<body  id="perfil">
    <div class="container" id="teladeperfil">
    <form method="POST">
        <div class="form-image">
        <h2>Registra-se</h2>
        <div class="inputBox">
              <input type="text" placeholder="Nome Completo" name="nome" id="nome" class="inputUser" required>
              <label for="nome"></Label>   
        </div>
        <br>
        <div class="inputBox">
              <input type="email" placeholder="E-mail" name="email" id="email" class="inputUser" required>
              <label for="email"></Label>
        </div>
        <br>
        <div class="inputBox">
              <input type="password" placeholder="Senha" name="senha" id="senha" class="inputUser" required>
              <label for="senha"></Label>
        </div>
        <br>
        <div class="inputBox">
              <input type="password" placeholder="Senha" name="senha" id="senha" class="inputUser" required>
              <label for="senha"></Label>
              <br>
              <label for="birthday"></label>
              <input type="date" id="nascimento" name="nascimento">
        </div>
        <br>
        <input type ="submit" name="submit" id="submit" value="Registrar">
        </form>
      </div>
</nav>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>
</body>
</html>