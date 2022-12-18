    <header class="header">
        <?php require_once 'core.php'?>
                <ul class="top">
                    <li class="phone"><a href="tel:+79999999999">+7 (999) 999-99-99</a></li>
                    <li class="logo"><a href="index.php"><img src="img/logo.svg" alt="logo"></a></li>
                    <?php if(isset($_SESSION['admin'])):?>
                        <li><a href="admin.php"><img src="img/persona.svg" alt="logo"></a></li>
                    <?php elseif ($_SESSION['id_user'] == 0): ?>
                        <li><a href="registration.php"><img src="img/persona.svg" alt="logo"></a></li>
                        <?php else: ?>
                        <li><a href="account.php"><img src="img/persona.svg" alt="logo"></a></li>
                    <?php endif; ?>
                    <?endif;?>
                </ul>
                <ul class="bottom">
                    <li><a href="about.php">О компании</a></li>
                    <li><a href="stock.php">Акции</a></li>
                    <li><a href="services.php">Услуги</a></li>
                    <li><a href="trainers.php">Тренеры</a></li>
                    <li><a href="photo.php">Фотогалерея</a></li>
                    <li><a href="events.php">Мероприятия</a></li>
                    <li><a href="activ.php">Активность</a></li>
                    <li><a href="competition.php">Соревнования</a></li>
                    <li><a href="news.php">Новости</a></li>
                    <li><a href="certificates.php">Сертификаты</a></li>
                    <li><a href="feedback.php">Отзывы</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                </ul>
    </header>