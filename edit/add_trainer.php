<?php 
require_once '../classes/connect.php';

$vid = mysqli_query($connect, 'SELECT * FROM kind_of_sport');
$rank = mysqli_query($connect, 'SELECT * FROM trainer_rank');

?>

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
            <form class="enter" action="exe/dd_trainer.php" method="post">
                <h1>Добавление тренера</h1>
                <input class="form" type="text" name="surname" id="second_name" placeholder="Фамилия" required> <br><br>
                <input class="form" type="text" name="name" id="name" placeholder="Имя" required> <br><br>
                <input class="form" type="text" name="middle_name" id="middle_name" placeholder="Отчество"> <br><br>
                <input class="form" type="date" name="date" id="date" placeholder="Стаж работы"> <br><br>
                <select class="form" name="rank">
                    <option selected value="-1">Разряд</option>
                    <?php while($ranks = mysqli_fetch_object($rank)):?>
                    <option name="<?=$ranks->id_trainer_rank?>" value="<?=$ranks->id_trainer_rank?>"><?=$ranks->name_trainer_rank?></option>
                    <?php endwhile;?>
                </select> <br><br>
                <select class="form" name="vid">
                    <option selected value="-1">Вид спорта</option>
                    <?php while($vids = mysqli_fetch_object($vid)):?>
                    <option name="<?=$vids->id_kind_of_sport?>" value="<?=$vids->id_kind_of_sport?>"><?=$vids->name_kind_of_sport?></option>
                    <?php endwhile;?>
                </select> <br><br>
                <button type="submit" name="reg_submit">Отправить</button>
                <br><br><br><br>
                <a class="back" href="../admin.php">Назад</a>
            </form>
        </main>
    </div>
</body>
</html>