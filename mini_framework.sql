-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 29 Gru 2018, 17:51
-- Wersja serwera: 10.1.26-MariaDB-0+deb9u1
-- Wersja PHP: 7.2.5-1+0~20180505045740.21+stretch~1.gbpca2fa6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mini_framework`
--

DELIMITER $$
--
-- Procedury
--
CREATE DEFINER=`bagsiur`@`%` PROCEDURE `Price` ()  BEGIN
    SELECT SUM(price) FROM books;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `sex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `sex`) VALUES
(1, 'Jan', 'Kowalski', 0),
(2, 'Karolina', 'Nowak', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` longtext NOT NULL,
  `author` int(11) NOT NULL,
  `publishing_house` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `name`, `price`, `description`, `author`, `publishing_house`) VALUES
(3, 'Przykładowa książka', 14.99, '', 1, 2),
(4, 'Nowa książka zmiana', 11.99, '<ol>\r\n	<li>casdasd</li>\r\n	<li>asdasd</li>\r\n	<li>asdsa</li>\r\n</ol>\r\n', 2, 1),
(5, 'Nowa książka', 15, '', 2, 0),
(10, 'Nowa książka', 15, '', 2, 0),
(12, 'Książka z nowej kolekcji zmiana', 129.99, '<p>Test</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>żźćłąśę &quot; &quot;&quot; ; &#39; / \\ \\</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>zmiana</p>\r\n', 2, 2),
(13, 'Wszystko ok', 126, '<p>Test</p>\r\n', 1, 2),
(14, 'super', 15, '', 1, 1),
(15, 'Nowa książka', 56, '', 1, 1),
(16, 'asdasdasd', 0, '', 1, 1),
(17, 'Nowa książka', 100, '', 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `publishing_houses`
--

CREATE TABLE `publishing_houses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `publishing_houses`
--

INSERT INTO `publishing_houses` (`id`, `name`) VALUES
(1, 'Helion'),
(2, 'EDOM');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishing_houses`
--
ALTER TABLE `publishing_houses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT dla tabeli `publishing_houses`
--
ALTER TABLE `publishing_houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
