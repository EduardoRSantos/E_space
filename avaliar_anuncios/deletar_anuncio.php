<?php

var_dump($_POST['id']);

if (isset($_POST['id'])) {
    $avaliacao = $_POST['avaliacao'];
    $id = $_POST['id'];

    $body = [
        'id' => $id,
        'avaliacao' => $avaliacao
    ];

    $json = json_encode($body, true);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'http://localhost/E_space/routes/index.php/anuncios/delete',
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $json,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json'
        ]
    ]);

    curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);


    curl_close($curl);

    if ($http_code != 404) { ?>
        <script type="text/javascript">
            location.href = "../avaliar_anuncios/anuncios_postados"
        </script>
<?php }
} ?>