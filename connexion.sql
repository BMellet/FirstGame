-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2018 at 01:43 PM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prepr941845`
--

-- --------------------------------------------------------

--
-- Table structure for table `Aviation`
--

CREATE TABLE `Aviation` (
  `idAviation` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Aviation',
  `value` int(20) NOT NULL,
  `idrec` int(20) NOT NULL DEFAULT '1',
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Aviation`
--

INSERT INTO `Aviation` (`idAviation`, `name`, `value`, `idrec`, `time`) VALUES
(0, 'Aviation', 3000, 1, 45),
(1, 'Aviation', 6000, 1, 75);

-- --------------------------------------------------------

--
-- Table structure for table `batiments`
--

CREATE TABLE `batiments` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `batiments`
--

INSERT INTO `batiments` (`id`, `name`, `description`) VALUES
(0, 'Temple', 'OK'),
(1, 'Hotel', 'OK'),
(2, 'Entrepot', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `Entrepot`
--

CREATE TABLE `Entrepot` (
  `idEntrepot` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Entrepot',
  `value` int(20) NOT NULL,
  `idbat` int(20) NOT NULL DEFAULT '2',
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Entrepot`
--

INSERT INTO `Entrepot` (`idEntrepot`, `name`, `value`, `idbat`, `time`) VALUES
(0, 'Entrepot', 1000, 2, 50),
(1, 'Entrepot', 2000, 2, 55),
(2, 'Entrepot', 4000, 2, 75),
(3, 'Entrepot', 8000, 2, 120),
(4, 'Entrepot', 20000, 2, 180);

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `idHotel` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Hotel',
  `value` int(20) NOT NULL,
  `idbat` int(20) NOT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Hotel`
--

INSERT INTO `Hotel` (`idHotel`, `name`, `value`, `idbat`, `time`) VALUES
(0, 'Hotel', 2500, 1, 60),
(1, 'Hotel', 5000, 1, 60),
(2, 'Hotel', 10000, 1, 0),
(3, 'Hotel', 20000, 1, 0),
(4, 'Hotel', 50000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `categorie` varchar(255) COLLATE utf8_bin NOT NULL,
  `Temple` int(20) NOT NULL DEFAULT '0',
  `Hotel` int(20) NOT NULL DEFAULT '0',
  `Entrepot` int(20) NOT NULL DEFAULT '0',
  `Religion` int(20) NOT NULL DEFAULT '0',
  `Aviation` int(20) NOT NULL DEFAULT '0',
  `Plantation` int(20) NOT NULL DEFAULT '0',
  `argent` int(20) NOT NULL DEFAULT '10000',
  `lumens` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `email`, `password`, `categorie`, `Temple`, `Hotel`, `Entrepot`, `Religion`, `Aviation`, `Plantation`, `argent`, `lumens`) VALUES
(15, 'Fowder', 'emile.troccaz@laposte.net', '8e71dbc240f5c5616e7b9615be9819f99abf4f07c8cb30cb57445b42bf3d653c', 'Commercial', 0, 0, 0, 0, 0, 0, 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Plantation`
--

CREATE TABLE `Plantation` (
  `idPlantation` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Plantation',
  `value` int(20) NOT NULL,
  `idrec` int(20) NOT NULL DEFAULT '2',
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Plantation`
--

INSERT INTO `Plantation` (`idPlantation`, `name`, `value`, `idrec`, `time`) VALUES
(0, 'Plantation', 7000, 2, 180),
(1, 'Plantation', 20000, 2, 600);

-- --------------------------------------------------------

--
-- Table structure for table `recherches`
--

CREATE TABLE `recherches` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `recherches`
--

INSERT INTO `recherches` (`id`, `name`, `description`) VALUES
(0, 'Religion', 'test'),
(1, 'Aviation', 'test'),
(2, 'Plantation', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `Religion`
--

CREATE TABLE `Religion` (
  `idReligion` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Religion',
  `value` int(20) NOT NULL,
  `idrec` int(20) NOT NULL DEFAULT '0',
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Religion`
--

INSERT INTO `Religion` (`idReligion`, `name`, `value`, `idrec`, `time`) VALUES
(0, 'Religion', 2000, 0, 55),
(1, 'Religion', 4000, 0, 90);

-- --------------------------------------------------------

--
-- Table structure for table `Temple`
--

CREATE TABLE `Temple` (
  `idTemple` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'Temple',
  `value` int(20) NOT NULL,
  `idbat` int(20) NOT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Temple`
--

INSERT INTO `Temple` (`idTemple`, `name`, `value`, `idbat`, `time`) VALUES
(0, 'Temple', 5000, 0, 60),
(1, 'Temple', 10000, 0, 60),
(2, 'Temple', 20000, 0, 0),
(3, 'Temple', 40000, 0, 0),
(4, 'Temple', 100000, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Aviation`
--
ALTER TABLE `Aviation`
  ADD PRIMARY KEY (`idAviation`),
  ADD KEY `idAviation` (`idAviation`),
  ADD KEY `name` (`name`),
  ADD KEY `idrec` (`idrec`);

--
-- Indexes for table `batiments`
--
ALTER TABLE `batiments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `Entrepot`
--
ALTER TABLE `Entrepot`
  ADD PRIMARY KEY (`idEntrepot`),
  ADD KEY `idEntrepot` (`idEntrepot`),
  ADD KEY `name` (`name`),
  ADD KEY `idbat` (`idbat`);

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`idHotel`),
  ADD KEY `idhotel` (`idHotel`),
  ADD KEY `name` (`name`),
  ADD KEY `idbat` (`idbat`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temple` (`Temple`),
  ADD KEY `hotel` (`Hotel`),
  ADD KEY `Entrepot` (`Entrepot`),
  ADD KEY `Religion` (`Religion`),
  ADD KEY `Religion_2` (`Religion`),
  ADD KEY `Aviation` (`Aviation`),
  ADD KEY `Plantation` (`Plantation`);

--
-- Indexes for table `Plantation`
--
ALTER TABLE `Plantation`
  ADD PRIMARY KEY (`idPlantation`),
  ADD KEY `idAviation` (`idPlantation`),
  ADD KEY `name` (`name`),
  ADD KEY `idrec` (`idrec`);

--
-- Indexes for table `recherches`
--
ALTER TABLE `recherches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `Religion`
--
ALTER TABLE `Religion`
  ADD PRIMARY KEY (`idReligion`),
  ADD KEY `idReligion` (`idReligion`),
  ADD KEY `name` (`name`),
  ADD KEY `idrec` (`idrec`);

--
-- Indexes for table `Temple`
--
ALTER TABLE `Temple`
  ADD PRIMARY KEY (`idTemple`),
  ADD KEY `idtemple` (`idTemple`),
  ADD KEY `name` (`name`),
  ADD KEY `idbat` (`idbat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Aviation`
--
ALTER TABLE `Aviation`
  ADD CONSTRAINT `Aviation_ibfk_1` FOREIGN KEY (`idrec`) REFERENCES `recherches` (`id`);

--
-- Constraints for table `Entrepot`
--
ALTER TABLE `Entrepot`
  ADD CONSTRAINT `Entrepot_ibfk_1` FOREIGN KEY (`idbat`) REFERENCES `batiments` (`id`);

--
-- Constraints for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD CONSTRAINT `Hotel_ibfk_1` FOREIGN KEY (`idbat`) REFERENCES `batiments` (`id`);

--
-- Constraints for table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`Temple`) REFERENCES `Temple` (`idTemple`),
  ADD CONSTRAINT `membre_ibfk_2` FOREIGN KEY (`Hotel`) REFERENCES `Hotel` (`idHotel`),
  ADD CONSTRAINT `membre_ibfk_3` FOREIGN KEY (`Entrepot`) REFERENCES `Entrepot` (`idEntrepot`),
  ADD CONSTRAINT `membre_ibfk_4` FOREIGN KEY (`Religion`) REFERENCES `Religion` (`idReligion`),
  ADD CONSTRAINT `membre_ibfk_5` FOREIGN KEY (`Aviation`) REFERENCES `Aviation` (`idAviation`),
  ADD CONSTRAINT `membre_ibfk_6` FOREIGN KEY (`Plantation`) REFERENCES `Plantation` (`idPlantation`);

--
-- Constraints for table `Plantation`
--
ALTER TABLE `Plantation`
  ADD CONSTRAINT `Plantation_ibfk_1` FOREIGN KEY (`idrec`) REFERENCES `recherches` (`id`);

--
-- Constraints for table `Religion`
--
ALTER TABLE `Religion`
  ADD CONSTRAINT `Religion_ibfk_1` FOREIGN KEY (`idrec`) REFERENCES `recherches` (`id`);

--
-- Constraints for table `Temple`
--
ALTER TABLE `Temple`
  ADD CONSTRAINT `Temple_ibfk_1` FOREIGN KEY (`idbat`) REFERENCES `batiments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
