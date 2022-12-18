<?php
// Подключение БД
session_start();
require_once "classes/connect.php";

$trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = trainer.id_kind_of_sport ORDER BY `trainer`.`id_trainer` ASC");


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
            <div class="sttng">

            </div>
            <div class="block cnt">
            <div class= hd>
                <h3>Тренеры:</h3>
            </div>
            <div class="list cnt_table">
                <div class="title">
                    <p class="id">ID</p>
                    <p class="fio">ФИО</p>
                    <p class="date_work">Стаж</p>
                    <p class="rank">Разряд</p>
                    <p class="vid">Вид спорта</p>
                    <p class="edit">Редактрование</p>
                </div>
                <?php while($trainers = mysqli_fetch_object($trainer)): ?>
                <div class="tbl">
                    <p class="id"><?=$trainers->id_trainer?></p>
                    <p class="fio"><?=$trainers->fio_trainer?></p>
                    <p class="date_work"><?=$trainers->date_work?></p>
                    <p class="rank"><?=$trainers->id_rank?></p>
                    <p class="vid"><?=$trainers->name_kind_of_sport?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        </main>
        <?php require "footer.php"?>
    </div>
</body>
</html>