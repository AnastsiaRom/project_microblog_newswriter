<? session_start();?>

<html lang="en">
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/load.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="wrapper">
        <div class="load form">
            <form class="form" method="POST" enctype="multipart/form-data">
                <p>Загрузить фото</p>
                <input class="input" type="file" name="file" id="inputfile">
                <input id="submit" class="input" type="submit" name="submit" value="Загрузить" placeholder="Выбрать">
                <a href="../admin/index.php"><div class="buttonBack">К профилю</div></a>
            </form>
            <?php
if (isset($_POST['submit'])) {
    $input_name = 'file';
    
    // Разрешенные расширения файлов.
    $allow = array();
    
    // Запрещенные расширения файлов.
    $deny = array(
        'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
        'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
        'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'docx', 'pdf', 'txt'
    );
    // Директория куда будут загружаться файлы.
    $path_bd = 'imgs/';
    $path = __DIR__ . '\\imgs\\';

    if (isset($_FILES[$input_name])) {
        // Проверим директорию для загрузки.
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    
        // Преобразуем массив $_FILES в удобный вид для перебора в foreach.
        $files = array();
        $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
        if ($diff == 0) {
            $files = array($_FILES[$input_name]);
        } else {
            foreach($_FILES[$input_name] as $k => $l) {
                foreach($l as $i => $v) {
                    $files[$i][$k] = $v;
                }
            }		
        }	
        
        foreach ($files as $file) {
            $error = $success = '';
    
            // Проверим на ошибки загрузки.
            if (!empty($file['error']) || empty($file['tmp_name'])) {
                switch (@$file['error']) {
                    case 1:
                    case 2: $error = 'Превышен размер загружаемого файла.'; break;
                    case 3: $error = 'Файл был получен только частично.'; break;
                    case 4: $error = 'Файл не был загружен.'; break;
                    case 6: $error = 'Файл не загружен - отсутствует временная директория.'; break;
                    case 7: $error = 'Не удалось записать файл на диск.'; break;
                    case 8: $error = 'PHP-расширение остановило загрузку файла.'; break;
                    case 9: $error = 'Файл не был загружен - директория не существует.'; break;
                    case 10: $error = 'Превышен максимально допустимый размер файла.'; break;
                    case 11: $error = 'Данный тип файла запрещен.'; break;
                    case 12: $error = 'Ошибка при копировании файла.'; break;
                    default: $error = 'Файл не был загружен - неизвестная ошибка.'; break;
                }
            } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                $error = 'Не удалось загрузить файл.';
            } else {
                // Оставляем в имени файла только буквы, цифры и некоторые символы.
                $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
                $name = mb_eregi_replace($pattern, '-', $file['name']);
                $name = mb_ereg_replace('[-]+', '-', $name);
                
                // Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
                // Сделаем их транслит:
                $converter = array(
                    'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
                    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
                    'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
                    'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
                    'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
                
                    'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                    'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                    'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
                    'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                    'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
                    'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                );
    
                $name = strtr($name, $converter);
                $parts = pathinfo($name);

                if (empty($name) || empty($parts['extension'])) {
                    $error = 'Недопустимое тип файла';
                } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                    $error = 'Недопустимый тип файла';
                } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                    $error = 'Недопустимый тип файла';
                } else {
                        // Чтобы не затереть файл с таким же названием, добавим префикс.
                        $i = 0;
                        $prefix = '';
                        while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                            $prefix = '(' . ++$i . ')';
                        }
                        $name = $parts['filename'] . $prefix . '.' . $parts['extension'];
                        
                        // Перемещаем файл в директорию.
                        if (move_uploaded_file($file['tmp_name'], $path.$name)) {
                            // Далее можно сохранить название файла в БД и т.п.
                             // Подключение к базе данных
                            $mysql = new mysqli("localhost", "root", "root", "newswriter_bd");
                            if (mysqli_connect_errno()) {
                                printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                                exit();
                            }
                            $db_table = "images";
                            $insert = "INSERT INTO ".$db_table." VALUES ('{$_SESSION['id']}','$path_bd','$name')";
 
                            // Если есть ошибка соединения, выводим её и убиваем подключение
                            if ($mysql->connect_error) {
                                die('Ошибка : ('. $mysql->connect_errno .') '. $mysql->connect_error);
                            }
                            $result = $mysql->query($insert);
                            if ($result == true){
                                $success = 'Файл загружен';
                            }
                            else{
                                $error = 'Какая-то ошибка.';
                            }
                        
                        } else {
                            $error = 'Не удалось загрузить файл.';
                        }
                    
                }
            }
            
            // Выводим сообщение о результате загрузки.
            if (!empty($success)) {
                echo '<p>' . $success . '</p>';	
            
            } else {
                echo'<p> Имя = '. $name . '</p>';
                echo'<p> path_bd = ' . $path_bd . '</p>';
                echo'<p> path = ' . $path . '</p>';
                echo'<p> Запрос = ' . $insert . '</p>';
                echo '<p> Ошибка = ' . $error . '</p>';
            }
        }
    }
    $mysql->close();
}

?>
        </div>
    </div>
</body>
</html>