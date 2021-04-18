<?php
$host = 'localhost'; // имя хоста 
$db_user = 'root'; // имя пользователя
$db_passwd = 'root'; // пароль пользователя
$database = 'newswriter_bd'; // имя базы данных
$db_table = "crud_post"; // Имя Таблицы БД

 // устанавливаем соединение с базой данных 

try {
    $pdo = new PDO('mysql:host=localhost; dbname=newswriter_bd', $db_user, $db_passwd);
} catch (PDOException $e) {
    echo 'Ошибка соединения с БДшкой ' .$e->getMessage();
}

?>