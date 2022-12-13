<?php
require_once "core.php";
require_once 'classes/connect.php';
if (!$_SESSION['id_yamas_user']) {
    header('Location: registration.php');
}
unset($_SESSION['vid2']);
unset($_SESSION['trainer2']);
// $days = array( 1 => "Понедельник" , "Вторник" , "Среда" , "Четверг" , "Пятница" , "Суббота" , "Воскресенье" );
// $months = array(1 => "Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
// $hours = array (1 => "Час", "Часа", "Часа", "Часа", "Часов", "Часов", "Часов", "Часов", "Часов", "Часов", "Часов", "Часов",);
// ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="wrapper">
        <?php require "header.php";?>
        <main class="main dd">
            <div class="m_top ac">
                <div class="block">
                    <div class="nm">
                        <h1>Личная информация</h1>
                        <div class="ed">
                            <a href="tran.php" id="er">
                                <svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.875 0H2.375C1.06875 0 0 1.08 0 2.4V21.6C0 22.92 1.05687 24 2.36312 24H16.625C17.9312 24 19 22.92 19 21.6V7.2L11.875 0ZM16.625 21.6H2.375V2.4H10.6875V8.4H16.625V21.6Z" fill="white"/></svg>
                                <h2>Оплата</h2>
                            </a>
                            <form action="func_logout.php?action=logout" method="get" id="logout" onclick="document.querySelector('#logout').submit()">
                                <a href="#">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.6667 0H9.33333V11.6667H11.6667V0ZM17.3017 2.53167L15.645 4.18833C17.4883 5.67 18.6667 7.945 18.6667 10.5C18.6667 15.015 15.015 18.6667 10.5 18.6667C5.985 18.6667 2.33333 15.015 2.33333 10.5C2.33333 7.945 3.51167 5.67 5.34333 4.17667L3.69833 2.53167C1.435 4.45667 0 7.30333 0 10.5C0 16.2983 4.70167 21 10.5 21C16.2983 21 21 16.2983 21 10.5C21 7.30333 19.565 4.45667 17.3017 2.53167Z" fill="white"/></svg>
                                    <h2>Выход</h2>
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="tg">
                        <div class="one two">
                            <ul>
                                <li><p>Фамилия:</p></li>
                                <li><p>Имя:</p></li>
                                <li><p>Отчество:</p></li>
                            </ul>
                            <ul class="ci">
                                <li><p><?php echo $_SESSION['surname_yamas_user'] ?></p></li>
                                <li><p><?php echo $_SESSION['name_yamas_user'] ?></p></li>
                                <li><p><?php echo $_SESSION['patronymic_yamas_user'] ?></p></li>
                            </ul>
                        </div>
                        <div class="ne">
                            <div class="slct_form">
                            <form method="post" action="func_account.php" id="vid" onchange="document.querySelector('#vid').submit()">
                                <?php 
                                    $sql = mysqli_query($connect, 'SELECT * FROM kind_of_sport');
                                    echo'
                                    <select form="vid" name="vid">
                                    <option value="-1">Выбор вида спорта</option>';
                                    while($vid = mysqli_fetch_object($sql)) {
                                        $id_vid = $_SESSION['vid'];
                                        if (isset($id_vid) & $vid->id_kind_of_sport == $id_vid){
                                            echo '
                                            <option selected name="'. $vid->id_kind_of_sport .'" value=" ' . $vid->id_kind_of_sport . ' "> ' . $vid->name_kind_of_sport . '</option>
                                        ';}
                                        else {
                                            echo '
                                            <option name="'. $vid->id_kind_of_sport .'" value=" ' . $vid->id_kind_of_sport . ' "> ' . $vid->name_kind_of_sport . '</option>
                                        ';}
                                    }?>
                                    </select><br><br>
                                    <?php
                                    $sql = mysqli_query($connect, "SELECT id_trainer, CONCAT (trainer.surname_trainer, ' ', trainer.name_trainer) AS fio_trainer FROM `trainer` INNER JOIN `kind_of_sport` ON trainer.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE kind_of_sport.id_kind_of_sport = '$id_vid'");
                                    echo '<select form="vid" name="trainer">
                                    <option value="-1">Выбор тренера</option>';
                                    while($trainer = mysqli_fetch_object($sql)) {
                                        $id_trainer = $_SESSION['trainer'];
                                            if (isset($id_trainer) & $trainer->id_trainer == $id_trainer){
                                                echo '
                                                <option selected name="'. $trainer->id_trainer .'" value=" ' . $trainer->id_trainer . ' "> ' . $trainer->fio_trainer . '</option>
                                            ';}
                                            else {
                                                echo '
                                                <option name="'. $trainer->id_trainer .'" value=" ' . $trainer->id_trainer . ' "> ' . $trainer->fio_trainer . '</option>
                                            ';}
                                    }?>
                                </select><br><br>
                            </form>
                            </div>
                            <a href="account2.php" class="ne_a" style="display: flex;" >+ Добавить вид спорта</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m_bottom ac rd">
            <?php
            if (isset($_SESSION['trainer']) & isset($_SESSION['vid'])):
                if ( $_SESSION['vid'] >= 0 & $_SESSION['trainer'] >= 0):
                    $id_trainer = $_SESSION['trainer'];
                    $id_user = $_SESSION['id_yamas_user'];
                    $sql = mysqli_query($connect, "SELECT * FROM training WHERE id_yamas_user = '$id_user' AND id_trainer = '$id_trainer'");
                    $trainer = mysqli_fetch_object($sql);
                    $sql = mysqli_query($connect, "SELECT name_kind_of_sport FROM `kind_of_sport` WHERE id_kind_of_sport = '$id_vid'");
                    $vid = mysqli_fetch_object($sql);
                    
                    $sql = mysqli_query($connect, "SET lc_time_names = 'ru_RU'");
                    $sql = mysqli_query($connect, "SELECT DATE_FORMAT(date_time_start,'%W, %e %M %Y') AS `date`, DATE_FORMAT(date_time_start,'%H:%m') AS `time_start`, DATE_FORMAT(date_time_end,'%H:%m') AS `time_end` FROM training WHERE id_yamas_user = '$id_user' AND id_trainer = '$id_trainer'");
                    if (isset($trainer)): 
                        while($datetime = mysqli_fetch_assoc($sql)):?>
                                <div class="block rs">
                                    <h1><?=$vid->name_kind_of_sport?></h1>
                                    <h3> c <?= $datetime['time_start']?> </h3>
                                    <h3>до <?= $datetime['time_end']?></h3>
                                    <h2> <?= $datetime['date']?></h2>
                                </div>
                        <?php endwhile;?>
                        <?php else:?>
                        <h2 class="block rs">Расписание пока не составлено</h2>
                    <?php endif;?>
                <?php endif;?>
            <?php endif;?>
            </div>
        </main>
        <?php require "footer.php"?>
    </div>
</body>
</html>