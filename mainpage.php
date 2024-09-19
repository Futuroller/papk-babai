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

    <div class="header" style="position: absolute;">
        <div class="background"></div>
        <div class="heading">
            <h1>PAPK BABAI</h1>
        </div>
        <div class="puncts">
            <ul>
                <a href="">
                    <li>Главная</li>
                </a>
                <a href="members.php">
                    <li>Участники</li>
                </a>
                <a href="memes.php">
                    <li>Мемы</li>
                </a>
                <a href="comments.php">
                    <li>Комментарии</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="slider">
        <div class="slides">
            <div class="slide"><img src="images/slide1.png" alt="collage1"></div>
            <div class="slide"><img src="images/slide2.png" alt="collage2"></div>
            <div class="slide"><img src="images/slide3.png" alt="collage3"></div>
            <div class="slide"><img src="images/slide4.png" alt="collage4"></div>
            <div class="slide"><img src="images/slide5.png" alt="collage5"></div>
            <div class="slide"><img src="images/slide6.png" alt="collage6"></div>
        </div>
        <button class="slide-arrow left-arrow" onclick="changeSlide(-1)">&#10094;</button>
        <button class="slide-arrow right-arrow" onclick="changeSlide(1)">&#10095;</button>
    </div>

    <div class="description" id="description">
        <h1>В главных ролях:</h1>
        <ul>
            <li>иришка чики-пики</li>
            <li>дубина кириешкина</li>
            <li>Старый уёбок</li>
            <li>педофил</li>
            <li>макаков</li>
            <li>снимал фоткае запоминающая</li>
            <li>сиёга)</li>
            <li>яблочный король</li>
            <br><br>
            <li>(r.i.p):</li>
            <li>3 часа в йошкар-оле</li>
        </ul>
    </div>
    <footer>
        <div class="footer-container">
            <div class="contact-email">
                <p>futurolxl@gmail.com</p>
            </div>
            <div class="inc">
                <p>©makakoff inc</p>
            </div>
        </div>
    </footer>
    <script src="scripts/script-mainpage.js"></script>
</body>

</html>