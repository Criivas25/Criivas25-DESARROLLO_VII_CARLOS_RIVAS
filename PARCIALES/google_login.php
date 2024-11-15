<?php

session_start();
require_once 'vendor/autoload.php';


// Configura el cliente de Google OAuth
$client = new Google_Client();
$client->setClientId('');
$client->setClientSecret('');
$client->setRedirectUri('');
$client->addScope([
    'https://www.googleapis.com/auth/books',
    'https://www.googleapis.com/auth/userinfo.profile',
    'https://www.googleapis.com/auth/userinfo.email'
]);

// Verifica si ya tenemos un código de autorización
if (isset($_GET['code'])) {
    // Si recibimos el código de autorización, lo intercambiamos por un token de acceso
    try {
        $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        // Guardamos el token de acceso en la sesión para usarlo más tarde
        $_SESSION['access_token'] = $accessToken;

        // Redirigimos al usuario a la misma página sin el código de autorización
        header('Location: ' . filter_var($client->getRedirectUri(), FILTER_SANITIZE_URL));
        exit();
    } catch (Exception $e) {
        // Error al intercambiar el código por un token
        echo 'Error al obtener el token de acceso: ' . $e->getMessage();
        exit();
    }
}

// Verifica si ya tenemos un token de acceso almacenado en la sesión
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);

    // Si el token está caducado, solicitamos uno nuevo
    if ($client->isAccessTokenExpired()) {
        unset($_SESSION['access_token']);
        header('Location: ' . filter_var($client->createAuthUrl(), FILTER_SANITIZE_URL));
        exit();
    }

    // Si tenemos un token válido, podemos hacer solicitudes a la API
    $service = new Google_Service_Books($client);
    $results = $service->volumes->listVolumes('narnia');
    echo '<pre>';
    print_r($results);
    echo '</pre>';
} else {
    // Si no tenemos un token, redirigimos al usuario para que inicie sesión
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit();
}
?>

