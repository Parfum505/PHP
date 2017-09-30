-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 30 2017 г., 22:29
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `restaurant`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'Polish', 'img/1.jpg'),
(2, 'Mexican', 'img/3.jpg'),
(3, 'Italian', 'img/2.jpg'),
(4, 'Drinks', 'img/drinks.jpg'),
(5, 'Desserts', 'img/8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_cat_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_discription` varchar(255) NOT NULL,
  `item_price` float(11,2) NOT NULL,
  `item_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`item_id`, `item_cat_id`, `item_name`, `item_discription`, `item_price`, `item_img`) VALUES
(1, 1, 'Course 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 2.20, 'http://placehold.it/320x150'),
(2, 1, 'Course 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 3.10, 'http://placehold.it/320x150'),
(3, 1, 'Course 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 2.80, 'http://placehold.it/320x150'),
(4, 2, 'Course 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 2.80, 'http://placehold.it/320x150'),
(5, 2, 'Course 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 2.90, 'http://placehold.it/320x150'),
(6, 2, 'Course 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 3.50, 'http://placehold.it/320x150'),
(7, 3, 'Course 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 3.50, 'http://placehold.it/320x150'),
(8, 3, 'Course 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 2.60, 'http://placehold.it/320x150'),
(9, 3, 'Course 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 3.10, 'http://placehold.it/320x150'),
(10, 4, 'Drink 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 3.10, 'http://placehold.it/320x150'),
(11, 4, 'Drink 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 2.10, 'http://placehold.it/320x150'),
(12, 4, 'Drink 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 4.10, 'http://placehold.it/320x150'),
(13, 5, 'Dessert 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 4.10, 'http://placehold.it/320x150'),
(14, 5, 'Dessert 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 3.70, 'http://placehold.it/320x150'),
(15, 5, 'Dessert 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia omnis illum ullam quaerat porro pariatur voluptatibus accusantium officia ratione!', 3.40, 'http://placehold.it/320x150');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
