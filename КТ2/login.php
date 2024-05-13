<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'kt2';

$link = mysqli_connect($host, $user, $password, $db_name);

if(!empty($_POST['password']) && !empty($_POST['login'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);

    $user = mysqli_fetch_assoc($result);

    if(!empty($user)){
        session_start();
        $_SESSION['auth'] = true;
        header('Location: index.php');
    }else{
        $error = 'Неверный логин или пароль';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Вход</h1>
    <form action="" method="POST">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>
    <?php if(isset($error) && !empty($error)): ?>
        <p class="error"><?= $error; ?></p>
    <?php endif; ?>
</div>

</body>
</html>

