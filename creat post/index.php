<?php 
    include_once 'db.php';

    if (isset($_POST['add'])) {

        // преобразуем специальные символы в текст
        $topic = htmlspecialchars($_POST['topic']);
        $post_text = htmlspecialchars($_POST['post_text']);

        // заносим данные из формы в переменные и проверяем на ошибки
        $topic = strip_tags(trim($_POST['topic']));
        $post_text = strip_tags(trim($_POST['post_text']));
        $data = $_POST['data'];
        $id_users = $_POST['id_users'];

        // заносим дату и время создания поста
        $data = date('Y-m-d H:i');

        // проверка введенных данных
        if($topic != '' AND $post_text != '')
        {
            mysqli_query($link, "INSERT INTO crud_post (topic, post_text, data, id_users) VALUES ('$topic', '$post_text', '$data', '1')");
            mysqli_close($link);
            header ("Location: /Микроблог Newswriter/admin/index.php");
        }
    }

    include_once '../admin/blog_auth.php';
?>