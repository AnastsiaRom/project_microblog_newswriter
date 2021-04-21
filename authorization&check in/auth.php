<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

session_start();
require "blocks/correct.php";

$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
$user = mysqli_fetch_assoc($result);

if($user != null){
    $_SESSION['auth'] = true;
	$_SESSION['id'] =  $user['id_user'];
    $_SESSION['name'] = $user['name'];
	$_SESSION['email'] = $user['email'];
	$mysql->close();
	header('Location: /Микроблог Newswriter/admin/index.php');
}
else{
    echo"<b><center><font size=4 color=red>Такого пользователя нет</font></center></b>";
}
?>