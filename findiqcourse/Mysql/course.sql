-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Hazırlanma Vaxtı: 18 Apr, 2025 saat 15:02
-- Server versiyası: 10.4.32-MariaDB
-- PHP Versiyası: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `course`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `arxiv_muellimler`
--

CREATE TABLE `arxiv_muellimler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL,
  `soyad` varchar(255) DEFAULT NULL,
  `ataadi` varchar(255) DEFAULT NULL,
  `finkod` varchar(255) DEFAULT NULL,
  `nomre` varchar(255) DEFAULT NULL,
  `tedris` varchar(255) DEFAULT NULL,
  `dil` varchar(100) DEFAULT NULL,
  `silinme_tarixi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Sxemi çıxarılan cedvel `arxiv_muellimler`
--

INSERT INTO `arxiv_muellimler` (`id`, `ad`, `soyad`, `ataadi`, `finkod`, `nomre`, `tedris`, `dil`, `silinme_tarixi`) VALUES
(1, 'İsmayıl', 'Şərifli', 'Rahib oğlu', '8378459', '099-300-64-44', 'İnglish-dili', 'Azərbaycan ', '2025-04-15 18:25:43');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `arxiv_telebeler`
--

CREATE TABLE `arxiv_telebeler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL,
  `soyad` varchar(255) DEFAULT NULL,
  `ataadi` varchar(255) DEFAULT NULL,
  `finkod` varchar(255) DEFAULT NULL,
  `nomre` varchar(255) DEFAULT NULL,
  `tedris` varchar(255) DEFAULT NULL,
  `dil` varchar(100) DEFAULT NULL,
  `ayliqmuddet` varchar(50) DEFAULT NULL,
  `muellim` varchar(100) DEFAULT NULL,
  `ayliqodenis` varchar(50) DEFAULT NULL,
  `silinme_tarixi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Sxemi çıxarılan cedvel `arxiv_telebeler`
--

