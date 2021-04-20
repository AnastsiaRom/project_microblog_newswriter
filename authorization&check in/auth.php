<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

session_start();
require "blocks/correct.php";

$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
$user = mysqli_fetch_row($result);

if($user != null){
    $_SESSION['auth'] = true;

	setcookie("user", $user[2], time() + 3600, "/"); //Создаём куки
	setcookie("users", $user[1], time() + 3600, "/"); //Создаём куки
    $name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$mysql->close();
	header('Location: /Микроблог Newswriter/admin/index.php');
}
else{
    echo"<b><center><font size=4 color=red>Такого пользователя нет</font></center></b>";
}
?>