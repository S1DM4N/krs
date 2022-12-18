<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <main class="reg">
            <form class="enter" action="exe/dd_user.php" method="post">
                <h1>Добавление пользователя</h1>
                <input class="form" type="text" name="login" id="login" placeholder="Логин" required> <br><br>
                <input class="form" type="text" name="surname" id="second_name" placeholder="Фамилия" required> <br><br>
                <input class="form" type="text" name="name" id="name" placeholder="Имя" required> <br><br>
                <input class="form" type="text" name="middle_name" id="middle_name" placeholder="Отчество"> <br><br>
                <input class="form" type="text" name="email" id="email" placeholder="Электронная почта" required> <br><br>
                <input type="password" name="password" id="password" placeholder="Пароль" required> <br><br>
                <button type="submit" name="reg_submit">Отправить</button>
                <br><br><br><br>
                <a class="back" href="../admin.php">Назад</a>
            </form>
        </main>
    </div>
</body>
</html>