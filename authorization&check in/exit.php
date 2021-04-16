<?php
setcookie('user', $user[3], time() - 3600, "/");
header('Location: /Микроблог Newswriter/index.html');
?>