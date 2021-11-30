-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-11-30 15:56:40
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `survey`
--

-- --------------------------------------------------------

--
-- 資料表結構 `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(22) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(22) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `live` varchar(2) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `permission` int(5) UNSIGNED NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `password`, `name`, `gender`, `birthday`, `live`, `permission`, `create_time`) VALUES
(1, 'test', 'test', 'han', 1, '1989-09-23', 'S', 3, '2021-11-24 21:07:35'),
(2, 'test1', 'test1', 'amy', 0, '2021-11-22', 'A', 0, '2021-11-29 21:23:38'),
(3, 'test1234', 'test1234', 'test1234', 1, '2021-11-02', 'A', 0, '2021-11-30 22:19:04'),
(4, 'qwe12345', 'qwe12345', 'qwe12345', 1, '2021-11-23', 'A', 0, '2021-11-30 22:36:35'),
(5, 'ttttttttttt', 'ttttttttttt', 'ttttttttttt', 1, '2021-11-02', 'A', 0, '2021-11-30 22:44:50'),
(6, 'test12345', 'test12345', 'test12345', 1, '2021-11-01', 'A', 0, '2021-11-30 22:52:31'),
(7, 'test123456', 'test123456', 'test123456', 1, '2021-11-08', 'A', 0, '2021-11-30 22:56:22');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
