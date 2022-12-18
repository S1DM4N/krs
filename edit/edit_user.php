<?php
require_once '../classes/connect.php';

if(isset($_GET['id_edit'])){
    $id_user = $_GET['id_edit'];
    $sql = mysqli_query($connect, "SELECT * FROM `yamas_user` WHERE id_yamas_user = '$id_user'");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <main class="reg">
            <form class="enter" action="exe/dt_user.php?id_edit=<?=$_GET['id_edit']?>" method="post">
                <h1>Редактирование пользователя</h1>
                <?php while($user =  mysqli_fetch_object($sql)):?>
                <input class="form" type="text" name="login" id="login" placeholder="Логин" required value="<?= $user->login_yamas_user?>"> <br><br>
                <input class="form" type="text" name="surname" id="second_name" placeholder="Фамилия" required value="<?= $user->surname_yamas_user?>"> <br><br>
                <input class="form" type="text" name="name" id="name" placeholder="Имя" required value="<?= $user->name_yamas_user?>"> <br><br>
                <input class="form" type="text" name="middle_name" id="middle_name" placeholder="Отчество" value="<?= $user->patronymic_yamas_user?>"> <br><br>
                <input class="form" type="text" name="email" id="email" placeholder="Электронная почта" required value="<?= $user->email_yamas_user?>"> <br><br>
                <input name="password" id="password" placeholder="Пароль" required value="<?= $user->password_yamas_user?>"> <br><br>
                <?php endwhile;?>
                <button type="submit" name="reg_submit">Отправить</button>
                <br><br><br><br>
                <a class="back" href="/admin.php">Назад</a>
            </form>
        </main>
    </div>
</body>
</html>