-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2024 at 10:11 AM
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
-- Database: `user_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `FlightID` int(11) DEFAULT NULL,
  `FlightName` varchar(255) DEFAULT NULL,
  `Dept` varchar(255) DEFAULT NULL,
  `Arr` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Airline` varchar(250) NOT NULL,
  `Seats` varchar(250) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Passport` varchar(255) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `PaymentMethod` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`FlightID`, `FlightName`, `Dept`, `Arr`, `Time`, `Date`, `Price`, `Airline`, `Seats`, `FirstName`, `LastName`, `Passport`, `Address`, `Phone`, `PaymentMethod`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, '', NULL, NULL, NULL, NULL, 0.00, '', '', 'kien', 'bb', 'Mf9193913', 'Hello world street', '029482048', 'Paypal'),
(NULL, '', NULL, NULL, NULL, NULL, 0.00, '', '', 'kien', 'bb', 'Mf9193913', 'ok', '19231038', 'Paypal'),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024-07-14', 799.99, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024-07-14', 799.99, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024-07-14', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024-07-14', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024-07-14', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024-07-14', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'kien', 'bb', 'Mf9193913', 'street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'kien', 'bb', 'Mf9193913', 'street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'kien', 'bb', 'Mf9193913', 'street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Htet', 'Aung', 'MF12345', 'Mingalar Thiri Street', '0997568283', 'KPAY'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Htet', 'Aung', 'MF12345', 'Mingalar Thiri Street', '0997568283', 'KPAY'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Htet', 'Aung', 'MF12345', 'Mingalar Thiri Street', '0997568283', 'KPAY'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Htet', 'Aung', 'MF12345', 'Mingalar Thiri Street', '0997568283', 'KPAY'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', '', '', '', '', '', ''),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Hsu Myat Wai', 'Maung', 'MF12345', 'Mingalar Thiri Street', '0997568283', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Fresh', 'MR1234', 'Mingalar Thiri Street', '0997568283', 'KPAY'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'Mingalar Thiri Street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'Mingalar Thiri Street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'Mingalar Thiri Street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'Mingalar Thiri Street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'Mingalar Thiri Street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'Mingalar Thiri Street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'Mingalar Thiri Street', '9830582045', 'Paypal'),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024', 799.99, 'Aeroflot', '260', 'Mr', 'Aung', 'Mf9193913', 'street', '9830582045', 'Paypal'),
(606, 'JetBlue Airways Flight 606', 'DXB', 'JFK', '16:15:00', '2024', 749.99, 'JetBlue Airways', '220', 'Mr', 'bb', 'MF12345', 'street', '9830582045', 'Paypal'),
(606, 'JetBlue Airways Flight 606', 'DXB', 'JFK', '16:15:00', '2024', 749.99, 'JetBlue Airways', '220', 'Hsu Myat Wai', 'Maung', 'MF12345', 'Mingalar Thiri Street', '0997568283', 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `Flights`
--

CREATE TABLE `Flights` (
  `FlightID` int(25) NOT NULL,
  `FlightName` text NOT NULL,
  `Dept` varchar(250) NOT NULL,
  `Arr` varchar(250) NOT NULL,
  `Time` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Price` varchar(250) NOT NULL,
  `Airline` varchar(350) NOT NULL,
  `Seats` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Flights`
--

INSERT INTO `Flights` (`FlightID`, `FlightName`, `Dept`, `Arr`, `Time`, `Date`, `Price`, `Airline`, `Seats`) VALUES
(101, 'American Airlines Flight 101', 'JFK', 'LAX', '06:00:00', '2024-06-21', '399.99', 'American Airlines', 180),
(202, 'Delta Air Lines Flight 202', 'LHR', 'CDG', '14:30:00', '2024-06-22', '299.99', 'Delta Air Lines', 200),
(303, 'United Airlines Flight 303', 'SFO', 'ORD', '09:45:00', '2024-06-23', '449.99', 'United Airlines', 220),
(404, 'Southwest Airlines Flight 404', 'HKG', 'NRT', '21:00:00', '2024-06-24', '599.99', 'Southwest Airlines', 150),
(505, 'Alaska Airlines Flight 505', 'IAD', 'FRA', '11:30:00', '2024-06-25', '499.99', 'Alaska Airlines', 180),
(606, 'JetBlue Airways Flight 606', 'DXB', 'JFK', '16:15:00', '2024-06-26', '749.99', 'JetBlue Airways', 220),
(707, 'Air France Flight 707', 'AMS', 'MAD', '12:45:00', '2024-06-27', '349.99', 'Air France', 200),
(808, 'Lufthansa Flight 808', 'MEX', 'GRU', '19:00:00', '2024-06-28', '599.99', 'Lufthansa', 240),
(909, 'Korean Air Lines Flight 909', 'ICN', 'TPE', '08:15:00', '2024-06-29', '449.99', 'Korean Air Lines', 180),
(1010, 'Emirates Flight 1010', 'DFW', 'SAO', '17:00:00', '2024-06-30', '599.99', 'Emirates', 280),
(1111, 'British Airways Flight 1111', 'LGA', 'MIA', '07:30:00', '2024-07-01', '399.99', 'British Airways', 200),
(1212, 'Air Canada Flight 1212', 'BOS', 'SEA', '13:00:00', '2024-07-02', '449.99', 'Air Canada', 190),
(1313, 'Cathay Pacific Flight 1313', 'ORD', 'DEN', '15:45:00', '2024-07-03', '349.99', 'Cathay Pacific', 220),
(1414, 'Singapore Airlines Flight 1414', 'ATL', 'SFO', '20:30:00', '2024-07-04', '549.99', 'Singapore Airlines', 240),
(1515, 'Qatar Airways Flight 1515', 'FLL', 'LAS', '09:45:00', '2024-07-05', '399.99', 'Qatar Airways', 210),
(1616, 'EVA Air Flight 1616', 'SAN', 'PDX', '11:00:00', '2024-07-06', '449.99', 'EVA Air', 200),
(1717, 'KLM Royal Dutch Airlines Flight 1717', 'MSP', 'BNA', '17:30:00', '2024-07-07', '379.99', 'KLM Royal Dutch Airlines', 190),
(1818, 'Etihad Airways Flight 1818', 'DTW', 'PHL', '08:00:00', '2024-07-08', '369.99', 'Etihad Airways', 230),
(1919, 'Turkish Airlines Flight 1919', 'IAH', 'AUS', '14:30:00', '2024-07-09', '409.99', 'Turkish Airlines', 210),
(2020, 'Qantas Airways Flight 2020', 'MCO', 'RSW', '06:45:00', '2024-07-10', '349.99', 'Qantas Airways', 180),
(2121, 'Hawaiian Airlines Flight 2121', 'JFK', 'HNL', '10:00:00', '2024-07-11', '699.99', 'Hawaiian Airlines', 240),
(2222, 'WestJet Flight 2222', 'LHR', 'YYZ', '18:15:00', '2024-07-12', '399.99', 'WestJet', 190),
(2323, 'China Eastern Airlines Flight 2323', 'SFO', 'PEK', '22:30:00', '2024-07-13', '599.99', 'China Eastern Airlines', 280),
(2424, 'Aeroflot Flight 2424', 'DXB', 'SVO', '15:00:00', '2024-07-14', '799.99', 'Aeroflot', 260),
(2525, 'Aeromexico Flight 2525', 'MEX', 'GDL', '07:45:00', '2024-07-15', '349.99', 'Aeromexico', 200),
(2626, 'LATAM Airlines Flight 2626', 'GRU', 'SCL', '20:00:00', '2024-07-16', '599.99', 'LATAM Airlines', 230),
(2727, 'JAL (Japan Airlines) Flight 2727', 'NRT', 'HND', '11:30:00', '2024-07-17', '499.99', 'JAL (Japan Airlines)', 210),
(2828, 'ANA (All Nippon Airways) Flight 2828', 'HND', 'KIX', '16:45:00', '2024-07-18', '449.99', 'ANA (All Nippon Airways)', 190),
(2929, 'Air India Flight 2929', 'DEL', 'BOM', '08:00:00', '2024-07-19', '349.99', 'Air India', 220),
(3030, 'Iberia Flight 3030', 'MAD', 'BCN', '14:00:00', '2024-07-20', '299.99', 'Iberia', 180),
(3131, 'TAP Air Portugal Flight 3131', 'LIS', 'OPO', '09:45:00', '2024-07-21', '249.99', 'TAP Air Portugal', 200),
(3232, 'LOT Polish Airlines Flight 3232', 'WAW', 'KRK', '18:30:00', '2024-07-22', '399.99', 'LOT Polish Airlines', 170),
(3333, 'Finnair Flight 3333', 'HEL', 'TLL', '07:15:00', '2024-07-23', '279.99', 'Finnair', 190),
(3434, 'Austrian Airlines Flight 3434', 'VIE', 'BUD', '13:00:00', '2024-07-24', '349.99', 'Austrian Airlines', 210),
(3535, 'Brussels Airlines Flight 3535', 'BRU', 'LUX', '11:00:00', '2024-07-25', '199.99', 'Brussels Airlines', 150);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Ussername` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` varchar(50) NOT NULL,
  `Username` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Email`, `Password`) VALUES
('', 'Kienbb', 'kienbrowns1129@gmail.com', '12345678'),
('', 'Htet', 'kienbrown1129@gmail.com', '12345678'),
('', 'kien', 'kienbrown119@gmail.com', ''),
('', 'kien', 'kienbrwn119@gmail.com', ''),
('', 'HtetBB', 'kienbn1129@gmail.com', ''),
('665881d75c056', 'HelloOlrd', 'leelopal1129@gmail.com', '12234654765878'),
('665881f3501ff', 'Leeploaodjslacs', 'scnbsbcjadckas1129@gmail.com', '1234567891011'),
('66588321b82eb', 'Leeploaodjslacs', 'scnbsbcjadckas1129@gmail.com', '124339412034'),
('6658c871ada55', 'Leepal', 'leepalkwrn1129@gmail.com', '12345678'),
('665960faa3342', 'Kienbb', 'kienbrowns1129@gmail.com', '12345678'),
('6659c2d8055d5', 'Htet Aung', 'htetaung2001@icloud.com', 'Htetaung1234'),
('665aa452eb70f', 'Htet Aung', 'htetaung2001@icloud.com', 'Htetaung1234'),
('665aa46bea14e', 'Mr Fresh', 'mrfresh123@gmail.com', 'Htetaung1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
