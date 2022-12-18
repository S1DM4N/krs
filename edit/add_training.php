<?php 
require_once '../classes/connect.php';

$user = mysqli_query($connect, "SELECT id_yamas_user, CONCAT(surname_yamas_user, ' ', name_yamas_user) AS user FROM `yamas_user`");
$trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer) AS trainer FROM `trainer`;");
$training = mysqli_query($connect, "SELECT * FROM training");

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
            <form class="enter" action="exe/dd_training.php" method="post">
                <h1>Добавление тренировки</h1>
                <form method="post" action="exe/dd_training.php" id="vid" onchange="document.querySelector('#vid').submit()">
                    <select class="form" name="user">
                        <option selected value="-1">Пользователь</option>
                            <?php while($users = mysqli_fetch_object($user)):?>
                                <option name="<?=$users->id_yamas_user?>" value="<?=$users->id_yamas_user?>"><?=$users->user?></option>
                            <?php endwhile;?>
                    </select> <br><br>
                    <select class="form" name="trainer">
                        <option selected value="-1">Тренер</option>
                            <?php while( $trainers = mysqli_fetch_object($trainer)):?>
                                <option name="<?=$trainers->id_trainer?>" value="<?=$trainers->id_trainer?>"><?=$trainers->trainer?></option>
                             <?php endwhile;?>
                    </select> <br><br>
                    <input class="form" type="datetime-local" name="date_start" id="date_start" placeholder="Дата начала"> <br><br>
                    <input class="form" type="datetime-local" name="date_end" id="date_end" placeholder="Дата конца"> <br><br>
                    <button type="submit" name="reg_submit">Отправить</button>
                    <br><br><br><br>
                    <a class="back" href="../admin.php">Назад</a>
            </form>
        </main>
    </div>
</body>
</html>