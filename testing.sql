-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 10 2018 г., 14:51
-- Версия сервера: 5.5.25
-- Версия PHP: 5.6.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `date_add` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `img`, `date_add`) VALUES
(1, 'news 01', 'desc 01', '', 1541803579),
(2, 'news 02', 'desc 02', '', 1541803592),
(3, 'news 03', 'desc 03', '', 1541803602),
(4, 'News 4', 'Desc 4', '', 1541839638),
(5, 'News 5', 'Desc 5', '', 1541839651),
(6, 'News 6', 'Desc 6', '', 1541839659),
(7, 'News 7', 'Desc 7', '', 1541839668),
(8, 'News 8', 'Desc 8', '', 1541839675),
(9, 'News 9', 'Desc 9', '', 1541839682),
(10, 'News 10', 'Desc 10', '', 1541839691),
(11, 'News 11', 'Desc 11', '', 1541839700),
(12, 'News 12', 'desc 12', '', 1541840449),
(15, 'news 13', 'desc 13', '', 1541854200),
(16, 'news 14', 'desc 14', '/public/imgnews/1541856194.jpg', 1541854228);

-- --------------------------------------------------------

--
-- Структура таблицы `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(56) NOT NULL,
  `img` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date_add` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `slide`
--

INSERT INTO `slide` (`id`, `title`, `img`, `link`, `date_add`) VALUES
(5, 'Доброе утро!', '/public/slider/1541859851.jpg', 'http://testing/', 1541859851),
(6, 'Новый день!', '/public/slider/1541859904.jpeg', 'http://testing/', 1541859906),
(7, 'Найс', '/public/slider/1541859923.jpg', 'http://testing/', 1541859923),
(8, 'Slide 4', '/public/slider/1541859961.jpg', 'http://testing/', 1541859961);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
