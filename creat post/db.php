<?php 

    $dblocation = 'localhost'; // имя хоста 
    $dbuser = 'root'; // имя пользователя
    $dbpasswd = 'root'; // пароль пользователя
    $database = 'reviews'; // имя базы данных
    $db_table = "reviews"; // Имя Таблицы БД


    // устанавливаем соединение с базой данных 

    $link = mysqli_connect($dblocation, $dbuser, $dbpasswd, $database) or die("Не могу подключиться");  
    mysqli_select_db($link, $database) or die ('Не могу выбрать БД');

    //установка кодировки
    $link->set_charset("utf8");
?>