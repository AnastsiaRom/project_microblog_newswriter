<?php 

$login = $_COOKIE['user']; // Удаляет все лишнее и записываем значение в переменную //$login

    $mysql = new mysqli("localhost", "root", "root", "register-bd");
    if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
    }

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' ");
    $user = mysqli_fetch_row($result);
    if($user[4] == "Admin")
    {
        return true;
    }
    else {
        return false;
    }

?>