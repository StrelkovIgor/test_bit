-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 30 2019 г., 18:17
-- Версия сервера: 5.7.22-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `coin` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `coin`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '7004.00');

-- --------------------------------------------------------

--
-- Структура таблицы `writeofflog`
--

CREATE TABLE `writeofflog` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `coin` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `writeofflog`
--

INSERT INTO `writeofflog` (`id`, `id_user`, `coin`, `balance`, `date`) VALUES
(15, 8750, '8750.00', '8750.00', '2019-10-30 21:08:40'),
(16, 8550, '8550.00', '8550.00', '2019-10-30 21:11:03'),
(17, 8050, '8050.00', '8050.00', '2019-10-30 21:12:17'),
(18, 7550, '7550.00', '7550.00', '2019-10-30 21:13:52'),
(19, 1, '-123.00', '7427.00', '2019-10-30 21:15:05'),
(20, 1, '-300.00', '7304.00', '2019-10-30 21:15:33');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`);

--
-- Индексы таблицы `writeofflog`
--
ALTER TABLE `writeofflog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `writeofflog`
--
ALTER TABLE `writeofflog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
