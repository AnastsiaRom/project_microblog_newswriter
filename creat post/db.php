<?php
    $dblocation = 'localhost'; // имя хоста 
    $dbuser = 'root'; // имя пользователя
    $dbpasswd = 'root'; // пароль пользователя
    $database = 'newswriter_bd'; // имя базы данных
    $db_table = "crud_post"; // Имя Таблицы БД


    // устанавливаем соединение с базой данных 

    $link = new mysqli('localhost', 'root', 'root', 'newswriter_bd');
    mysqli_select_db($link, $database) or die ('Не могу выбрать БД');

    $link->set_charset("utf8");
?>