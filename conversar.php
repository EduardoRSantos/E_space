<?php 

$phoneNumber = $_POST['telefone'];


function getWhatsAppLink($phone, $message) {
    // Remova todos os caracteres que não sejam números do número de telefone
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // Verifique se o número começa com um código de país. Caso contrário, adicione o código do país padrão.
    $countryCode = '55'; // Código do Brasil
    if (substr($phone, 0, strlen($countryCode)) != $countryCode) {
        $phone = $countryCode . $phone;
    }
    
    // Codifique o número de telefone e a mensagem para uso na URL
    $phone = urlencode($phone);
    $message = urlencode($message);
    
    // Construa o link de convite do WhatsApp
    $link = "https://wa.me/{$phone}?text={$message}";
    
    return $link;
}

$message = 'Olá!, venho pela E-space, podemos conversar mais sobre o anúncio?'; // Mensagem inicial (opcional)

$whatsAppLink = getWhatsAppLink($phoneNumber, $message);

// Redirecionar para o link do WhatsApp
header("Location: $whatsAppLink");
exit;

?>