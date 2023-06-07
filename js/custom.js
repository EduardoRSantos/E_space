const loginForm = document.getElementById("login-usuario-form");
const msgAlertErroLogin = document.getElementById("msgAlertErroLogin");
const loginModal = new bootstrap.Modal(document.getElementById("loginModal"));

loginForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  if (document.getElementById("email").value === "") {
    msgAlertErroLogin.innerHTML =
      "<div class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo usuário!</div>";
  } else if (document.getElementById("senha").value === "") {
    msgAlertErroLogin.innerHTML =
      "<div class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo usuário!</div>";
  } else {
    const dadosForm = new FormData(loginForm);

    const dados = await fetch("validar.php", {
      method: "POST",
      body: dadosForm,
    });

    const resposta = await dados.json();

    if (resposta["erro"]) {
      msgAlertErroLogin.innerHTML = resposta["msg"];
    } else {
      document.getElementById("dados-usuario").innerHTML =
        "Bem-vindo " + resposta["dados"].nome + "<br>";
      loginForm.reset();
      loginModal.hide();
    }
  }
});



function verificaForcaSenha() 
{
	var numeros = /([0-9])/;
	var alfabeto = /([a-zA-Z])/;
	var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

	if($('#senha').val().length<6) 
	{
		$('#password-status').html("<span style='color:red'>Fraco, insira no mínimo 6 caracteres</span>");
	} else {  	
		if($('#senha').val().match(numeros) && $('#senha').val().match(alfabeto) && $('#senha').val().match(chEspeciais))
		{            
			$('#password-status').html("<span style='color:green'><b>Forte</b></span>");
		} else {
			$('#password-status').html("<span style='color:orange'>Médio, insira um caracter especial</span>");
		}
	}
} 