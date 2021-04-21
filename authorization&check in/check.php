<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$chislo = $_POST['chislo'];
$chislo_1 = $_POST['chislo_1'];
$summa = $_POST['summa'];
$sum = $chislo + $chislo_1;


if(mb_strlen($email) < 2 || mb_strlen($email) > 90 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
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
else if(empty($_POST['checkboxs'])){
    echo "Вы не согласились с согласием на обработку персональных данных";
    exit();
}

require_once "blocks/correct.php";

// проверка на пользователя с одинаковым email
$results = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
$users = $results->fetch_assoc(); // Конвертируем в массив
if(!empty($users)){
	echo"<b><center><font size=4 color=red>пользователь с таким E-mail уже зарегистрирован</font></center></b>";
	exit();
}

$result = $mysql->query("INSERT INTO `users` (`email`, `password`, `name`) VALUES ('$email', '$password', '$name')");

$mysql->close();

header('Location: /Микроблог Newswriter/successful_authorization.html');
?>