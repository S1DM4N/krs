<?php
require_once '../classes/connect.php';

if(isset($_GET['id_edit'])){
    $edit = $_GET['id_edit'];
    $trainer = mysqli_query($connect, "SELECT * FROM `trainer` WHERE id_trainer = '$edit'");
    $vid = mysqli_query($connect, 'SELECT * FROM kind_of_sport');
    $rank = mysqli_query($connect, 'SELECT * FROM trainer_rank');
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
            <form class="enter" action="exe/dt_trainer.php?id_edit=<?=$_GET['id_edit']?>" method="post">
                <h1>Редактирование тренера</h1>
                <?php while($trainers = mysqli_fetch_object($trainer)):?>
                <input class="form" type="text" name="surname" id="second_name" placeholder="Фамилия" required value="<?= $trainers->surname_trainer?>"> <br><br>
                <input class="form" type="text" name="name" id="name" placeholder="Имя" required value="<?= $trainers->name_trainer?>"> <br><br>
                <input class="form" type="text" name="middle_name" id="middle_name" placeholder="Отчество" value="<?= $trainers->patronymic_trainer?>"> <br><br>
                <input class="form" type="date" name="date" id="date" placeholder="Стаж работы" value="<?= $trainers->date_of_employment_trainier?>"> <br><br>
                <select class="form" name="rank">
                    <option value="-1">Разряд</option>
                    <?php while($ranks = mysqli_fetch_object($rank)):?>
                        <?php if($ranks->id_trainer_rank == $trainers->id_rank):?>
                        <option selected name="<?=$ranks->id_trainer_rank?>" value="<?=$ranks->id_trainer_rank?>"><?=$ranks->name_trainer_rank?></option>
                        <?php else:?>
                        <option name="<?=$ranks->id_trainer_rank?>" value="<?=$ranks->id_trainer_rank?>"><?=$ranks->name_trainer_rank?></option>
                        <?php endif;?>
                        <?php endwhile;?>
                </select> <br><br>
                <select class="form" name="vid">
                    <option value="-1">Вид спорта</option>
                    <?php while($vids = mysqli_fetch_object($vid)):?>
                        <?php if($vids->id_kind_of_sport == $trainers->id_kind_of_sport):?>
                        <option selected name="<?=$trainers->id_kind_of_sport?>" value="<?=$trainers->id_kind_of_sport?>"><?=$vids->name_kind_of_sport?></option>
                        <?php else:?>
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