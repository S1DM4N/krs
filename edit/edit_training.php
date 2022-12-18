<?php
require_once '../classes/connect.php';

if(isset($_GET['id_edit'])){
    $edit = $_GET['id_edit'];
    $training = mysqli_query($connect, "SELECT * FROM training WHERE id_training = '$edit'");
}
$user = mysqli_query($connect, "SELECT id_yamas_user, CONCAT(surname_yamas_user, ' ', name_yamas_user) AS user FROM `yamas_user`");
$trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer) AS trainer FROM `trainer`;");
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
            <form class="enter" action="exe/dt_training.php?id_edit=<?=$_GET['id_edit']?>" method="post">
                <h1>Редактирование тренировки</h1>
                <form method="post" action="exe/dd_training.php" id="vid" onchange="document.querySelector('#vid').submit()">
                    <?php while($trainings = mysqli_fetch_object($training)):?>
                        <select class="form" name="user">
                            <option value="-1">Пользователь</option>
                                <?php while($users = mysqli_fetch_object($user)):
                                    if($users->id_yamas_user == $trainings->id_yamas_user):?>
                                        <option selected name="<?=$users->id_yamas_user?>" value="<?=$users->id_yamas_user?>"><?=$users->user?></option>
                                    <?php else:?>
                                        <option name="<?=$users->id_yamas_user?>" value="<?=$users->id_yamas_user?>"><?=$users->user?></option>
                                    <?php endif;?>
                                <?php endwhile;?>
                        </select> <br><br>
                        <select class="form" name="trainer">
                            <option selected value="-1">Тренер</option>
                                <?php while( $trainers = mysqli_fetch_object($trainer)):
                                    if($trainers->id_trainer == $trainings->id_trainer):?>
                                        <option selected name="<?=$trainers->id_trainer?>" value="<?=$trainers->id_trainer?>"><?=$trainers->trainer?></option>
                                    <?php else:?>
                                        <option name="<?=$trainers->id_trainer?>" value="<?=$trainers->id_trainer?>"><?=$trainers->trainer?></option>
                                    <?php endif;?>
                                <?php endwhile;?>
                        </select> <br><br>
                        <input class="form" type="datetime-local" name="date_start" id="date_start" placeholder="Дата начала" value="<?=$trainings->date_time_start?>"> <br><br>
                        <input class="form" type="datetime-local" name="date_end" id="date_end" placeholder="Дата конца" value="<?=$trainings->date_time_end?>"> <br><br>
                    <?php endwhile;?>
                    <button type="submit" name="reg_submit">Отправить</button>
                    <br><br><br><br>
                    <a class="back" href="../admin.php">Назад</a>
            </form>
        </main>
    </div>
</body>
</html>