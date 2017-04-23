<?php session_destroy(); 
$params = session_get_cookie_params();
setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
?>

<script>window.location.href = "../pages/index.php";</script>