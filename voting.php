<?php
session_start();

// Проверка авторизации пользователя
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не авторизован, перенаправляем его на страницу авторизации
    header("Location: login-page.php");
    exit(); // Завершаем выполнение скрипта
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="background"></div>
            <div class="heading">
                <h1>PAPK BABAI</h1>
            </div>
            <div class="puncts">
                <ul>
                    <a href="mainpage.php">
                        <li>Главная</li>
                    </a>
                    <a href="members.php">
                        <li>Участники</li>
                    </a>
                    <a href="memes.php">
                        <li>Мемы</li>
                    </a>
                    <a href="gallery.php">
                        <li>Галерея</li>
                    </a>
                    <a href="comments.php">
                        <li>Комментарии</li>
                    </a>
                    <a href="">
                        <li>Опросы</li>
                    </a>
                </ul>
            </div>
        </div>

        <div class="advice">
            <p>Страница находится в разработке, пиздуй на следующую</p>
        </div>
    </div>

    <footer style="position: absolute; bottom: 0;">
        <div class="footer-container">
            <div class="contact-email">
                <p>futurolxl@gmail.com</p>
            </div>
            <div class="inc">
                <p>©makakoff inc</p>
            </div>
        </div>
    </footer>
</body>

</html>