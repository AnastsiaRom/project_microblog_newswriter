<?php include_once '../creat post/db.php';
session_start();?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Основная</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/selected_blog.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/besement.css">
    <link rel="stylesheet" href="../css/blog_auth.css">
    <link rel="stylesheet" href="../css/blog_no_auth.css">
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
                        <a class="nav-link" href="index.php">Основная</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="blog_auth.php">Блоги<span class="sr-only">(current)</span></a>
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

                  $query = "SELECT * FROM images WHERE  id_users= ".$_SESSION['id'];

                  if ($result = $mysql->query($query)) {

                      while ($last = $result->fetch_assoc()) {
                          echo '<a href='.$last['path'].$last['img'].'><img src='.$last['path'].$last['img'].' class="cirle_logo"></a>';
                      }
                         echo '<a href="addIMG.php"><div class="add-photo"><img class="addForm" width = "20px" src="../imge/add.png" alt="ОЙ">Добавить фото</div></a>';
                      $result->close();
                  }
                  $mysql->close();
            ?>

            <a class="navbar-brand">
                <p class="name_author"> <?=htmlspecialchars($_SESSION['name']);?></p><br>
                <p class="name_author "><?=htmlspecialchars($_SESSION['email']);?></p>
                <a href="../authorization&check in/exit.php">Чтобы выйти нажмите по ссылке.</a>
            </a>
        </div>
    </div>

    <div class="container">
		<div class="column post_text">
			<?php $result = mysqli_query($link, "SELECT * FROM `crud_post` WHERE  id_users= ".$_SESSION['id']);
			        while($res = mysqli_fetch_assoc($result)) { ?>

                        <div class="reviews">
                            <div class="review_text" id="rectangle">
                                <b>Тема:</b> <?= $res['topic'] ?> | <b>Дата:</b> <?= date("d.m.y | <b>Время:</b> H.i", strtotime($res['data'])) ?>
                                <br>
                                <?= $res['post_text'] ?> <br>
                            </div>
                        </div>
                    <?php } ?>
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
        </div>
        <div class="podval_text_child">
            <a href="https://www.4dk.ru/s/politika-operatora">Согласие на обработку персональных данных. Политика оператора в отношении обработки персональных данных.</a>
        </div>
    </div>
</div>
</body>
</html>