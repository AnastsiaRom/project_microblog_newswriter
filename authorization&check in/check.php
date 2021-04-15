<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$chislo = $_POST['chislo'];
$chislo_1 = $_POST['chislo_1'];
$summa = $_POST['summa'];
$sum = $chislo + $chislo_1;


if(mb_strlen($email) < 5 || mb_strlen($email) > 90 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "Недопустимая длина email или некорректно введен email";
	exit();
}
else if(mb_strlen($name) < 1 || mb_strlen($name) > 50){
	echo "Недопустимая длина имени";
	exit();
}
else if(mb_strlen($password) < 3 || mb_strlen($password) > 20){
	echo "Недопустимая длина пароля (от 2 до 20 символов)";
	exit();
}
else if($summa != $sum){
	echo "Считать научись";
	exit();
}

require "blocks/correct.php";
$result = $mysql->query("INSERT INTO `users` (`email`, `password`, `name`) VALUES ('$email', '$password', '$name')");

$mysql->close();

header('Location: /Микроблог Newswriter/successful_authorization.html');
?>