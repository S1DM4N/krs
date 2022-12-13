<?php
require_once "core.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="wrapper">
        <?php require "header.php";?>
        <main class="main">
            <div class="m_top">
                <div class="content ">
                    <h1>Жизнь - это холст.<br>Разукрась ее красками.</h1>
                </div>
                <div class="content change_1">
                    <h1>Скидка 10%<br>первым посетителям</h1>
                </div>
                <div class="content change_2">
                    <h1>Уже скоро<br>в вашем городе!</h1>
                </div>
            </div>
            <div class="m_bottom">
                <div class="content change_3">
                    <div class="t_contacs">
                        <h1>Наши контакты</h1>
                        <div class="text_c">
                            <h2>Адрес:</h2>
                            <p>г. Москва, Зеленый проспект, 10Б<br>(5 минут пешком от метро Перово)</p>
                            <h2>Телефон:</h2>
                            <a href="tel:+79999999999"><p>+7(999)999-99-99</p></a>
                            <h2>Часы работы</h2>
                            <p> пн-вс: 10:00 - 22:00</p>
                            <h2>E-mail: </h2>
                            <p>info@yamas.ru</p>
                        </div>
                    </div>
                </div>
                <div class="content change_4">
                    <div class="definition">
                        <h1>YAMAS</h1>
                        <p>Cеть фитнес-клубов, основным лозунгом которой является мнение, что каждый человек - супергерой. Команда клуба убеждена, что любой человек обладает скрытой внутренней силой, однако не все знают о ней.<br><br>Залы полностью оснащены новейшим тренажерным оборудованием, а также есть возможность заниматься на групповых тренировках. Фитнес-клубы расположены в разных районах Москвы, что позволяет принимать наибольшее количество людей, желающих открыть в себе способности супергероя!</p>
                    </div>
                </div>
                <div class="rb">
                    <a href="">
                        <div class="content change_5">
                            <h1>Фото</h1>
                        </div>
                    </a>
                    <a href="contacts.php">
                        <div class="content change_6">
                            <h1>Как добраться?</h1>
                        </div>
                    </a>
                </div>
            </div>
        </main>
        <?php require "footer.php"?>
    </div>
</body>
</html>