<?php
session_start();

$config = require __DIR__ . "/../secure/config.php";  

$correctLogin = $config["login"];
$correctHash  = $config["password_hash"];

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if ($login === $correctLogin && password_verify($password, $correctHash)) {
    $_SESSION['auth'] = true;
    echo "OK";
} else {
    echo "FAIL";
}
