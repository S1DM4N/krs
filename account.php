<?php
require_once "core.php";

if (!$_SESSION['id_yamas_user']) {
    header('Location: registration.php');
}

// $Database = new Database();
// $days = array( 1 => "Понедельник" , "Вторник" , "Среда" , "Четверг" , "Пятница" , "Суббота" , "Воскресенье" );
// $months = array(1 => "Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
// $hours = array (1 => "Час", "Часа", "Часа", "Часа", "Часов", "Часов", "Часов", "Часов", "Часов", "Часов", "Часов", "Часов",);

// $qry = 'SELECT name_yamas_user, surname_yamas_user, patronymic_yamas_user, section_name, sport_name, coach_name, coach_surname, u.id_coach, u.id_section, u.id_sport, schedule_date, schedule_duration, id_schedule FROM yamas_user u INNER JOIN section s ON u.id_section = s.id_section INNER JOIN coach c on u.id_coach = c.id_coach INNER JOIN sport s2 on u.id_sport = s2.id_sport INNER JOIN schedule s3 ON u.id_sport = s3.id_sport WHERE u.id_yamas_user = :id';
// $parm = ['id' => $_SESSION['id_yamas_user']];
// $user = $Database->getRow($qry, $parm);


// $parm = ['id_section' => $user['id_section']];
// $qry = 'SELECT * FROM sport WHERE id_section = :id_section';
// $sports = $Database->getAll($qry, $parm);

// $qry = 'SELECT * FROM coach';
// $coaches = $Database->getAll($qry);

// $qry = 'SELECT * FROM section';
// $sections = $Database->getAll($qry);

// $date = $days[date('N', strtotime($user['schedule_date']))] . date(', j ', strtotime($user['schedule_date'])) . $months[date('N', strtotime($user['schedule_date']))];
// $duration = date('G', strtotime($user['schedule_duration']));
// $time = date("H:i", strtotime($user['schedule_date']));
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
                        <div class="one">
                            <ul>
                                <li><p>Секция:</p></li>
                                <li><p>Категория:</p></li>
                                <li><p>Тренер:</p></li>
                            </ul>
                            <ul class="ci">
                                <li><p><?php echo $user['sport_name']?></p></li>
                                <li><p><?php echo $user['section_name']?></p></li>
                                <li><p><?php echo $user['coach_name'] != 'Не выбрано' ?  $user['coach_name'] . " " . $user['coach_surname'] : 'Выберите тренера'?></p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m_bottom ac rd">
                <div class="block">
                        <h1> Редактирование абонемента</h1>
                        <?php if ($user != null): ?>
                            <form method="post" action="func_account.php" id="category">
                                <select form="category" name="section" onchange="document.querySelector('#category').submit()">
                                    <option value="-1" <?php if ($user['id_sport'] == 5 || $user['id_sport'] == 6) echo 'selected' ?> disabled>Выбор спортивной категории</option>
                                    <?php foreach ($sections as $section): ?>
                                        <?php if ($section['id_section'] != 3): ?>
                                            <option value="<?php echo $section['id_section'] ?>" <?php if ($section['id_section'] == $user['id_section']) echo 'selected' ?>><?php echo $section['section_name'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                </select><br><br>
                            </form>
                        <?php else: ?>
                            <form method="post" action="func_account.php" id="category">
                                <select form="category" name="section" onchange="document.querySelector('#category').submit()">
                                    <option value="-1" selected disabled>Выбор спортивной категории</option>
                                    <?php foreach ($sections as $section): ?>
                                        <option value="<?php echo $section['id_section'] ?>"><?php echo $section['section_name'] ?></option>
                                    <?php endforeach;?>
                                </select><br><br>
                            </form>
                        <?php endif; ?>
                    <form method="post" action="func_account.php" id="sport">
                        <select form="sport" name="sport" onchange="document.querySelector('#sport').submit()">
                            <?php if ($user['id_section'] == 3): ?>
                                <option value="-1" selected disabled>Выберите спортивную категорию</option>
                            <?php else: ?>
                                <option value="-1" <?php if ($user != null || $user['id_sport'] == 5 || $user['id_sport'] == 6) echo 'selected' ?> disabled>Выбор спортивной секции</option>
                            <?php endif; ?>
                            <?php foreach ($sports as $sport): ?>
                                <?php if ($sport['id_sport'] != 5 && $sport['id_sport'] != 6): ?>
                                    <option value="<?php echo $sport['id_sport'] ?>" <?php if ($sport['id_sport'] == $user['id_sport']) echo 'selected' ?>><?php echo $sport['sport_name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </select><br><br>
                    </form>
                        <form method="post" action="func_account.php" id="coach">
                            <select form="coach" name="coach" onchange="document.querySelector('#coach').submit()">
                                <option value="-1" <?php if ($user['id_sport'] == 5 || $user['id_sport'] == 6) echo 'selected' ?> disabled>Выбор тренера</option>
                                <?php foreach ($coaches as $coach): ?>
                                    <?php if ($coach['id_coach'] != 5): ?>
                                        <option value="<?php echo $coach['id_coach'] ?>" <?php if ($coach['id_coach'] == $user['id_coach']) echo 'selected' ?>><?php echo $coach['coach_name'] . " " . $coach['coach_surname']?></option>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </select><br><br>
                        </form>
                </div>

                <div class="block rs">
                    <?php if($user == null || $user['id_schedule'] == 3):?>
                        <h1>Расписание занятий</h1>
                        <h2>Выберите спортивную секцию</h2>
                    <?php else: ?>
                        <h1>Расписание занятий</h1>
                        <h3><?php echo $time ?></h3>
                        <p><?php echo $duration . " " . $hours[$duration];  ?></p>
                        <h2><?php echo $date ?></h2>
                    <?php endif;?>

                </div>
            </div>
        </main>
        <?php require "footer.php"?>
    </div>
</body>
</html>