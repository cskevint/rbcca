<?php
require_once("oauth.config.php");
$user_id = 1;
require_once("oauth-php/library/OAuthStore.php");
require_once("oauth-php/library/OAuthRequester.php");
require_once("oauth-php/library/OAuthException2.php");

global $key, $secret, $endpoint, $site_full_url;

$options = array(
    'consumer_key' => $key,
    'consumer_secret' => $secret,
    'server_uri' => $endpoint,
    'signature_methods' => array('HMAC-SHA1'),
    'request_token_uri' => $endpoint . 'oauth/request_token/',
    'authorize_uri' => $endpoint . 'oauth/authorize/?oauth_token=',
    'access_token_uri' => $endpoint . 'oauth/access_token/',
    'callback_uri' => 'oauth_callback=/something/'
);

$store = OAuthStore::instance('Session', $options);

function auth_redirect()
{
    global $key, $user_id, $site_full_url;
    $callback_uri = $site_full_url . 'oauth.php&scope=user';
    $token = OAuthRequester::requestRequestToken($key, $user_id, $params = 'oauth_callback=' . $callback_uri);
    $_SESSION['token'] = $token['token'];
    $redirect_to = $token['authorize_uri'] . rawurlencode($token['token']);
    $time = time();
    $redirect_to .= '&scope=user';
    $redirect_to .= '&oauth_timestamp=' . $time;
    header("Location: " . $redirect_to);
    die();
}

function callback()
{
    global $key, $endpoint, $site_full_url;
    $token = $_SESSION['token'];
    $verifier = $_GET['oauth_verifier'];
    $options = array('oauth_verifier' => $verifier, 'scope' => 'user');
    OAuthRequester::requestAccessToken($key, $token, 1, 'POST', $options);
    $user_info = $endpoint . 'protected/user/';
//    $params = array(
//        'oauth_token' => $_SESSION['oauth_' . $key]['token']
//    );
    $req = new OAuthRequester($user_info, 'GET');
    $result = $req->doRequest('oauth_' . $key);
    $info = json_decode($result['body']);
    $_SESSION['first_name'] = $info->first_name;
    $_SESSION['last_name'] = $info->last_name;
    $_SESSION['unity_token'] = $info->unity_token;
    header("Location: " . $site_full_url);
}

function auth_logout()
{
    global $endpoint, $site_full_url;
    $token = $_SESSION['token'];
    $logout = $endpoint . 'protected/oauth_logout/?oauth_token=' . $token;
    $ch = curl_init($logout);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    $header = array("oauth-token: {$token}");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_exec($ch);
    curl_close($ch);
    session_destroy();
    header("Location: " . $site_full_url);
    die();
}

if (isset($_REQUEST['auth_redirect'])) {
    auth_redirect();
} else if (isset($_REQUEST['oauth_verifier'])) {
    callback();
} else if (isset($_REQUEST['auth_logout'])) {
    auth_logout();
}
?>
