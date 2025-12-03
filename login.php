<?php
session_start();

// Минимальный пример: логин и пароль "admin" / "1234"
$correctLogin = "admin";
$correctPassword = "3nIg4FxFzHNj9BeyKe5jQaumF3KQGX";

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if ($login === $correctLogin && $password === $correctPassword) {
    $_SESSION['auth'] = true;
    echo "OK";
} else {
    echo "FAIL";
}
