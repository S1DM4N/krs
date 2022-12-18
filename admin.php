<?php
// Подключение БД
session_start();
require_once "classes/connect.php";
if (isset($_SESSION['admin'])) {
    header('Location: login.php');
}
$user = mysqli_query($connect, "SELECT id_yamas_user, CONCAT(surname_yamas_user, ' ', name_yamas_user, ' ', patronymic_yamas_user) AS fio_yamas_user, login_yamas_user, email_yamas_user FROM yamas_user");
$trainer = mysqli_query($connect, "SELECT id_trainer, CONCAT(surname_trainer, ' ', name_trainer, ' ', patronymic_trainer) AS fio_trainer, TIMESTAMPDIFF(year, date_of_employment_trainier, NOW()) AS date_work, id_rank, name_kind_of_sport FROM `trainer` INNER JOIN kind_of_sport ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = trainer.id_kind_of_sport ORDER BY `trainer`.`id_trainer` ASC");
$competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport ORDER BY `competition`.`id_competition` ASC");
$training = mysqli_query($connect, "SELECT id_training, CONCAT(name_yamas_user, ' ', surname_yamas_user) AS user, CONCAT(name_trainer, ' ', surname_trainer) AS trainer, DATE_FORMAT(date_time_start, '%H:%i %d.%c.%Y') AS date_start, DATE_FORMAT(date_time_end, '%H:%i %d.%c.%Y') AS date_end FROM `training` INNER JOIN yamas_user ON training.id_yamas_user = yamas_user.id_yamas_user INNER JOIN trainer ON training.id_trainer = trainer.id_trainer WHERE training.id_yamas_user = yamas_user.id_yamas_user AND training.id_trainer = trainer.id_trainer ORDER BY `training`.`id_training` ASC");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
</head>
<body>
    <div class="admin">
        <div class="head">
            <h2>Админ панель</h2>
            <a class="ext" <?php unset($_SESSION['admin']); ?>href="login.php">Выход</a>
        </div>
        <div class="block cnt">
            <div class= hd>
                <h3>Пользователи:</h3>
                    <a class="dd" href="edit/add_user.php">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
                    </a>
            </div>

            <div class="cnt_table">
                <div class="title">
                    <p class="id">ID</p>
                    <p class="fio">ФИО</p>
                    <p class="login">Логин</p>
                    <p class="email">Почта</p>
                    <p class="edit">Редактрование</p>
                </div>
                <?php while($users = mysqli_fetch_object($user)): ?>
                <div class="tbl">
                    <p class="id"><?=$users->id_yamas_user?></p>
                    <p class="fio"><?=$users->fio_yamas_user?></p>
                    <p class="login"><?=$users->login_yamas_user?></p>
                    <p class="email"><?=$users->email_yamas_user?></p>
                    <p class="edit">
                        <a href="edit/edit_user.php?id_edit=<?= $users->id_yamas_user?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="edit/delete_user.php?id_delete=<?= $users->id_yamas_user?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="block cnt">
            <div class= hd>
                <h3>Тренеры:</h3>
                    <a class="dd" href="edit/add_trainer.php">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
                    </a>
            </div>
            <div class="cnt_table">
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
                    <p class="edit">
                        <a href="edit/edit_trainer.php?id_edit=<?= $trainers->id_trainer?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="edit/delete_trainer.php?id_delete=<?= $trainers->id_trainer?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="block cnt cm">
            <div class= hd>
                <h3>Соревнования:</h3>
                    <a class="dd" href="edit/add_com.php">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
                    </a>
            </div>
            <div class="cnt_table">
                <div class="title">
                    <p class="id">ID</p>
                    <p class="name">Наименование</p>
                    <p class="date">Дата</p>
                    <p class="vid">Вид спорта</p>
                    <p class="edit">Редактрование</p>
                </div>
                <?php while($competitions = mysqli_fetch_object($competition)): ?>
                <div class="tbl">
                    <p class="id"><?=$competitions->id_competition?></p>
                    <p class="name"><?=$competitions->name_competition?></p>
                    <p class="date"><?=$competitions->date?></p>
                    <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    <p class="edit">
                        <a href="edit/edit_com.php?id_edit=<?= $competitions->id_competition?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="edit/delete_com.php?id_delete=<?= $competitions->id_competition?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="block cnt cm">
            <div class= hd>
                <h3>Тренировки:</h3>
                    <a class="dd" href="edit/add_training.php">
                        <i class="fa fa-plus" aria-hidden="true"></i> Добавить
                    </a>
            </div>
            <div class="cnt_table">
                <div class="title">
                    <p class="id">ID</p>
                    <p class="fio">Пользователь</p>
                    <p class="fio">Тренер</p>
                    <p class="date_start">Дата начала</p>
                    <p class="date_end">Дата окончания</p>
                    <p class="edit">Редактрование</p>
                </div>
                <?php while($trainings = mysqli_fetch_object($training)): ?>
                <div class="tbl">
                    <p class="id"><?=$trainings->id_training?></p>
                    <p class="fio"><?=$trainings->user?></p>
                    <p class="fio"><?=$trainings->trainer?></p>
                    <p class="date_start"><?=$trainings->date_start?></p>
                    <p class="date_end"><?=$trainings->date_end?></p>
                    <p class="edit">
                        <a href="edit/edit_training.php?id_edit=<?= $trainings->id_training?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="edit/delete_training.php?id_delete=<?= $trainings->id_training?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

    </div>
</body>
</html>