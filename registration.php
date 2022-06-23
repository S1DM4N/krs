<?php
require_once 'core.php';
?>
<title>Регистрация</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<body>
    <div class="wrapper">
        <main class="reg">
            <form class="enter" action="func_reg.php" method="post">
                <h1>Регистрация</h1>
                <input class="form" type="text" name="login" id="login" placeholder="Логин" required> <br><br>
                <?php if (isset($_SESSION['errors']['login_error'])) echo '<span class="span">' . $_SESSION['errors']['login_error'] . '</span>'?>
                <input class="form" type="text" name="surname" id="second_name" placeholder="Фамилия" required> <br><br>
                <input class="form" type="text" name="name" id="name" placeholder="Имя" required> <br><br>
                <input class="form" type="text" name="middle_name" id="middle_name" placeholder="Отчество"> <br><br>
                <input class="form" type="text" name="phone" id="phone" placeholder="Телефон" required> <br><br>
                <?php if (isset($_SESSION['errors']['phone_error'])) echo '<span class="span">' . $_SESSION['errors']['phone_error'] . '</span>'?>
                <input type="password" name="password" id="password" placeholder="Пароль" required> <br><br>
                <?php if (isset($_SESSION['errors']['password_error'])) echo '<span class="span">' . $_SESSION['errors']['password_error'] . '</span>'?>
                <button type="submit" name="reg_submit">Отправить</button>
                <br><br><br><br>
                <a class="back" href="index.php">Назад</a>
                <br><br><br><br>
                <a type="link" href="login.php">Авторизация</a>
            </form>
        </main>
    </div>
    <script>
        $(function () {
            $("#phone").mask("+7 (999) 999-9999"); // Делает маску для номера
        });
    </script>
</body>
