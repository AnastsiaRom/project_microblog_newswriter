<?php
include '../crud/func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
	<link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/besement.css">
	<link rel="stylesheet" href="../css/checkInAuthorization.css">
</head>
<body>
	<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" style="height: 50px; width: 120px; margin-right: 100px"  href="#">
                <p class="logo_text">MYDAWN</p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Главная<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="record.html">Пройти обучение</a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="gallery.php">Галерея</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUS.html">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.html" tabindex="-1" aria-disabled="true"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tableWorker.php">Команда</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

	<div class="centr">
		<h1>Привет, Admin! Всего хорошего тебе! :D </h1>
        <a href="../authorization&check in/exit.php">Чтобы выйти нажмите по ссылке.</a>
	</div>
	<div class="container">
		<div class="row">
			<div class="col mt-1">
				<?=$success ?>
				<button class="btn btn-success mb-2" data-toggle="modal" data-target="#Modal"><i class="fa fa-user-plus"></i></button>
				<table class="table table-striped table-hover mt-2">
					<thead class="table-dark">
						<tr>
							<th>ID</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>Должность работника</th>
							<th>Действие</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($result as $value) { ?>
						<tr>
							<td><?=$value['id'] ?></td>
							<td><?=$value['name'] ?></td>
							<td><?=$value['last_name'] ?></td>
							<td><?=$value['pos'] ?></td>
							<td>
								<a href="?edit=<?=$value['id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$value['id'] ?>"><i class="fa fa-edit"></i></a> 
								<a href="?delete=<?=$value['id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$value['id'] ?>"><i class="fa fa-trash"></i></a>
								<?php require '../crud/modal.php'; ?>
							</td>
						</tr> <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal create-->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить запись</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="name" value="" placeholder="Имя">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="last_name" value="" placeholder="Фамилия">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="pos" value="" placeholder="Должность сотрудника">
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>

	<div class="podval">
    <div class="podval_left">
        <div class="podval_logo">     
            <p class="podval_text_logo">MYDAWN</p>
            <div class="social_container">
                <div class="social">
                    <a class="social_logo" href="https://www.instagram.com/anastasi_aa_/"><img  src="../besement/inst.svg" alt="" ></a>
                    <a class="social_logo" href=""></a><img src="../besement/phone.svg" alt=""></a>
                    <a class="social_logo" href=""></a><img  src="../besement/mail.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="podval_right">
        <div class="podval_buttons">
            <a class="button_text_podval" href="">Тендер</a>
            <a class="button_text_podval" href="contact.html">Отправь заявку на обучение</a>
        </div>
        <div class="podval_text_child">
                Согласие на обработку персональных данных. Политика оператора в отношении обработки персональных данных.
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>