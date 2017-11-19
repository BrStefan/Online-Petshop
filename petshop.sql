-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2017 at 09:14 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `caini`
--

CREATE TABLE `caini` (
  `Nume produs` text NOT NULL,
  `Pret` int(11) NOT NULL,
  `Cantitate` int(11) NOT NULL,
  `URL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caini`
--

INSERT INTO `caini` (`Nume produs`, `Pret`, `Cantitate`, `URL`) VALUES
('Advance Dog Miel&Orez 12 kg', 65, 10, 'http://localhost/c2.png'),
('PEDIGREE Hrana uscata pentru caini Adult, cu Vita si Pasare 15kg', 95, 24, 'http://localhost/c3.png'),
('FRISKIES Hrana uscata pentru caini JUNIOR, cu Pui, Legume si Morcovi 15kg', 92, 4, 'http://localhost/c4.png');

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `Nume` text NOT NULL,
  `Adresa` text NOT NULL,
  `Comanda` text NOT NULL,
  `Total` text NOT NULL,
  `NumeCont` text NOT NULL,
  `Telefon` text NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`Nume`, `Adresa`, `Comanda`, `Total`, `NumeCont`, `Telefon`, `Email`) VALUES
('Brasoveanu Stefan', 'Aleea Fizicienilor nr 14', ' Advance Dog Miel&Orez 12 kg - 1 bucati - 65 lei PEDIGREE Hrana uscata pentru caini Adult, cu Vita si Pasare 15kg - 1 bucati - 95 lei', '160', 'dezen', '0765929458', 'brasoveanu.stefan@gmail.com'),
('Brasoveanu Stefan', 'Aleea Fizicienilor, nr 14, bloc 1G, etaj 7 ap 41, sector 3, Bucuresti', ' Advance Dog Miel&Orez 12 kg - 1 bucati - 65 lei PEDIGREE Hrana uscata pentru caini Adult, cu Vita si Pasare 15kg - 2 bucati - 190 lei', '255', 'dezen', '0765929458', 'brasoveanu.stefan@gmail.com'),
('Brasoveanu Stefan', 'Aleea Fizicienilor, nr 14, bloc 1G, etaj 7 ap 41, sector 3, Bucuresti', ' Advance Dog Miel&Orez 12 kg - 2 bucati - 130 lei; PEDIGREE Hrana uscata pentru caini Adult, cu Vita si Pasare 15kg - 2 bucati - 190 lei;', '320', 'dezen', '0765929458', 'brasoveanu.stefan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pisici`
--

CREATE TABLE `pisici` (
  `Nume produs` text NOT NULL,
  `Pret` int(11) NOT NULL,
  `Cantitate` int(11) NOT NULL,
  `URL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pisici`
--

INSERT INTO `pisici` (`Nume produs`, `Pret`, `Cantitate`, `URL`) VALUES
('WHISKAS Hrana uscata pentru pisici adulte, cu Miel 1,5kg', 16, 30, 'http://localhost/p1.png'),
('BRIT CARE Cat Lilly Ive Sensitive Digestion 2kg', 35, 10, 'http://localhost/p2.png'),
('FRISKIES Plic hrana umeda pentru pisici, cu Curcan in Sos 100g', 1, 25, 'http://localhost/p3.png');

-- --------------------------------------------------------

--
-- Table structure for table `rozatoare`
--

CREATE TABLE `rozatoare` (
  `Nume produs` text NOT NULL,
  `Pret` int(11) NOT NULL,
  `Cantitate` int(11) NOT NULL,
  `URL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rozatoare`
--

INSERT INTO `rozatoare` (`Nume produs`, `Pret`, `Cantitate`, `URL`) VALUES
('VERSELE-LAGA Prestige Fan Mountain cu papadie 500g', 14, 16, 'http://localhost/r1.png'),
('VITAPOL Premium Hrana completa pentru hamsteri 900g', 16, 32, 'http://localhost/r2.png'),
('VERSELLE-LAGA Prestige Rumegus 4kg', 22, 4, 'http://localhost/r3.png');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `Username` text NOT NULL,
  `Parola` text NOT NULL,
  `Email` text NOT NULL,
  `Activare` text NOT NULL,
  `Verificat` tinyint(1) NOT NULL,
  `Telefon` text NOT NULL,
  `Produse_cumparate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`Username`, `Parola`, `Email`, `Activare`, `Verificat`, `Telefon`, `Produse_cumparate`) VALUES
('dezen', 'qwe', 'brasoveanu.stefan@gmail.com', '5d8792adc2928485f18de6270c459042', 1, '0765929458', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
