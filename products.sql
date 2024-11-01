-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 01 2024 г., 14:37
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `products`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'land-cruiser', 1200, 'Toyota Land Cruiser 300 — это премиальный внедорожник, который сочетает в себе мощность, надежность и современные технологии. Оснащен 3.5-литровым V6 с двойным турбонаддувом, он обеспечивает отличную производительность как на асфальте, так и на бездорожье. Система полного привода и продвинутая подвеска делают его способным преодолевать сложные условия. Внутреннее пространство предлагает высококачественные материалы, современные системы информационно-развлекательной системы и комфортабельные сиденья, что делает Land Cruiser 300 идеальным выбором для длительных поездок и', 'landcruz.jpg'),
(2, 'bmw', 1500, 'BMW X6 M Competition — это высокопроизводительный кроссовер, который сочетает в себе динамику спорткара и функциональность SUV. Оснащен 4.4-литровым V8 с двойным турбонаддувом, он развивает мощность до 625 л.с. и обладает потрясающим ускорением. Инновационная система полного привода и адаптивная подвеска обеспечивают выдающуюся управляемость. Интерьер отличается спортивным дизайном, высококачественными материалами и современными технологиями, включая систему управления iDrive и множество функций комфорта.', 'x6.jpg'),
(3, 'audi', 800, 'Audi RS6 — это высокопроизводительный универсал, который предлагает сочетание стиля, пространства и динамики. Под капотом находится 4.0-литровый V8 с двойным турбонаддувом, развивающий около 600 л.с., что обеспечивает мгновенное ускорение и отличную производительность на дороге. Система Quattro полного привода обеспечивает стабильность и управляемость в любых условиях. Интерьер Audi RS6 выполнен с акцентом на роскошь и технологии, включая спортивные сиденья, высококачественные материалы и продвинутую мультимедийную систему. Этот автомобиль идеально подходит для тех, кто ищет мощный и практичный универсал.', 'audi.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
