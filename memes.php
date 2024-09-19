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
                <a href="members.php">
                    <li>Участники</li>
                </a>
                <a href="">
                    <li>Мемы</li>
                </a>
                <a href="comments.php">
                    <li>Комментарии</li>
                </a>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="meme-blocks">
                <div class="meme-block">
                    <p>2022</p>
                    <img src="images/2022_1_pre.png" alt="meme1">
                    <img src="images/2022_1.png" alt="meme1" class="hidden" data-id="1">
                    <img src="images/2022_2_pre.png" alt="meme2">
                    <img src="images/2022_2.png" alt="meme2" class="hidden" data-id="2">
                    <img src="images/2022_3_pre.png" alt="meme3">
                    <img src="images/2022_3.png" alt="meme3" class="hidden" data-id="3">
                    <img src="images/2022_4_pre.png" alt="meme4">
                    <img src="images/2022_4.png" alt="meme4" class="hidden" data-id="4">
                    <img src="images/2022_5.png" alt="meme3" class="hidden" data-id="5">
                    <img src="images/2022_6.png" alt="meme4" class="hidden" data-id="6">
                </div>
                <div class="meme-block" data-id="2">
                    <p>2023</p>
                    <img src="images/2023_1_pre.png" alt="meme1">
                    <img src="images/2023_1.png" alt="meme1" class="hidden" data-id="7">
                    <img src="images/2023_2_pre.png" alt="meme2">
                    <img src="images/2023_2.png" alt="meme2" class="hidden" data-id="8">
                    <img src="images/2023_3_pre.png" alt="meme3">
                    <img src="images/2023_3.png" alt="meme3" class="hidden" data-id="9">
                    <img src="images/2023_4_pre.png" alt="meme4">
                    <img src="images/2023_4.png" alt="meme4" class="hidden" data-id="10">
                    <img src="images/2023_5.png" alt="meme3" class="hidden" data-id="11">
                    <img src="images/2023_6.png" alt="meme4" class="hidden" data-id="12">
                </div>
                <div class="meme-block" data-id="3">
                    <p>2024</p>
                    <img src="images/2024_1_pre.png" alt="meme1">
                    <img src="images/2024_1.png" alt="meme1" class="hidden" data-id="13">
                    <img src="images/2024_2_pre.png" alt="meme2">
                    <img src="images/2024_2.png" alt="meme2" class="hidden" data-id="14">
                    <img src="images/2024_3_pre.png" alt="meme3">
                    <img src="images/2024_3.png" alt="meme3" class="hidden" data-id="15">
                    <img src="images/2024_4_pre.png" alt="meme4">
                    <img src="images/2024_4.png" alt="meme4" class="hidden" data-id="16">
                    <img src="images/2024_5.png" alt="meme3" class="hidden" data-id="17">
                    <img src="images/2024_6.png" alt="meme4" class="hidden" data-id="18">
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
    <script src="scripts/script-memes.js"></script>
</body>

</html>