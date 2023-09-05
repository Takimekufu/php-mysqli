<?php

$host = '127.0.0.1';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}