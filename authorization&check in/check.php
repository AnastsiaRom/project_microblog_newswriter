<?php 

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$chislo = $_POST['chislo'];
$chislo_1 = $_POST['chislo_1'];
$summa = $_POST['summa'];
$sum = $chislo + $chislo_1;


if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
	echo "Недопустимая длина логина";
	exit();
}
else if(mb_strlen($name) < 3 || mb_strlen($name) > 50){
	echo "Недопустимая длина имени";
	exit();
} // Проверяем длину имени
else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 10){
	echo "Недопустимая длина имени (от 2 до 10 символов)";
	exit();
}
else if($summa != $sum){
	echo "Считать научись";
	exit();
}

session_start();
require "blocks/correct.php";
$result = $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$pass', '$name')");

$mysql->close();

header('Location: /Микроблог Newswriter/successful_authorization.html');
?>