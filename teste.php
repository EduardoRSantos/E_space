<?php

// $host = "mysql.espace.kinghost.net";
// $port = "3306";
// $user = "espace";
// $pass = "espace2710";
// $dbname = "espace";


// $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

// $pdo = new PDO($dsn, $user, $pass);
// $pdo->setAttribute(
//     \PDO::ATTR_ERRMODE,
//     \PDO::ERRMODE_EXCEPTION
// );

// $user = $pdo
//     ->query("SELECT * FROM usuarios")
//     ->fetchAll(\PDO::FETCH_ASSOC);

// var_dump($user);


//  $host = "127.0.0.1";
//         $port = "3306";
//         $user = "root";
//         $pass = "";
//         $dbname = "e_space";


$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'http://localhost/E_space/routes/index.php/usuarios',
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_RETURNTRANSFER => true,
]);

$response = curl_exec($curl);

$data = json_decode($response, true);

curl_close($curl);

var_dump($data);