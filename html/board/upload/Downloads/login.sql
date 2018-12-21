-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 18-11-18 04:52
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
-- 테이블 구조 `login`
--

CREATE TABLE `login` (
  `id` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `login`
--

INSERT INTO `login` (`id`, `pwd`) VALUES
('admin', 'admin');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`,`pwd`);

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`,`pwd`) REFERENCES `member` (`id`, `pwd`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
