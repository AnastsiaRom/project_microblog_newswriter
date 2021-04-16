<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

session_start();
require "blocks/correct.php";

$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
$user = mysqli_fetch_row($result);

if($user == null){
	echo "Такого пользователя нет";
}
else{
	setcookie("user", $user[3], time() + 3600, "/"); //Создаём куки
	echo $_SESSION['name'] = $name;
	$mysql->close();
	header('Location: /Микроблог Newswriter/admin/index.php');
}
?>