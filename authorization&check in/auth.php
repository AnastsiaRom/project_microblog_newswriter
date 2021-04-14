<?php 

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);


require "blocks/correct.php";

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = mysqli_fetch_row($result);

if($user == null){
	echo "Такого пользователя нет";
}
else{
	setcookie("user", $user[3], time() + 3600, "/"); //Создаём куки
	$login_user="admin";
	$password_user="admin";
	if( ($login_user == $login) and ($password_user == $pass) )
	{
		header('Location: /Микроблог Newswriter/admin/');
	}
	else
	{
	header('Location: /Микроблог Newswriter/user/');
	}
	$mysql->close();
}
?>