<?php 
    include_once 'db.php';

    if (isset($_POST['add'])) {

        // преобразуем специальные символы в текст

        $topic = htmlspecialchars($_POST['topic']);
        $post_text = htmlspecialchars($_POST['post_text']);

        // заносим данные из формы в переменные и проверяем на ошибки

        $topic = strip_tags($_POST['topic']);
        $post_text = strip_tags($_POST['post_text']);
        $date = $_POST['date'];

        // заносим дату и время создания поста
        $date = date('Y-m-d H:i');

        // проверка введенных данных

        if($topic != '' AND $post_text != '')
        {
            // отправка данных в бд

            mysqli_query($link, " INSERT INTO crud_post (topic, post_text, date) VALUES ('$topic', '$post_text', '$date')");

            // закрываем сеанс 

            mysqli_close($link);

            //редирект

            header ("Location: /Микроблог Newswriter/admin/index.html");
        }
    }

    include_once '../admin/blog_auth.html';
?>