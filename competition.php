<?php
// Подключение БД
require_once "classes/connect.php";

$competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport ORDER BY `competition`.`id_competition` ASC");
$vid = mysqli_query($connect, "SELECT * FROM `kind_of_sport`");


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Соревнования</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="wrapper">
        <?php require "header.php";?>
        <main class="main">
            <div class="sttng block cnt list">
                <h3>Параметры:</h3>
                <form method="post" action="func_competition.php" id="st" onchange="document.querySelector('#st').submit()">
                        <?php if(isset($_SESSION['date_start'])):?>
                            <input class="form" type="date" name="date_start" id="date" placeholder="C" value="<?= $_SESSION['date_start']?>"> <br><br>
                        <?php else:?>
                            <input class="form" type="date" name="date_start" id="date" placeholder="C"> <br><br>
                        <?php endif;?>
                        <?php if(isset($_SESSION['date_end'])):?>
                            <input class="form cnt" type="date" name="date_end" id="date" placeholder="По" value="<?=$_SESSION['date_end']?>"> <br><br>
                        <?php else:?>
                            <input class="form cnt" type="date" name="date_end" id="date" placeholder="По"> <br><br>
                        <?php endif;?>
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
            <div class="block cnt list com">
                <h3>Соревнования:</h3>
                <div class="list cnt_table">
                    <div class="title">
                        <p class="name r">Наименование</p>
                        <p class="date cnt">Дата</p>
                        <p class="vid l">Вид спорта</p>
                    </div>
                    <?php if($_SESSION['abc'] == ''):
                    while($competitions = mysqli_fetch_object($competition)): ?>
                    <div class="tbl com">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '1'):
                    $date_start = $_SESSION['date_start'];
                    $competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport AND DATE_FORMAT(date_competition, '%d.%c.%Y') >= DATE_FORMAT('$date_start', '%d.%c.%Y') ORDER BY `competition`.`id_competition` ASC;");
                    while($competitions = mysqli_fetch_object($competition)):?>
                    <div class="tbl">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '2'):
                    $date_end = $_SESSION['date_end'];
                    $competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport AND DATE_FORMAT(date_competition, '%d.%c.%Y') <= DATE_FORMAT('$date_end', '%d.%c.%Y') ORDER BY `competition`.`id_competition` ASC;");
                    while($competitions = mysqli_fetch_object($competition)): ?>
                    <div class="tbl">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '3'):
                    $vid = $_SESSION['vid'];
                    $competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = '$vid' ORDER BY `competition`.`id_competition` ASC;");
                    while($competitions = mysqli_fetch_object($competition)): ?>
                    <div class="tbl">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '12'):
                    $date_start = $_SESSION['date_start'];
                    $date_end = $_SESSION['date_end'];
                    $competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport AND DATE_FORMAT(date_competition, '%d.%c.%Y') >= DATE_FORMAT('$date_start', '%d.%c.%Y') AND DATE_FORMAT(date_competition, '%d.%c.%Y') <= DATE_FORMAT('$date_end', '%d.%c.%Y') ORDER BY `competition`.`id_competition` ASC;");
                    while($competitions = mysqli_fetch_object($competition)): ?>
                    <div class="tbl">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>
                    
                    <?php if($_SESSION['abc'] == '13'):
                    $date_start = $_SESSION['date_start'];
                    $vid = $_SESSION['vid'];
                    $competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = '$vid' AND DATE_FORMAT(date_competition, '%d.%c.%Y') >= DATE_FORMAT('$date_start', '%d.%c.%Y') ORDER BY `competition`.`id_competition` ASC;");
                    while($competitions = mysqli_fetch_object($competition)): ?>
                    <div class="tbl">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '23'):
                    $date_end = $_SESSION['date_end'];
                    $vid = $_SESSION['vid'];
                    $competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = '$vid' AND DATE_FORMAT(date_competition, '%d.%c.%Y') <= DATE_FORMAT('$date_end', '%d.%c.%Y') ORDER BY `competition`.`id_competition` ASC;");
                    while($competitions = mysqli_fetch_object($competition)): ?>
                    <div class="tbl">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif?>

                    <?php if($_SESSION['abc'] == '123'):
                    $date_start = $_SESSION['date_start'];
                    $date_end = $_SESSION['date_end'];
                    $vid = $_SESSION['vid'];
                    $competition = mysqli_query($connect, "SELECT id_competition, name_competition, DATE_FORMAT(date_competition, '%d.%c.%Y') AS date, name_kind_of_sport FROM `competition` INNER JOIN kind_of_sport ON competition.id_kind_of_sport = kind_of_sport.id_kind_of_sport WHERE competition.id_kind_of_sport = '$vid' AND DATE_FORMAT(date_competition, '%d.%c.%Y') >= DATE_FORMAT('$date_start', '%d.%c.%Y') AND DATE_FORMAT(date_competition, '%d.%c.%Y') <= DATE_FORMAT('$date_end', '%d.%c.%Y') ORDER BY `competition`.`id_competition` ASC;");
                    while($competitions = mysqli_fetch_object($competition)): ?>
                    <div class="tbl">
                        <p class="name"><?=$competitions->name_competition?></p>
                        <p class="date cnt"><?=$competitions->date?></p>
                        <p class="vid"><?=$competitions->name_kind_of_sport?></p>
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