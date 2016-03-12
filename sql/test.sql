-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 12 2016 г., 14:13
-- Версия сервера: 5.7.10-log
-- Версия PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Москва'),
(2, 'Санкт-Петербург'),
(3, 'Новосибирск'),
(4, 'Самара'),
(5, 'Норильск'),
(6, 'Мурманск'),
(7, 'Краснодар'),
(8, 'Уфа'),
(9, 'Выборг'),
(10, 'Тюмень'),
(11, 'Тольятти'),
(12, 'Сочи'),
(13, 'Крым'),
(14, 'Орел'),
(15, 'Тверь'),
(16, 'Ростов'),
(17, 'Новгород'),
(18, 'Анапа'),
(19, 'Псков'),
(20, 'Чечня'),
(21, 'Керчь'),
(22, 'Волгоград'),
(23, 'Волгодонск'),
(24, 'Воркута'),
(25, 'Тихвин');

-- --------------------------------------------------------

--
-- Структура таблицы `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`) VALUES
(1, 'Среднее'),
(2, 'Бакалавр'),
(3, 'Магистр');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qualification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `qualification_id`) VALUES
(7, 'Иван Иванов', 1),
(8, 'Петр Смирнов', 2),
(9, 'Феликс Дзержинский', 3),
(10, 'Елизавета Романова', 2),
(11, 'Иван Таранов', 3),
(12, 'Степан Разин', 1),
(13, 'Дмитрий Менделеев', 3),
(14, 'Алесей Попович', 2),
(15, 'Йода Джедаевич', 3),
(16, 'Оби-Ван Кеноби', 3),
(17, 'Фродо Беггинс', 1),
(18, 'Бильбо Беггинс', 2),
(19, 'Людмила Калугина', 2),
(20, 'Эмма Уотсон', 1),
(21, 'Дориан Грей', 2),
(22, 'Мария Склодовская-Кюри', 3),
(23, 'Эрик Картман', 1),
(24, 'Юрий Гагарин', 3),
(25, 'Мери Попинс', 2),
(26, 'Джастин Бибер', 1),
(27, 'Инна Друзь', 3),
(28, 'Боб Марли', 3),
(29, 'Darth Vader', 3),
(30, 'Ольга Круг', 1),
(31, 'Алла Паж', 1),
(32, 'Лилия Машкина', 2),
(33, 'Генадий Евпатьев', 1),
(34, 'Семен Банш', 2),
(35, 'Билл Гейтс', 1),
(36, 'Енот Енот', 3),
(37, 'Индиана Джонс', 3),
(38, 'Мэрилин Монро', 1),
(39, 'Невероятный Халк', 1),
(40, 'Виктор Франкенштейн', 2),
(41, 'Иван Грозный', 1),
(42, 'Марфа Собакина', 1),
(43, 'Гарри Поттер', 1),
(44, 'Андрей Малахов', 2),
(45, 'Владимир Путин', 3),
(46, 'Владимир Жириновсий', 3),
(47, 'Генадий Зюганов', 2),
(48, 'Борис Ельцин', 1),
(49, 'Стас Михайлов', 2),
(50, 'Виктор Цой', 1),
(51, 'Семен Гречко', 1),
(52, 'Юрий Никулин', 3),
(53, 'Михаил Галустян', 2),
(54, 'Джек Дениелс', 2),
(55, 'Холли Берри', 3),
(56, 'Надежда Полещук', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users_cities`
--

CREATE TABLE `users_cities` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `cityID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_cities`
--
ALTER TABLE `users_cities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT для таблицы `users_cities`
--
ALTER TABLE `users_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
