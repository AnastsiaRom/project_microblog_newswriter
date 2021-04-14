<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Авторизациz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/head.css">
    <link rel="stylesheet" href="css/besement.css">
    <link rel="stylesheet" href="css/styleForms.css">
    <link rel="stylesheet" href="css/checkInAuthorization.css">
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
                        <a class="nav-link" href="gallery.html">Галерея</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUS.html">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.html" tabindex="-1" aria-disabled="true"></a>
                    </li>
                    <li class="nav-item nav-item-auth">
                        <a class="nav-link" href="authorization.php">Авторизация</a>
                    </li>
                    <li class="nav-item nav-item-auth">
                        <a class="nav-link" href="checkIn.php">Регистрация</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
		<div class="row">
			<div class="col">
				<h1>Форма авторизации</h1>
				<form action="authorization&check in/auth.php" method="post">
					<input type="text" name="login" class="form-control" id="login" placeholder="Логин"><br>
					<input type="password" name="pass" class="form-control" id="pass" placeholder="Пароль"><br>
					<button class="btn btn-success" type="submit">Авторизоваться</button><br>
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
                        <a class="social_logo" href="https://www.instagram.com/anastasi_aa_/"><img  src="besement/inst.svg" alt="" ></a>
                        <a class="social_logo" href=""></a><img src="besement/phone.svg" alt=""></a>
                        <a class="social_logo" href=""></a><img  src="besement/mail.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="podval_right">
            <div class="podval_buttons">
                <a class="button_text_podval" href="index.html">О компании</a>
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