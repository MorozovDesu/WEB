-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 04 2023 г., 13:13
-- Версия сервера: 11.3.0-MariaDB-log
-- Версия PHP: 8.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `outer_flower`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flower_objects`
--

CREATE TABLE `flower_objects` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `info` text NOT NULL,
  `type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `flower_objects`
--

INSERT INTO `flower_objects` (`id`, `title`, `image`, `description`, `info`, `type`) VALUES
(1, 'Розы', 'https://kartinki.pics/pics/uploads/posts/2022-09/1663603848_2-kartinkin-net-p-krasivie-belie-rozi-na-prirode-tsveti-5.jpg', 'Рассказываю о розах.', 'В естественных местообитаниях розы представляют собой листопадные или вечнозеленые кустарники и кустарнички высотой от 15 см до 3 м и выше, некоторые виды с длинными (до 7-9 м), тонкими, стелющимися по земле или цепляющими за опору побегами. Все розы по форме куста подразделяются на кустовые и плетистые.', 'Кустовые'),
(2, 'Ромашки', 'https://img.freepik.com/premium-photo/camomile-in-the-nature-camomile-daisy-flowers-field-in-summer-day-chamomile-flowers-background_73990-1100.jpg', 'Рассказываю о ромашках', 'Ромашка – это абсолютно неприхотливое растение, цветущее в первый год жизни. Имеет тонкий стебель и узкие зеленые листья. Цветки состоят из яркой желтой сердцевины и вытянутых белоснежных лепестков. Они собраны в корзиночки небольшими группами, благодаря чему цветение кажется пышным.', 'Кустовые'),
(3, 'Лилии', 'https://flowers.ua/images/Flowers/articles/304-img-1.jpg', 'Рассказываю о лилиях', 'Лилия — род растений семейства Лилейные. Многолетние травы, снабжённые луковицами, состоящими из мясистых низовых листьев, расположенных черепитчато, белого, розоватого или желтоватого цвета.', 'Одиночные'),
(4, 'Пионы', 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Tallinna_Botaanikaaed_4.jpg', 'Рассказываю о пионах', 'Пион — род травянистых многолетников и листопадных кустарников. Единственный род семейства Пионовые, ранее род относили к семейству лютиковых. Пионы цветут в конце весны, ценятся садоводами за пышную листву, эффектные цветы и декоративные плоды.', 'Одиночные'),
(5, 'Гипсофилы', 'https://tsvetomania.ru/upload/resize_cache/iblock/6bc/710_605_1/6bcfc29fccca0dbd799db6d4e34eab81.jpg', 'Рассказываю о гипсофилах', 'Качим, или Гипсофила, или Гипсолюбка, — род цветковых растений семейства Гвоздичные. Многолетние или однолетние, часто сильно ветвистые травы, редко небольшие полукустарники.', 'Кустовые');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `flower_objects`
--
ALTER TABLE `flower_objects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `flower_objects`
--
ALTER TABLE `flower_objects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
