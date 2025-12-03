<?php
session_start();

if (empty($_SESSION['auth'])) {
    header("Location: login.html");
    exit;
}

readfile("index.html");
