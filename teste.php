<?php

        $servername = getenv('E_SPACE_PORT'); // Nome do servidor MySQL (padrão: localhost)
        $username = getenv('E_SPACE_USER'); // Nome de usuário do MySQL
        $password = getenv('E_SPACE_PASSWORD'); // Senha do MySQL
        $dbname = getenv('E_SPACE_DBNAME'); // Nome do banco de dados
        $port = getenv('E_SPACE_PORT'); // Número da porta do MySQL
        
        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname, $port);
        
        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

// Executa uma consulta (exemplo)
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Percorre os dados retornados
    while ($row = $result->fetch_assoc()) {
        echo "Campo1: " . $row["id"] . ", Campo2: " . $row["nome"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão
$conn->close();