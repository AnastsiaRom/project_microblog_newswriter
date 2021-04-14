<?php 
    include_once 'db.php';

    if (isset($_POST['add'])) {

        // преобразуем специальные символы в текст

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $rating = htmlspecialchars($_POST['rating']);

        // заносим данные из формы в переменные и проверяем на ошибки

        $name = strip_tags(trim($_POST['name']));
        $email = strip_tags(trim($_POST['email']));
        $message = strip_tags(trim($_POST['message']));
        $rating = strip_tags(trim($_POST['rating']));
        $date = $_POST['date'];

        // заносим дату и время отзыва
        $date = date('Y-m-d H:i');

        // проверка введенных данных

        if($name != '' AND $email != '' AND $message != ''){ if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {$err = 'Неверно введен е-mail.';}

            // отправка данных в бд

            mysqli_query($link, " INSERT INTO reviews (name, email, message, date, rating) VALUES ('$name', '$email', '$message', '$date', '$rating')");

            // закрываем сеанс 

            mysqli_close($link);

            //редирект

            header ("location: index.php");
        }
    }

    include_once 'form.php';
?>