<?php include_once '../creat post/db.php'; ?>
<?php
include '../crud/func.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Основная</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
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

                  $query = "SELECT * FROM images";

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
                <p class="name_author"> <?=$_COOKIE['user'];?></p>
                <p class="name_author "><?=$_COOKIE['user'];?></p>
                <a href="../authorization&check in/exit.php">Чтобы выйти нажмите по ссылке.</a>
            </a>
        </div>
    </div>

    <div class="container">
		<div class="column post_text">
			<div class="col mt-1">
				<?=$success ?>
				<table class="table table-striped table-hover mt-2">
					<thead class="table-dark">
						<tr>
							<th>Тема</th>
							<th>Текст поста</th>
							<th>Редактировать/Удалить</th>
						</tr>
					</thead>
					<tbody>
					<?php $result = mysqli_query($link, "SELECT * FROM `crud_post`") ?>
					<?php foreach ($result as $value) { ?>
						<tr>
							<td><?=$value['topic'] ?></td>
							<td><?=$value['post_text'] ?></td>

							<td>
								<a href="?edit=<?=$value['id_post'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$value['id_post'] ?>"><i class="fa fa-edit"></i></a>
								<a href="?delete=<?=$value['id_post'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$value['id_post'] ?>"><i class="fa fa-trash"></i></a>
								<?php require '../crud/modal.php'; ?>
							</td>
						</tr> <?php } ?>
					</tbody>
				</table>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>