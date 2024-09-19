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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
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
                <a href="">
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


    <div class="members-cards">
        <div class="member-card vasily" data-id="1">
            <div>
                <p>Василий Макаров</p>
            </div>
        </div>
        <div class="member-card alexey" data-id="2">
            <div>
                <p>Алексей Чернуль</p>
            </div>
        </div>
        <div class="member-card sergey" data-id="3">
            <div>
                <p>Сергей Шубников</p>
            </div>
        </div>
        <div class="member-card leoneed" data-id="4">
            <div>
                <p>Леонид Зайцев</p>
            </div>
        </div>
        <div class="member-card demyan" data-id="5">
            <div>
                <p>Демьян Доянов</p>
            </div>
        </div>
        <div class="member-card egor" data-id="6">
            <div>
                <p>Егор Вакула</p>
            </div>
        </div>
        <div class="member-card julia" data-id="7">
            <div>
                <p>Юлия Морозова</p>
            </div>
        </div>
        <div class="member-card darina" data-id="8">
            <div>
                <p>Дарина Морозова</p>
            </div>
        </div>
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
    <script src="scripts/base.js"></script>
    <script src="scripts/modal.js"></script>
    <script src="scripts/script-members.js"></script>
</body>

</html>