<?php
session_start();

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

// Обработка отправки формы авторизации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Проверяем логин и пароль в базе данных
    $query = "SELECT id, password FROM users WHERE login = $1";
    $result = pg_query_params($dbconn, $query, array($login));

    if ($result && pg_num_rows($result) == 1) {
        $user = pg_fetch_assoc($result);

        // Проверка пароля (в случае использования хэширования — использовать password_verify())
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id']; // Сохраняем ID пользователя в сессию
            header("Location: mainpage.php"); // Перенаправляем на страницу с комментариями
            exit();
        } else {
            $error_message = "Неверный пароль.";
        }
    } else {
        $error_message = "Пользователь с таким логином не найден.";
    }
}

// Закрываем соединение с базой данных
pg_close($dbconn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <form action="login-page.php" method="post">
        <div class="login">
            <div class="login-container">
                <p class="title">авторизация</p>
                <input type="text" id="login" name="login" placeholder="ЛОГИН" required>
                <input type="password" id="password" name="password" placeholder="ПАРОЛЬ" required>
                <?php if (isset($error_message)) {
                    echo "<p>$error_message</p>";
                } ?>
                <button type="submit">вход</button>
            </div>
        </div>
    </form>
    <script src=""></script>
</body>

</html>