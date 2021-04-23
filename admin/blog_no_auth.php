<?php include_once '../creat post/db.php'; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блоги</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/blog_no_auth.css">
    <link rel="stylesheet" href="../css/besement.css">
    <link rel="stylesheet" href="../css/blog_auth.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" style="height: 50px; width: 120px; margin-right: 1000px"  href="index.html">
                <p class="logo_text">Newswriter</p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="blog_no_auth.php">Блоги</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Главная<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="blog_user">
        <div class="column user">
            <div class="photo_name">
                <?
                    $mysql = new mysqli("localhost", "root", "root", "newswriter_bd");
                    if (mysqli_connect_errno()) {
                       printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                       exit();
                    }

                    $results = mysqli_query($link,"SELECT * FROM users");
                    $resu = mysqli_fetch_assoc($results);
                    foreach($results as $resu): ?>
                        <p class="name_author"> <?=$resu['name'];?></p><br>
                        <? $query = ("SELECT * FROM images WHERE id_users"); ?>
                        <?

                    if ($result = $mysql->query($query)) {
                       while ($last = $result->fetch_assoc()) {
                           echo '<a href='.$last['path'].$last['img'].'><img src='.$last['path'].$last['img'].' class="cirle_logo"></a>';
                       }
                       $result->close();
                      }

                    ?>

                    <? endforeach; ?>

                <a class="navbar-brand">
                </a>
            </div>
        </div>

        <div class="container" href="selected_blog.php">
            <div class="column post_text">
                <?php $result = mysqli_query($link, "SELECT * FROM crud_post ORDER BY id_users");
                    while($res = mysqli_fetch_assoc($result)) { ?>

                       <div class="reviews">
                          <div class="review_text" id="rectangle">
                              <b>Тема:</b> <?= $res['topic'] ?> | <b>Дата:</b> <?= date("d.m.y | <b>Время:</b> H.i", strtotime($res['data'])) ?> | <?= $res['id_users'] ?>
                               <br>
                               <?= $res['post_text'] ?> <br>
                                </div>
                          </div>
                          <hr />
                    <? } ?>
                </div>
            </div>
        </div>
    </div>


    <div class="podval">
        <div class="podval_left">
            <div class="podval_logo">
                <p class="podval_text_logo">Микроблог "Newswriter"</p>
            </div>
        </div>
        <div class="podval_right">
            <div class="podval_buttons">
                <a class="button_text_podval" href="index.html">О сайте</a>
                <a class="button_text_podval" href="">Тендер</a>
                <a class="button_text_podval" href="../Test.htm">Тест</a>
            </div>
            <div class="podval_text_child">
                <a href="../agreement.html">Согласие на обработку персональных данных. Политика оператора в отношении обработки персональных данных.</a>
            </div>
        </div>
</div>
</body>
</html>