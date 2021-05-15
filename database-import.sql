-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 11:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dream-world`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthdays`
--

CREATE TABLE `birthdays` (
                             `id` int(3) NOT NULL,
                             `person` varchar(255) NOT NULL,
                             `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
                         `id` int(11) NOT NULL,
                         `title` varchar(255) NOT NULL,
                         `most_eaten` varchar(255) NOT NULL,
                         `calories` int(11) NOT NULL,
                         `proteins` int(11) NOT NULL,
                         `carbs` int(11) NOT NULL,
                         `fats` int(11) NOT NULL,
                         `unhealthy` tinyint(4) NOT NULL DEFAULT 0,
                         `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foods_bulking_days`
--

CREATE TABLE `foods_bulking_days` (
                                      `id` int(11) NOT NULL,
                                      `date` date NOT NULL,
                                      `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
                         `id` int(4) NOT NULL,
                         `title` varchar(255) NOT NULL,
                         `content` text NOT NULL,
                         `category` varchar(255) NOT NULL,
                         `date` date NOT NULL DEFAULT '2021-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notes_categories`
--
CREATE TABLE `notes_categories` (
                                    `id` INT NOT NULL AUTO_INCREMENT,
                                    `name` varchar(255) NOT NULL,

                                    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------



--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
                             `id` int(11) NOT NULL,
                             `title` varchar(255) NOT NULL,
                             `description` varchar(255) NOT NULL,
                             `date` date NOT NULL,
                             `active` tinyint(4) NOT NULL DEFAULT 0,
                             `time` varchar(255) NOT NULL,
                             `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reminders_bill`
--

CREATE TABLE `reminders_bill` (
                                  `id` int(11) NOT NULL,
                                  `title` varchar(255) NOT NULL,
                                  `content` varchar(255) NOT NULL,
                                  `date` date NOT NULL,
                                  `active` tinyint(4) NOT NULL,
                                  `time` varchar(255) NOT NULL,
                                  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `creatine` (
    `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reminders_uni`
--

CREATE TABLE `reminders_uni` (
                                 `id` int(11) NOT NULL,
                                 `date` date NOT NULL,
                                 `title` varchar(11) NOT NULL,
                                 `content` text NOT NULL,
                                 `type` varchar(30) NOT NULL,
                                 `time` varchar(15) NOT NULL,
                                 `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthdays`
--
ALTER TABLE `birthdays`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods_bulking_days`
--
ALTER TABLE `foods_bulking_days`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders_bill`
--
ALTER TABLE `reminders_bill`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders_uni`
--
ALTER TABLE `reminders_uni`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthdays`
--
ALTER TABLE `birthdays`
    MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods_bulking_days`
--
ALTER TABLE `foods_bulking_days`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
    MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders_bill`
--
ALTER TABLE `reminders_bill`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders_uni`
--
ALTER TABLE `reminders_uni`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
