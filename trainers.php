<?php
// Подключение БД
require_once "classes/connect.php";

$trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = trainer.id_kind_of_sport ORDER BY `trainer`.`id_trainer` ASC");
$st = mysqli_query($connect, "SELECT TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work FROM `trainer` ORDER BY TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) ASC");
$rank = mysqli_query($connect, "SELECT * FROM `trainer_rank`");
$vid = mysqli_query($connect, "SELECT * FROM `kind_of_sport`");


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тренеры</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="wrapper">
        <?php require "header.php";?>
        <main class="main">
            <div class="sttng block cnt list">
                <h3>Параметры:</h3>
                <form method="post" action="func_trainers.php" id="st" onchange="document.querySelector('#st').submit()">
                    <select class="form" name="st">
                    <option value="-1">Стаж</option>
                    <?php while($sts = mysqli_fetch_object($st)):
                        if($_SESSION['st'] == $sts->date_work):?>
                            <option selected name="<?=$sts->date_work?>" value="<?=$sts->date_work?>"><?=$sts->date_work?></option>
                        <?php else:?>
                            <option name="<?=$sts->date_work?>" value="<?=$sts->date_work?>"><?=$sts->date_work?></option>
                        <?php endif;?>
                    <?php endwhile;?>
                    </select> <br><br>
                    <select class="form cnt" name="rank">
                            <option selected value="-1">Разряд</option>
                            <?php while($ranks = mysqli_fetch_object($rank)):
                                if($_SESSION['rank'] == $ranks->id_trainer_rank):?>
                                    <option selected name="<?=$ranks->id_trainer_rank?>" value="<?=$ranks->id_trainer_rank?>"><?=$ranks->name_trainer_rank?></option>
                                <?php else:?>
                                    <option name="<?=$ranks->id_trainer_rank?>" value="<?=$ranks->id_trainer_rank?>"><?=$ranks->name_trainer_rank?></option>
                            <?php endif;?>
                        <?php endwhile;?>
                    </select> <br><br>
                    <select class="form" name="vid">
                        <option selected value="-1">Вид спорта</option>
                        <?php while($vids = mysqli_fetch_object($vid)):
                            if($_SESSION['vid'] == $vids->id_kind_of_sport):?>
                                <option selected name="<?=$vids->id_kind_of_sport?>" value="<?=$vids->id_kind_of_sport?>"><?=$vids->name_kind_of_sport?></option>
                                <?php else:?>
                                <option name="<?=$vids->id_kind_of_sport?>" value="<?=$vids->id_kind_of_sport?>"><?=$vids->name_kind_of_sport?></option>
                            <?php endif;?>
                        <?php endwhile;?>
                    </select> <br><br>
                </form>
            </div>
            <div class="block cnt list">
                <h3>Тренеры:</h3>
                <div class="list cnt_table">
                    <div class="title">
                        <p class="fio">ФИО</p>
                        <p class="date_work">Стаж</p>
                        <p class="rank">Разряд</p>
                        <p class="vid">Вид спорта</p>
                    </div>
                    <?php if($_SESSION['abc'] == ''):
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '1'):
                    $st = $_SESSION['st'];
                    $trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = trainer.id_kind_of_sport AND TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) = '$st' ORDER BY `trainer`.`id_trainer` ASC;");
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '2'):
                    $rank = $_SESSION['rank'];
                    $trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = trainer.id_kind_of_sport AND id_rank = '$rank' ORDER BY `trainer`.`id_trainer` ASC;");
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '3'):
                    $vid = $_SESSION['vid'];
                    $trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = '$vid' ORDER BY `trainer`.`id_trainer` ASC;");
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '12'):
                    $st = $_SESSION['st'];
                    $rank = $_SESSION['rank'];
                    $trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = trainer.id_kind_of_sport AND TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) = '$st' AND id_rank = '$rank' ORDER BY `trainer`.`id_trainer` ASC;;");
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>
                    
                    <?php if($_SESSION['abc'] == '13'):
                    $st = $_SESSION['st'];
                    $vid = $_SESSION['vid'];
                    $trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = '$vid' AND TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) = '$st' ORDER BY `trainer`.`id_trainer` ASC;");
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '23'):
                    $rank = $_SESSION['rank'];
                    $vid = $_SESSION['vid'];
                    $trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = '$vid' AND id_rank = '$rank' ORDER BY `trainer`.`id_trainer` ASC;");
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '123'):
                    $st = $_SESSION['st'];
                    $rank = $_SESSION['rank'];
                    $vid = $_SESSION['vid'];
                    $trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = '$vid' AND TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) = '$st' AND id_rank = '$rank' ORDER BY `trainer`.`id_trainer` ASC;");
                    while($trainers = mysqli_fetch_object($trainer)): ?>
                    <div class="tbl">
                        <p class="fio"><?=$trainers->fio_trainer?></p>
                        <p class="date_work"><?=$trainers->date_work?></p>
                        <p class="rank"><?=$trainers->id_rank?></p>
                        <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                </div>
            </div>
        </main>
        <?php require "footer.php"?>
    </div>
</body>
</html>