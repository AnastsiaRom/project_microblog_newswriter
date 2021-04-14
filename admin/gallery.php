<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/jаvascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/gallery_yes.css">
    <link rel="stylesheet" href="../css/besement.css">
    <!-- <link rel="stylesheet" href="../addGallery/css.css"> -->
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

    <div class="bodyer">
        <div class="titleGaleri"><h3>Галерея</h3></div>
      
        <div class="row">
          
         <?

        if(!isset($_COOKIE["user"])){
          echo("Галерею могут просматривать только авторизированные пользователи...");
        }
        else {
            $mysql = new mysqli("localhost", "root", "root", "images");
            if (mysqli_connect_errno()) {
              printf("Не удалось подключиться: %s\n", mysqli_connect_error());
              exit();
            }
          
          $query = "SELECT * FROM images";
          
          if ($result = $mysql->query($query)) {
          

              while ($last = $result->fetch_assoc()) {
                  echo '<a href='.$last['div'].$last['img'].'><img src='.$last['div'].$last['img'].' class="img"></a>';
              }
               if(include 'checkAdmin.php') {
                 echo '<a href="addIMG.php"><div class="add-photo"><img class="addForm" src="images/add.svg" alt=""></div></a>';
               }
              

              $result->close();
          }
          
          $mysql->close();
        }
         ?>
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
            <a class="button_text_podval" href="index.html">О компании</a>
            <a class="button_text_podval" href="">Тендер</a>
            <a class="button_text_podval" href="contact.html">Отправь заявку на обучение</a>
        </div>
        <div class="podval_text_child">
                Согласие на обработку персональных данных. Политика оператора в отношении обработки персональных данных.
        </div>
    </div>
    
</body>
</html>