INSERT INTO `arxiv_telebeler` (`id`, `ad`, `soyad`, `ataadi`, `finkod`, `nomre`, `tedris`, `dil`, `ayliqmuddet`, `muellim`, `ayliqodenis`, `silinme_tarixi`) VALUES
(1, 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', 'tt', '', '2025-04-15 18:19:07'),
(2, '1', '2', '3', '4', '5', '6', '7', '8', '', '9', '2025-04-15 23:05:07'),
(3, 'slaam', 'yy', 'yy', 'yy', 'yy', 'yy', 'yy', 'yy', '8', 'yy', '2025-04-17 19:47:24'),
(4, 'slama', 'salam', 'slaam1', '4', '5', '6', '7', '8', '8', '9', '2025-04-18 16:54:01'),
(5, 'ismayil', 'yusifov', 'rahib', 'jkjk', '099-300-64-44', 'İnglish-dili', 'Azərbaycan ', 'dfv', 'ismayil', '12', '2025-04-18 16:54:47');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `telebe_id` int(11) NOT NULL,
  `tarix` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Sxemi çıxarılan cedvel `attendance`
--

INSERT INTO `attendance` (`id`, `telebe_id`, `tarix`) VALUES
(1, 2, '2025-04-02'),
(2, 2, '2025-04-03'),
(3, 2, '2025-04-04'),
(4, 2, '2025-04-05'),
(5, 4, '2025-04-02'),
(6, 4, '2025-04-03'),
(7, 4, '2025-01-10'),
(8, 4, '2025-01-12'),
(9, 8, '2025-04-02'),
(10, 8, '2025-04-03'),
(11, 8, '2024-10-03'),
(12, 8, '2024-10-04'),
(13, 4, '2025-04-04'),
(14, 4, '2025-04-12'),
(15, 4, '2025-04-20'),
(16, 2, '2025-04-06'),
(17, 2, '2025-04-09'),
(18, 3, '2025-04-01'),
(19, 3, '2025-04-02'),
(20, 3, '2025-04-03'),
(21, 3, '2025-04-04'),
(22, 3, '2025-04-05'),
(23, 3, '2025-04-06'),
(24, 3, '2025-04-07'),
(25, 3, '2025-04-14'),
(26, 3, '2025-04-13'),
(27, 3, '2025-04-12'),
(28, 3, '2025-04-11'),
(29, 3, '2025-04-09'),
(30, 3, '2025-04-10'),
(31, 3, '2025-04-08'),
(32, 3, '2025-04-15'),
(33, 3, '2025-04-16'),
(34, 3, '2025-04-19'),
(35, 3, '2025-04-17'),
(36, 3, '2025-04-18'),
(37, 3, '2025-04-25'),
(38, 3, '2025-04-24'),
(39, 3, '2025-04-23'),
(40, 3, '2025-04-22'),
(41, 3, '2025-04-29'),
(42, 3, '2025-04-30'),
(43, 3, '2025-04-26'),
(44, 3, '2025-04-27'),
(45, 3, '2025-04-20'),
(46, 3, '2025-04-21'),
(47, 3, '2025-04-28'),
(48, 8, '2025-04-04'),
(49, 12, '2025-04-01'),
(50, 12, '2025-04-03'),
(51, 19, '2025-04-01'),
(52, 19, '2025-04-02'),
(53, 19, '2025-04-03'),
(54, 19, '2025-04-05'),
(55, 19, '2025-04-18'),
(56, 19, '2025-04-10'),
(57, 19, '2025-04-23'),
(58, 19, '2025-04-19'),
(59, 19, '2025-04-13'),
(60, 17, '2025-04-01'),
(61, 17, '2025-04-02'),
(62, 17, '2025-04-03'),
(63, 17, '2025-04-04'),
(64, 17, '2025-04-05'),
(65, 17, '2025-04-06'),
(66, 17, '2025-04-07'),
(67, 17, '2025-04-14'),
(68, 17, '2025-04-13'),
(69, 17, '2025-04-12'),
(70, 17, '2025-04-11'),
(71, 17, '2025-04-10'),
(72, 17, '2025-04-09'),
(73, 17, '2025-04-08'),
(74, 17, '2025-04-15'),
(75, 17, '2025-04-16'),
(76, 17, '2025-04-17'),
(77, 17, '2025-04-18'),
(78, 17, '2025-04-19'),
(79, 17, '2025-04-20'),
(80, 17, '2025-04-21'),
(81, 17, '2025-04-28'),
(82, 17, '2025-04-27'),
(83, 17, '2025-04-26'),
(84, 17, '2025-04-25'),
(85, 17, '2025-04-24'),
(86, 17, '2025-04-23'),
(87, 17, '2025-04-22'),
(88, 17, '2025-04-29'),
(89, 17, '2025-04-30'),
(90, 17, '2025-05-01'),
(91, 17, '2025-05-02'),
(92, 17, '2025-05-03'),
(93, 17, '2025-05-04'),
(94, 17, '2025-05-05'),
(95, 17, '2025-05-06'),
(96, 17, '2025-05-07'),
(97, 17, '2025-05-14'),
(98, 17, '2025-05-13'),
(99, 17, '2025-05-12'),
(100, 17, '2025-05-11'),
(101, 17, '2025-05-10'),
(102, 17, '2025-05-08'),
(103, 17, '2025-05-09'),
(104, 17, '2025-05-15'),
(105, 17, '2025-05-16'),
(106, 17, '2025-05-17'),
(107, 17, '2025-05-18'),
(108, 17, '2025-05-19'),
(109, 17, '2025-05-21'),
(110, 17, '2025-05-20'),
(111, 17, '2025-05-27'),
(112, 17, '2025-05-28'),
(113, 17, '2025-05-26'),
(114, 17, '2025-05-24'),
(115, 17, '2025-05-25'),
(116, 17, '2025-05-23'),
(117, 17, '2025-05-22'),
(118, 17, '2025-05-29'),
(119, 17, '2025-05-30'),
(120, 17, '2025-05-31'),
(121, 17, '2025-06-07'),
(122, 17, '2025-06-06'),
(123, 17, '2025-06-05'),
(124, 17, '2025-06-04'),
(125, 17, '2025-06-03'),
(126, 17, '2025-06-02'),
(127, 17, '2025-06-01'),
(128, 17, '2025-06-08'),
(129, 17, '2025-06-09'),
(130, 17, '2025-06-10'),
(131, 17, '2025-06-11'),
(132, 17, '2025-06-12'),
(133, 17, '2025-06-13'),
(134, 17, '2025-06-14'),
(135, 17, '2025-06-21'),
(136, 17, '2025-06-20'),
(137, 17, '2025-06-19'),
(138, 17, '2025-06-18'),
(139, 17, '2025-06-17'),
(140, 17, '2025-06-16'),
(141, 17, '2025-06-15'),
(142, 17, '2025-06-22'),
(143, 17, '2025-06-23'),
(144, 17, '2025-06-30'),
(145, 17, '2025-06-29'),
(146, 17, '2025-06-24'),
(147, 17, '2025-06-25'),
(148, 17, '2025-06-26'),
(149, 17, '2025-06-27'),
(150, 17, '2025-06-28'),
(151, 17, '2025-07-01'),
(152, 17, '2025-07-02'),
(153, 17, '2025-07-03'),
(154, 17, '2025-07-04'),
(155, 17, '2025-07-05');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `muellimler`
--

CREATE TABLE `muellimler` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `ataadi` varchar(50) NOT NULL,
  `finkod` varchar(50) NOT NULL,
  `nomre` varchar(50) NOT NULL,
  `tedris` varchar(50) NOT NULL,
  `dil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Sxemi çıxarılan cedvel `muellimler`
--

INSERT INTO `muellimler` (`id`, `ad`, `soyad`, `ataadi`, `finkod`, `nomre`, `tedris`, `dil`) VALUES
(10, 'HBHBH', 'rüsdəmova', 'zaur', '7878ghhhjj', '099-300-64-44', 'İnglish-dili', 'Azərbaycan ');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `telebeler`
--

CREATE TABLE `telebeler` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `ataadi` varchar(50) NOT NULL,
  `finkod` varchar(50) NOT NULL,
  `nomre` varchar(50) NOT NULL,
  `tedris` varchar(50) NOT NULL,
  `dil` varchar(50) NOT NULL,
  `ayliqmuddet` varchar(50) NOT NULL,
  `ayliqodenis` varchar(50) NOT NULL,
  `muellim` varchar(50) NOT NULL,
  `gunler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Sxemi çıxarılan cedvel `telebeler`
--

INSERT INTO `telebeler` (`id`, `ad`, `soyad`, `ataadi`, `finkod`, `nomre`, `tedris`, `dil`, `ayliqmuddet`, `ayliqodenis`, `muellim`, `gunler`) VALUES
(14, 'ismayil', 'yusifov', 'rahib', 'jkjk', '099-300-64-44', 'İnglish-dili', 'aze', 'dfv', '120', '8', NULL),
(15, 'yy', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', '8', NULL),
(16, 'j', 'j', 'j', 'j', 'j', 'j', 'j', 'j', 'j', '9', NULL),
(17, 'aydin', 'yusifov', 'ata', 'fin', 'elaqe', 'tedris', 'dil', 'ayliq', 'odenis', '', NULL),
(18, 'aydin', 'yusifov', 'kjk', '7878ghhhjj', '099-300-64-44', 'İnglish-dili', 'jkj', '8', 'tt', 'İsmayıl', NULL),
(19, 'ismayil', 'yusifov', 'rahib', '7878ghhhjj', '099-300-64-44', 'riyaz', 'Azərbaycan ', '11', '450', '', '1,3,5'),
(20, 'ismayil', 'serifli', 'rahib', '7878ghhhjj', '099-300-64-44', 'İnglish-dili', 'Azərbaycan ', '8', 'jj', '', '1,2,3,4,5,6,7'),
(21, 'ismayil', 'serifli', 'rahib', '7878ghhhjj', '099-300-64-44', 'İnglish-dili', 'Azərbaycan ', 'dfv', '9', 'ismayil', '3,5');

--
-- Indexes for dumped tables
--

--
-- Cədvəl üçün indekslər `arxiv_muellimler`
--
ALTER TABLE `arxiv_muellimler`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `arxiv_telebeler`
--
ALTER TABLE `arxiv_telebeler`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `muellimler`
--
ALTER TABLE `muellimler`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `telebeler`
--
ALTER TABLE `telebeler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Cədvəl üçün AUTO_INCREMENT `arxiv_muellimler`
--
ALTER TABLE `arxiv_muellimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Cədvəl üçün AUTO_INCREMENT `arxiv_telebeler`
--
ALTER TABLE `arxiv_telebeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Cədvəl üçün AUTO_INCREMENT `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- Cədvəl üçün AUTO_INCREMENT `muellimler`
--
ALTER TABLE `muellimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Cədvəl üçün AUTO_INCREMENT `telebeler`
--
ALTER TABLE `telebeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
