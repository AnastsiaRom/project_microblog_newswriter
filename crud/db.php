<?php
$host = 'localhost'; // имя хоста 
$dbuser = 'root'; // имя пользователя
$dbpasswd = 'root'; // пароль пользователя
$database = 'newswriter_bd'; // имя базы данных
$db_table = "crud_post"; // Имя Таблицы БД

 // устанавливаем соединение с базой данных

try {
    $pdo = new PDO('mysql:host=localhost; dbname=newswriter_bd', $dbuser, $dbpasswd);
} catch (PDOException $e) {
    echo 'Ошибка соединения с БДшкой ' .$e->getMessage();
}

?>