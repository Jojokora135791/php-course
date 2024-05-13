<!-- index.php -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .auth-message {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }

        .auth-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Главная страница</h1>
    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']): ?>
        <p class="auth-message">Вы авторизованы</p>
    <?php else: ?>
        <p class="auth-message">Для доступа к этой странице необходимо авторизоваться</p>
        <a href="login.php" class="auth-link">Авторизоваться</a>
    <?php endif; ?>
</div>

</body>
</html>
