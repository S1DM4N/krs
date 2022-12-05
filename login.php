<?php 
    require_once 'core.php';
    if ($_SESSION['id_yamas_user']) {
        header('Location: account.php');
    }
?>
<title>Авторизация</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<body>
    <div class="wrapper">
        <main class="reg">
            <form class="enter" action="func_login.php" method="post">
                <h1>Авторизация</h1>
                <input class="form" type="text" name="login" id="login" placeholder="Логин"> <br><br>
                <?php if (isset($_SESSION['errors']['login_error'])) echo '<span class="span">' . $_SESSION['errors']['login_error'] . '</span>'?>
                <input class="form" type="text" name="email" id="email" placeholder="Электронная почта"> <br><br>
                <?php if (isset($_SESSION['errors']['email_error'])) echo '<span class="span">' . $_SESSION['errors']['email_error'] . '</span>'?>
                <input type="password" name="password" id="password" placeholder="Пароль" required> <br><br>
                <?php if (isset($_SESSION['errors']['password_error'])) echo '<span class="span">' . $_SESSION['errors']['password_error'] . '</span>'?>
                <button type="submit" name="login_submit">Отправить</button>
                <br><br><br><br>
                <a class="back" href="index.php">Назад</a>
                <br><br><br><br>
                <a href="registration.php">Регистрация</a>
            </form>
        </main>
    </div>
    <?php unset($_SESSION['errors']) ?>
    <script>
        $(function () {
            $("#email").mask("+7 (999) 999-9999"); // Делает маску для номера
        });
    </script>
</body>
