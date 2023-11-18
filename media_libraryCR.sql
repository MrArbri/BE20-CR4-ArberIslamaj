-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2023 at 05:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE20_CR4_ArberIslamaj_BigLibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `media_library`
--

DROP TABLE IF EXISTS `media_library`;
CREATE TABLE `media_library` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `ISBN` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type` varchar(30) NOT NULL,
  `author_first_name` varchar(55) NOT NULL,
  `author_last_name` varchar(55) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `publisher_address` varchar(250) DEFAULT NULL,
  `publish_date` date NOT NULL,
  `availability` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media_library`
--

INSERT INTO `media_library` (`id`, `title`, `picture`, `ISBN`, `description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `availability`) VALUES
(20, 'Emotional Intelligence', '844dd973d2e859cf.jpg', '0553383713', '', 'book', 'Daniel', 'Golman', 'Bantam Books', 'Bantam Books, New York', '2005-09-27', 'available'),
(25, 'Rich dad poor dad', 'default_image.jpg', 'ISBN9781394856980', '', 'book', 'Robert', 'Kiosaki', 'Kiosaki studio', 'New Jersey', '2006-09-26', 'unavailable'),
(27, 'How to talk to anyone', 'edba9a2244ac4bed.jpg', 'ISBN9781982726980', '', 'book', 'Daniel', 'Kiosaki', 'Kiosaki studio', 'New Jersey', '2009-02-20', 'available'),
(101, 'Beware of', 'default_image.jpg', '266153716-3', '', 'dvd', 'Serene', 'Belin', 'Serene Belin', 'Suite 77', '0000-00-00', 'available'),
(102, 'Gamera vs. Barugon', '62f7fba0b10db88c.jpg', '152198895-1', '', 'book', 'Bernardine', 'Lundon', 'Bernardine Lundon', '17th Floor', '2018-11-08', 'available'),
(103, 'Citizen Gangster ', 'default_image.jpg', '887697865-8', '', 'cd', 'Byron', 'Checcucci', 'Byron Checcucci', 'PO Box 52471', '1980-09-22', 'unavailable'),
(104, 'Double Suicide (Shinjû: Ten no amijima)', 'default_image.jpg', '468642285-X', '', 'dvd', 'Dael', 'Beaufoy', 'Dael Beaufoy', 'Suite 46', '1995-06-12', 'available'),
(105, 'Days of Wine and Roses', 'default_image.jpg', '029518650-X', '', 'cd', 'Chaddy', 'Downey', 'Chaddy Downey', 'PO Box 72603', '0000-00-00', 'unavailable'),
(106, 'Sinivalkoinen valhe', '3352946bd61b8bed.jpg', '814812761-1', '', 'cd', 'Nehemiah', 'Gofforth', 'Nehemiah Gofforth', 'Room 1184', '0000-00-00', 'available'),
(107, 'Angel Baby', '407956e35225912d.jpg', '031884990-9', '', 'book', 'Sutherlan', 'Trice', 'Sutherlan Trice', 'Suite 92', '0000-00-00', 'available'),
(108, 'Jönssonligan & den svarta diamanten', 'default_image.jpg', '460831043-7', '', 'dvd', 'Vernon', 'Beaby', 'Vernon Beaby', 'PO Box 5508', '2005-09-27', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media_library`
--
ALTER TABLE `media_library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media_library`
--
ALTER TABLE `media_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
