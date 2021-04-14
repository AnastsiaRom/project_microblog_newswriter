<?php
$host = 'localhost'; // имя хоста 
$dbuser = 'root'; // имя пользователя
$dbpasswd = 'root'; // пароль пользователя
$database = 'crud1'; // имя базы данных
$db_table = "users_1"; // Имя Таблицы БД

 // устанавливаем соединение с базой данных 

try {
    $pdo = new PDO('mysql:host=localhost; dbname=crud1', $dbuser, $dbpasswd);
} catch (PDOException $e) {
    echo 'Ошибка соединения с БДшкой ' .$e->getMessage();
}

?>