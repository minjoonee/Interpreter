-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 18-11-18 04:53
-- 서버 버전: 5.7.22
-- PHP 버전: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `interpreter`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `num` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `input1` varchar(1000) DEFAULT 'X',
  `result1` varchar(1000) DEFAULT 'X',
  `input2` varchar(1000) DEFAULT 'X',
  `result2` varchar(1000) DEFAULT 'X',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`num`, `id`, `title`, `content`, `input1`, `result1`, `input2`, `result2`, `date`) VALUES
(5, 'admin', 'sadf', 'asdf', '', '', '', '', '2018-11-18 12:08:01'),
(6, 'admin', 'test', '테스트', '123', '1', '', '', '2018-11-18 12:39:32'),
(7, 'admin', 'ㄴㄴㄴ', '문제', '123', '1', '', '', '2018-11-18 12:41:16'),
(8, 'admin', '과제', '문제', '1', '2', '', '', '2018-11-18 12:42:15'),
(9, 'admin', '로드 테스트', '2', '3', '4', '', '', '2018-11-18 12:42:27');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
