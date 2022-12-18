<?php
require_once '../classes/connect.php';

if(isset($_GET['id_edit'])){
    $edit = $_GET['id_edit'];
    $competition = mysqli_query($connect, "SELECT * FROM `competition` WHERE id_competition = '$edit'");
    $vid = mysqli_query($connect, 'SELECT * FROM kind_of_sport');
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
            <form class="enter" action="exe/dt_com.php?id_edit=<?=$_GET['id_edit']?>" method="post">
                <h1>Редактирование соревнования</h1>
                <?php while($competitions = mysqli_fetch_object($competition)):?>
                <input class="form" type="text" name="name" id="name" placeholder="Имя" required value="<?= $competitions->name_competition?>"> <br><br>
                <input class="form" type="date" name="date" id="date" placeholder="Стаж работы" value="<?= $competitions->date_competition?>"> <br><br>
                <select class="form" name="vid">
                    <option value="-1">Вид спорта</option>
                    <?php while($vids = mysqli_fetch_object($vid)):?>
                        <?php if($vids->id_kind_of_sport == $competitions->id_kind_of_sport):?>
                        <option selected name="<?=$competitions->id_kind_of_sport?>" value="<?=$competitions->id_kind_of_sport?>"><?=$vids->name_kind_of_sport?></option>
                        <?php endif;?>
                        <?php if($vids->id_kind_of_sport != $competitions->id_kind_of_sport):?>
                            <option name="<?=$vids->id_kind_of_sport?>" value="<?=$vids->id_kind_of_sport?>"><?=$vids->name_kind_of_sport?></option>
                        <?php endif;?>
                    <?php endwhile;?>
                </select> <br><br>
                <?php endwhile;?>
                <button type="submit" name="reg_submit">Отправить</button>
                <br><br><br><br>
                <a class="back" href="/admin.php">Назад</a>
            </form>
        </main>
    </div>
</body>
</html>