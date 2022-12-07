-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 07 2022 г., 08:09
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_yamas`
--

-- --------------------------------------------------------

--
-- Структура таблицы `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(10) NOT NULL,
  `id_competition` int(10) NOT NULL,
  `id_yamas_user` int(10) NOT NULL,
  `rating` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `activity`
--

INSERT INTO `activity` (`id_activity`, `id_competition`, `id_yamas_user`, `rating`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `competition`
--

CREATE TABLE `competition` (
  `id_competition` int(11) NOT NULL,
  `name_competition` varchar(200) NOT NULL,
  `date_competition` date NOT NULL,
  `id_kind_of_sport` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `competition`
--

INSERT INTO `competition` (`id_competition`, `name_competition`, `date_competition`, `id_kind_of_sport`) VALUES
(2, 'Соревнование по становой тяге', '2022-11-30', 2);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `fio_trainer`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `fio_trainer` (
`FIO_trainer` text
);

-- --------------------------------------------------------

--
-- Структура таблицы `kind_of_sport`
--

CREATE TABLE `kind_of_sport` (
  `id_kind_of_sport` int(10) NOT NULL,
  `name_kind_of_sport` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `kind_of_sport`
--

INSERT INTO `kind_of_sport` (`id_kind_of_sport`, `name_kind_of_sport`) VALUES
(1, 'Волейбол'),
(2, 'Становая тяга');

-- --------------------------------------------------------

--
-- Структура таблицы `trainer`
--

CREATE TABLE `trainer` (
  `id_trainer` int(10) NOT NULL,
  `surname_trainer` varchar(200) NOT NULL,
  `name_trainer` varchar(200) NOT NULL,
  `patronymic_trainer` varchar(200) NOT NULL,
  `date_of_employment_trainier` date NOT NULL,
  `id_rank` int(10) NOT NULL,
  `id_kind_of_sport` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `trainer`
--

INSERT INTO `trainer` (`id_trainer`, `surname_trainer`, `name_trainer`, `patronymic_trainer`, `date_of_employment_trainier`, `id_rank`, `id_kind_of_sport`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', '2019-10-08', 1, 2),
(2, 'Борисов', 'Борис', 'Борисович', '2020-05-10', 4, 1);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `trainery_po_vidy_sporta`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `trainery_po_vidy_sporta` (
`name_kind_of_sport` varchar(200)
,`surname_trainer` varchar(200)
,`name_trainer` varchar(200)
,`patronymic_trainer` varchar(200)
);

-- --------------------------------------------------------

--
-- Структура таблицы `trainer_rank`
--

CREATE TABLE `trainer_rank` (
  `id_trainer_rank` int(10) NOT NULL,
  `name_trainer_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `trainer_rank`
--

INSERT INTO `trainer_rank` (`id_trainer_rank`, `name_trainer_rank`) VALUES
(1, '1-й разряд'),
(2, '2-й разряд'),
(3, '3-й разряд'),
(4, '4-й разряд'),
(5, '5-й разряд'),
(6, '6-й разряд');

-- --------------------------------------------------------

--
-- Структура таблицы `training`
--

CREATE TABLE `training` (
  `id_training` int(10) NOT NULL,
  `id_yamas_user` int(10) NOT NULL,
  `id_trainer` int(10) NOT NULL,
  `date_time_start` datetime NOT NULL,
  `date_time_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `training`
--

INSERT INTO `training` (`id_training`, `id_yamas_user`, `id_trainer`, `date_time_start`, `date_time_end`) VALUES
(2, 1, 1, '2022-12-01 10:17:44', '2022-12-01 13:17:44'),
(3, 1, 2, '2022-12-02 10:18:52', '2022-12-02 13:18:52');

-- --------------------------------------------------------

--
-- Структура таблицы `yamas_user`
--

CREATE TABLE `yamas_user` (
  `id_yamas_user` int(10) NOT NULL,
  `surname_yamas_user` varchar(200) NOT NULL,
  `name_yamas_user` varchar(200) NOT NULL,
  `patronymic_yamas_user` varchar(200) DEFAULT NULL,
  `login_yamas_user` varchar(200) NOT NULL,
  `email_yamas_user` varchar(200) NOT NULL,
  `password_yamas_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `yamas_user`
--

INSERT INTO `yamas_user` (`id_yamas_user`, `surname_yamas_user`, `name_yamas_user`, `patronymic_yamas_user`, `login_yamas_user`, `email_yamas_user`, `password_yamas_user`) VALUES
(1, 'Романов', 'Роман', 'Романович', '', 'roman@email.com', ''),
(2, 'Богданов', 'Богдан', 'Богданович', '', 'bogdan@email.com', ''),
(3, 'asd', 'asd', 'asd', 'asd', 'asd@asd.com', '7ddfdb4c8748d1b54a2a605160c8f73e');

-- --------------------------------------------------------

--
-- Структура для представления `fio_trainer`
--
DROP TABLE IF EXISTS `fio_trainer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fio_trainer`  AS SELECT concat(`trainer`.`surname_trainer`,' ',`trainer`.`name_trainer`,' ',`trainer`.`patronymic_trainer`) AS `FIO_trainer` FROM `trainer` ;

-- --------------------------------------------------------

--
-- Структура для представления `trainery_po_vidy_sporta`
--
DROP TABLE IF EXISTS `trainery_po_vidy_sporta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trainery_po_vidy_sporta`  AS SELECT `kind_of_sport`.`name_kind_of_sport` AS `name_kind_of_sport`, `trainer`.`surname_trainer` AS `surname_trainer`, `trainer`.`name_trainer` AS `name_trainer`, `trainer`.`patronymic_trainer` AS `patronymic_trainer` FROM (`kind_of_sport` join `trainer` on(`trainer`.`id_kind_of_sport` = `kind_of_sport`.`id_kind_of_sport`)) WHERE `kind_of_sport`.`name_kind_of_sport` = 'Становая тяга' ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `id_competition` (`id_competition`),
  ADD KEY `id_yamas_user` (`id_yamas_user`);

--
-- Индексы таблицы `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id_competition`),
  ADD KEY `id_kind_of_sport` (`id_kind_of_sport`);

--
-- Индексы таблицы `kind_of_sport`
--
ALTER TABLE `kind_of_sport`
  ADD PRIMARY KEY (`id_kind_of_sport`);

--
-- Индексы таблицы `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id_trainer`),
  ADD KEY `id_kind_of_sport` (`id_kind_of_sport`),
  ADD KEY `id_rank` (`id_rank`);

--
-- Индексы таблицы `trainer_rank`
--
ALTER TABLE `trainer_rank`
  ADD PRIMARY KEY (`id_trainer_rank`);

--
-- Индексы таблицы `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`),
  ADD KEY `id_yamas_user` (`id_yamas_user`),
  ADD KEY `id_trainer` (`id_trainer`);

--
-- Индексы таблицы `yamas_user`
--
ALTER TABLE `yamas_user`
  ADD PRIMARY KEY (`id_yamas_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `competition`
--
ALTER TABLE `competition`
  MODIFY `id_competition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `kind_of_sport`
--
ALTER TABLE `kind_of_sport`
  MODIFY `id_kind_of_sport` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id_trainer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `trainer_rank`
--
ALTER TABLE `trainer_rank`
  MODIFY `id_trainer_rank` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `yamas_user`
--
ALTER TABLE `yamas_user`
  MODIFY `id_yamas_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`id_competition`) REFERENCES `competition` (`id_competition`),
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`id_yamas_user`) REFERENCES `yamas_user` (`id_yamas_user`);

--
-- Ограничения внешнего ключа таблицы `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_4` FOREIGN KEY (`id_kind_of_sport`) REFERENCES `kind_of_sport` (`id_kind_of_sport`);

--
-- Ограничения внешнего ключа таблицы `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `trainer_ibfk_1` FOREIGN KEY (`id_kind_of_sport`) REFERENCES `kind_of_sport` (`id_kind_of_sport`),
  ADD CONSTRAINT `trainer_ibfk_2` FOREIGN KEY (`id_rank`) REFERENCES `trainer_rank` (`id_trainer_rank`);

--
-- Ограничения внешнего ключа таблицы `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`id_yamas_user`) REFERENCES `yamas_user` (`id_yamas_user`),
  ADD CONSTRAINT `training_ibfk_2` FOREIGN KEY (`id_trainer`) REFERENCES `trainer` (`id_trainer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
