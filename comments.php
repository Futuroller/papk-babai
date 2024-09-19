<?php
session_start();

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не авторизован, перенаправляем его на страницу авторизации
    header("Location: login-page.php");
    exit(); // Завершаем выполнение скрипта
}

// Подключение к базе данных
$host = "31.129.57.169";
$port = "5432";
$dbname = "vasya";
$user = "vasya";
$password = "4M6!c7G1jWMj";
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    die("Ошибка подключения к базе данных: " . pg_last_error());
}

// Обработка отправки комментария
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['comment_text'])) {
        $user_id = $_SESSION['user_id']; // Получаем ID текущего пользователя из сессии
        $comment_text = $_POST['comment_text'];

        // Вставляем комментарий в таблицу comments
        $query = "INSERT INTO comments (user_id, comment_text, created_at) VALUES ($1, $2, NOW())";
        $result = pg_query_params($dbconn, $query, array($user_id, $comment_text));

        if ($result) {
            // После успешной вставки перенаправляем на ту же страницу, чтобы предотвратить дублирование
            header("Location: comments.php");
            exit(); // Завершаем выполнение скрипта после перенаправления
        } else {
            echo "<p>Ошибка при добавлении комментария: " . pg_last_error() . "</p>";
        }
    }
}

// Извлечение комментариев из базы данных с данными пользователей (имя и фамилия)
$query = "SELECT c.comment_text, c.created_at, u.name, u.surname, u.image
          FROM comments c 
          JOIN users u ON c.user_id = u.id 
          ORDER BY c.created_at DESC";
$result = pg_query($dbconn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Комментарии</title>
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
                <a href="memes.php">
                    <li>Мемы</li>
                </a>
                <a href="">
                    <li>Комментарии</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="leave-comment">
        <p>Оставь комментарий!</p>
        <div class="comment-field">
            <form action="comments.php" method="post">
                <input type="text" name="comment_text" placeholder="Комментарий..." required>
                <button type="submit">Опубликовать</button>
            </form>
        </div>
        <p class="second-title">Или читай другие ↓</p>
    </div>

    <div class="bottom-comments">
        <div class="comment-field">
            <?php
            // Проверка, есть ли комментарии в базе данных
            if ($result && pg_num_rows($result) > 0) {
                // Выводим все комментарии
                while ($row = pg_fetch_assoc($result)) {
                    echo '<div class="comment">';
                    echo '<div class="user-data">';
                    echo '<img src="images/' . htmlspecialchars($row['image']) . '" alt="avatar">'; // Здесь можно вывести аватар пользователя, если он есть
                    echo '<p>' . htmlspecialchars($row['name']) . ' ' . htmlspecialchars($row['surname']) . '</p>'; // Имя и фамилия пользователя
                    echo '</div>';
                    echo '<p class="comment-text">' . htmlspecialchars($row['comment_text']) . '</p>'; // Текст комментария
                    echo '<p class="comment-date"><small>' . htmlspecialchars($row['created_at']) . '</small></p>'; // Дата комментария
                    echo '</div>';
                }
            } else {
                echo "<p>Комментариев пока нет. Будьте первым!</p>";
            }

            // Закрываем соединение с базой данных
            pg_close($dbconn);
            ?>
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
</body>

</html>
