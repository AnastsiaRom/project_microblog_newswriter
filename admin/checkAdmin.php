<?php 

$email = $_COOKIE['user']; // Удаляет все лишнее и записываем значение в переменную //$login

    $mysql = new mysqli("localhost", "root", "root", "newswriter_bd");
    if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
    }
    $user = mysqli_fetch_row($result);
?>