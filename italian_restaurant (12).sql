-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2024 at 03:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `italian_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int NOT NULL,
  `SessionID_fk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `SessionID_fk`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `AccountNo` int NOT NULL COMMENT 'Pk',
  `Name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PhoneNo` int NOT NULL,
  `Email` varchar(30) NOT NULL,
  `SessionID_fk2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`AccountNo`, `Name`, `PhoneNo`, `Email`, `SessionID_fk2`) VALUES
(1, 'TerryJones', 871024444, 'TerryJones@gmail.com', 2),
(2, 'ZamanZaidi', 874444444, 'ZZ@gmail.com', 3),
(3, 'Nicola', 85123512, 'Nicola@gmail.com', 4),
(4, 'beeb', 1135621, 'beeb@gmail.com', 5),
(5, 'Byron', 232652272, 'Byron@gmail.com', 6),
(6, 'Alex', 163126, 'Alex@yahoo.com', 8),
(7, 'Alex', 12356167, 'alex@gmail.com', 9),
(8, 'Alex', 12356167, 'alex@gmail.com', 10),
(9, 'Alex3', 213662, 'Alex3@gmail.com', 11),
(10, 'Alex3', 213662, 'Alex3@gmail.com', 12),
(11, 'TESTPDO', 13251, 'TEST@GMAI', 13),
(12, 'Robert', 1123513361, 'robert@gmail.com', 14),
(13, 'Rebbeca', 46363463, 'reb@gmail.com', 15),
(14, 'Ross', 523523, 'ross@gmail.com', 16),
(15, 'rossde', 523452, 'rosde@gmail.com', 17),
(16, 'Ross ', 87102, 'rossd4@gmail.com', 18),
(17, 'Ross ', 87102, 'rossd4@gmail.com', 19),
(18, 'Ross ', 87102, 'rossd4@gmail.com', 20),
(19, 'Ross ', 87102, 'rossd4@gmail.com', 21),
(20, 'Ross ', 87102, 'rossd4@gmail.com', 22),
(21, 'Ross ', 87102, 'rossd4@gmail.com', 23),
(22, 'Yash', 421421, 'yas@gmail.com', 24),
(23, 'Yash', 421421, 'yas@gmail.com', 25),
(24, 'Yash', 421421, 'yas@gmail.com', 26),
(25, 'Yash', 421421, 'yas@gmail.com', 27),
(26, 'Yash', 421421, 'yas@gmail.com', 28),
(27, 'Ross', 523525, 'rossd@gmail.com', 29),
(28, 'Max', 314124, 'max@gmail.com', 31),
(29, 'Max', 24141412, 'max42@gmail.com', 33),
(30, 'roger', 41214142, 'roger@gmail.com', 34),
(31, 'Tom', 41214142, 'tom@gmail.com', 35),
(32, 'benny', 2425252, 'benny@gmail.com', 36),
(33, 'benny', 2425252, 'benny@gmail.com', 37),
(34, 'Tommy', 12412351, 'Tom@gmail.com', 38),
(35, 'Tommy', 12412351, 'Tom@gmail.com', 39),
(36, 'Tommy', 2425252, 'tommy@gmail.com', 40);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int NOT NULL,
  `ProductName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adminID_fk` int NOT NULL
) ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `ProductName`, `adminID_fk`) VALUES
(1, 'White Wine', 1),
(2, 'Red Wine', 1),
(3, 'Heinekin', 1),
(4, 'Garlic Bread', 1),
(5, 'Bruschetta', 1),
(6, 'Spaghetti', 1),
(7, 'Lasanga', 1),
(8, 'Carbonara', 1),
(9, 'Spicy Pizza', 1),
(10, 'Ham pizza', 1),
(11, 'Pineapple Pizza', 1),
(12, 'Pepperoni Pizza', 1),
(13, 'Tiramisu', 1),
(14, 'Strawberry Ice Cream', 1),
(15, 'Vanilla Ice Cream', 1),
(16, 'Chocolate Ice Cream', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int NOT NULL,
  `CardType` varchar(30) NOT NULL,
  `CardNo` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Cardname` varchar(30) NOT NULL,
  `Total` int NOT NULL,
  `SetDinnerID_fk` int NOT NULL,
  `ReservationID_Fk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `CardType`, `CardNo`, `Cardname`, `Total`, `SetDinnerID_fk`, `ReservationID_Fk`) VALUES
(1, 'mastercard', '123124', 'JohnDoesph', 80, 1, 0),
(2, 'mastercard', '2352352', 'Ross', 80, 1, 1),
(3, 'mastercard', '32626', 'Ross', 80, 1, 2),
(4, 'mastercard', '32626', 'Ross', 80, 1, 2),
(5, 'mastercard', '3262', 'Ross', 80, 1, 2),
(6, 'mastercard', '3262', 'Ross', 80, 1, 2),
(7, 'mastercard', '3262', 'Ross', 80, 1, 3),
(8, 'mastercard', '3262', 'Ross', 80, 1, 4),
(9, 'mastercard', '3262', 'Ross', 80, 1, 5),
(10, 'mastercard', '3262', 'Ross', 80, 1, 5),
(11, 'mastercard', '315153', 'Ross', 80, 1, 5),
(12, 'mastercard', '32626', 'Ross', 80, 1, 5),
(13, 'masterCard', '3262', 'Ross', 80, 1, 5),
(14, 'mastercard', '421421', 'Ross', 80, 1, 5),
(15, 'masterCard', '412412', 'Ross', 80, 1, 5),
(16, 'masterCard', '3262', 'Ross', 80, 1, 5),
(17, 'masterCard', '32525', 'Ross', 80, 1, 5),
(18, 'masterCard', '3262', 'Ross', 80, 1, 5),
(19, 'masterCard', '32525', 'Ross', 80, 1, 5),
(20, 'mastercard', '3262', 'Ross', 80, 1, 5),
(21, 'masterCard', '32525', 'Ross', 80, 1, 5),
(22, 'mastercard', '4241', 'Ross', 80, 1, 5),
(23, 'mastercard', '4214', 'Ross', 80, 1, 5),
(24, 'masterCard', '3262', 'Ross', 80, 1, 6),
(25, 'masterCard', '3262', 'Ross', 80, 1, 6),
(26, 'masterCard', '3262', 'Ross', 80, 1, 6),
(27, 'masterCard', '3262', 'Ross', 80, 1, 6),
(28, 'masterCard', '3262', 'Ross', 80, 1, 6),
(29, 'masterCard', '5231', 'Ross', 80, 1, 7),
(30, 'mastercard', '124', 'SomethingSome', 80, 1, 8),
(31, 'masterCard', '457848', 'Terry', 80, 1, 9),
(32, 'masterCard', '3262', 'Ross', 80, 1, 9),
(33, 'mastercardTest', '531513', 'Teststs', 80, 1, 10),
(34, 'mastercard', '252525', 'miachael', 85, 1, 11),
(35, 'mastercard', '531513', 'Teststs', 80, 1, 12),
(36, 'mastercard', '531513', 'TeststsRoss', 80, 1, 13),
(37, 'mastercardTest', '513616', 'TeststsRoss', 80, 1, 14),
(38, 'mastercardTest', '531513', 'TeststsRoss', 80, 1, 15),
(39, 'mastercard', '5215135', 'TeststsRoss', 80, 1, 16),
(40, 'mastercardTestAcc', '531513', 'TeststsRossAcc', 80, 1, 17),
(41, 'mastercardTestAcc', '531513', 'TeststsRossAcc', 80, 1, 18),
(42, 'mastercardTestAc', '6236326', 'TeststsAcc', 80, 1, 18),
(43, 'mastercardTestAc', '6236326', 'TeststsAcc', 80, 1, 18),
(44, 'mastercardTest', '246247', 'TeststsRossAcc', 80, 1, 18),
(45, 'mastercardTest', '5325', 'TeststsRossAcc', 80, 1, 18),
(46, 'mastercard', '531513', 'TeststsRoss', 80, 1, 18),
(47, 'mastercardTest', '252525', 'TeststsRossAcc', 80, 1, 18),
(48, 'mastercard', '531513', 'TeststsRossAcc', 80, 1, 18),
(49, 'mastercard', '531513', 'TeststsRossAcc', 80, 1, 18),
(50, 'mastercard', '531513', 'TeststsRossAcc', 80, 1, 18),
(51, 'mastercard', '531513', 'TeststsRossAcc', 80, 1, 18),
(52, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 18),
(53, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 18),
(54, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 18),
(55, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 18),
(56, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 19),
(57, 'mastercardTest', '3513515', 'Teststs', 80, 1, 20),
(58, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 21),
(59, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 21),
(60, 'mastercardTest', '42424', 'TeststsRossAcc', 80, 1, 21),
(61, 'mastercardTest', '42424', 'TeststsRossAcc', 80, 1, 21),
(62, 'mastercardTest', '53525', 'TeststsRossAcc', 80, 1, 21),
(63, 'mastercardTest', '32525', 'TeststsRossAcc', 80, 1, 21),
(64, 'mastercardTest', '235235', 'TeststsRossAcc', 80, 1, 21),
(65, 'mastercardTest', '142412', 'TeststsRoss', 80, 1, 22),
(66, 'mastercardTest2', '1512512', 'TeststsRossAcc', 80, 1, 23),
(67, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 24),
(68, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 24),
(69, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 25),
(70, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 25),
(71, 'mastercardTest', '531513', 'RosssesesTEST', 80, 1, 25),
(72, 'mastercardTest', '4125235', 'TeststsRossAcc', 80, 1, 25),
(73, 'mastercardTest', '3513515', 'TeststsRoss', 80, 1, 25),
(74, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 25),
(75, 'mastercardTest', '531513', 'TeststsRoss', 80, 1, 25),
(76, 'mastercardTest', '531513', 'TeststsRoss', 80, 1, 25),
(77, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 25),
(78, 'mastercardTest', '3513515', 'TeststsRossAcc', 80, 1, 25),
(79, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 26),
(80, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 26),
(81, 'mastercardTest', '531513', 'ROSE', 85, 1, 26),
(82, 'mastercardTest', '531513', 'ROSE', 85, 1, 26),
(83, 'mastercardTest', '531513', 'miachael', 80, 1, 26),
(84, 'mastercardTest', '315125', 'TeststsRossAcc', 80, 1, 26),
(85, 'mastercardTest', '532525', 'TeststsRoss', 80, 1, 26),
(86, 'mastercardTest', '531513', 'TeststsRossAcc', 80, 1, 27),
(87, 'mastercardTest2', '5215135', 'TeststsRossAcc', 80, 1, 28),
(88, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 28),
(89, 'mastercardTest3', '252525', 'TeststsRoss', 80, 1, 28),
(90, 'mastercardTest', '5215135', 'TeststsRossAcc', 80, 1, 28),
(91, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 28),
(92, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 29),
(93, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 30),
(94, 'mastercardTest', '5215135', 'ROBERT', 80, 1, 31),
(95, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 32),
(96, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 32),
(97, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 33),
(98, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 34),
(99, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 35),
(100, 'mastercardTest', '5215135', 'TeststsRoss', 80, 1, 36),
(101, 'mastercardTest', '42142', 'miachael', 80, 1, 37),
(102, 'mastercardTest', '4214', 'TeststsRoss', 80, 1, 38),
(103, 'mastercard', '252525', 'TeststsRoss', 80, 1, 39),
(104, 'mastercard', '252525', 'Derek', 80, 1, 40),
(105, 'mastercard', '424242', 'Derek', 80, 1, 41),
(106, 'mastercard', '53525', 'derek', 80, 1, 42),
(107, 'mastercard', '53525', 'Derek', 80, 1, 43),
(108, 'mastercard', '53525', 'derek', 160, 1, 44),
(109, 'mastercard', '53525', 'derek', 160, 1, 45),
(110, 'mastercardTest', '252525', 'nicola', 100, 1, 46),
(111, 'mastercard', '252525', 'derek', 160, 1, 47),
(112, 'mastercard', '252525', 'derek', 100, 1, 48),
(113, 'mastercard', '424242', 'nicola', 160, 1, 49),
(114, 'mastercard', '252525', 'nicola', 100, 1, 50),
(115, 'mastercard', '252525', 'nicola', 160, 1, 51),
(116, 'mastercard', '48458458', 'nicola', 160, 1, 52),
(117, 'mastercard', '48458458', 'nicola', 160, 1, 53),
(118, 'mastercard', '48458458', 'nicola', 160, 1, 54),
(119, 'mastercard', '252525', 'nicola', 160, 1, 55),
(120, 'mastercard', '252525', 'nicola', 160, 1, 56),
(121, 'mastercard', '5215135', 'nicola', 160, 1, 57),
(122, 'mastercard', '5215135', 'derek', 160, 1, 58),
(123, 'mastercard', '53525', 'Derek', 160, 1, 59),
(124, 'mastercard', '53525', 'Derek', 160, 1, 60),
(125, 'mastercard', '252525', 'derek', 160, 1, 61),
(126, 'mastercard', '252525', 'zaman', 160, 1, 61),
(127, 'mastercard', '424242', 'zaman', 160, 1, 62),
(128, 'mastercard', '412412412', 'zaman', 0, 1, 63),
(129, 'mastercard', '424242', 'zaman', 160, 1, 64),
(130, 'mastercard', '252525', 'zaman', 160, 1, 65),
(131, 'mastercard', '4124124', 'zaman', 160, 1, 65),
(132, 'mastercard', '5215135', 'zaman', 160, 1, 66),
(133, 'master', '4444444444444444', 'zaman', 160, 1, 67),
(134, 'mastercard', '4444-4444-4444-4444', 'zaman', 160, 1, 68),
(135, 'visa', '4444-4444-4444-4444', 'nicola', 160, 1, 69),
(136, 'mastercard', '4444-4444-4444-4444', 'Terry', 200, 1, 5),
(137, 'mastercard', '4444-4444-4444-4444', 'Terry', 240, 1, 6),
(138, 'mastercard', '4444-4444-4444-4444', 'zaman', 280, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ReservationID` int NOT NULL COMMENT 'PK',
  `Date` date NOT NULL,
  `Time` time(2) NOT NULL,
  `GuestNo` int NOT NULL,
  `Attendence` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Cancelled` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `AccountNo_fk` int NOT NULL,
  `TableID_FK` int NOT NULL,
  `adminID_fk2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ReservationID`, `Date`, `Time`, `GuestNo`, `Attendence`, `Cancelled`, `AccountNo_fk`, `TableID_FK`, `adminID_fk2`) VALUES
(0, '2024-03-27', '16:07:01.00', 4, 'false', 'False', 2, 2, 1),
(1, '2024-03-19', '21:37:00.00', 4, 'false', 'false', 2, 1, 1),
(4, '2024-03-12', '21:17:00.00', 4, 'false', 'false', 1, 3, 1),
(5, '2024-04-28', '15:56:00.00', 5, 'false', 'false', 1, 4, 1),
(6, '2024-04-28', '15:56:00.00', 6, 'false', 'false', 1, 5, 1),
(7, '2024-04-28', '16:13:00.00', 7, 'false', 'false', 2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setdinners`
--

CREATE TABLE `setdinners` (
  `SetDinnerID` int NOT NULL,
  `Price` int NOT NULL,
  `DinnerType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adminID_fk3` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `setdinners`
--

INSERT INTO `setdinners` (`SetDinnerID`, `Price`, `DinnerType`, `adminID_fk3`) VALUES
(1, 40, '3 Course', 1),
(2, 25, '2 Course', 1),
(3, 15, 'Kids Meal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `TableID` int NOT NULL,
  `Size` int NOT NULL,
  `Availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`TableID`, `Size`, `Availability`) VALUES
(1, 4, 'False'),
(2, 8, 'False'),
(3, 4, 'False'),
(4, 5, 'False'),
(5, 6, 'False'),
(6, 7, 'False'),
(7, 8, 'True'),
(8, 9, 'True'),
(9, 10, 'True'),
(10, 1, 'True'),
(11, 2, 'True'),
(12, 3, 'True'),
(13, 11, 'True'),
(14, 12, 'True'),
(15, 13, 'True'),
(16, 14, 'True'),
(17, 15, 'True'),
(18, 16, 'True');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `SessionID` int NOT NULL,
  `Password` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`SessionID`, `Password`, `UserName`) VALUES
(1, 'Password', 'Admin'),
(2, 'lolcats', 'TerryJones1'),
(3, 'fun', 'zaman802'),
(4, 'fun', 'nicola12'),
(5, 'pass', 'derek'),
(6, 'fun', 'byron1'),
(7, '', ''),
(8, 'fun', 'alex1'),
(9, 'fun', 'alex2'),
(10, 'fun', 'alex1'),
(11, 'fun', 'Alex3'),
(12, 'fun', 'Alex3'),
(13, '315315', '5135'),
(14, 'robert', 'Robert1'),
(15, 'fun', 'reb'),
(16, 'password', 'ross'),
(17, 'fun', 'ross'),
(18, 'fun', 'ross'),
(19, 'fun', 'ross'),
(20, 'fun', 'ross'),
(21, 'fun', 'ross'),
(22, 'fun', 'ross'),
(23, 'fun', 'ross'),
(24, 'fun', 'yash'),
(25, 'fun', 'yash'),
(26, 'fun', 'yash'),
(27, 'fun', 'yash'),
(28, 'fun', 'yash'),
(29, 'Dee', 'Ross'),
(30, '', ''),
(31, 'fun', 'Max1'),
(32, '', ''),
(33, 'Pass', 'Max42'),
(34, 'fun', 'roger1'),
(35, '1234', 'tom'),
(36, '1234', 'benny'),
(37, '1234', 'benny'),
(38, 'fun', 'tom'),
(39, 'fun', 'tom'),
(40, 'funny', 'Tommy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `SessionID_fk` (`SessionID_fk`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`AccountNo`),
  ADD KEY `AccountNo` (`AccountNo`),
  ADD KEY `SetDinnerID_fk2` (`SessionID_fk2`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`),
  ADD KEY `AccountNo` (`adminID_fk`),
  ADD KEY `AccountNo_2` (`adminID_fk`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `SetDinnerID_fk` (`SetDinnerID_fk`),
  ADD KEY `ReservationID_Fk` (`ReservationID_Fk`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `AccountNo_fk` (`AccountNo_fk`),
  ADD KEY `GuestNo` (`GuestNo`),
  ADD KEY `TableID_FK` (`TableID_FK`),
  ADD KEY `adminID_fk2` (`adminID_fk2`);

--
-- Indexes for table `setdinners`
--
ALTER TABLE `setdinners`
  ADD PRIMARY KEY (`SetDinnerID`),
  ADD KEY `Admin_fk3` (`adminID_fk3`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`SessionID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`SessionID_fk`) REFERENCES `user` (`SessionID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`SessionID_fk2`) REFERENCES `user` (`SessionID`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`adminID_fk`) REFERENCES `admin` (`adminID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `SetdinnerID_ibfk` FOREIGN KEY (`SetDinnerID_fk`) REFERENCES `setdinners` (`SetDinnerID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`AccountNo_fk`) REFERENCES `customer` (`AccountNo`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`TableID_FK`) REFERENCES `tables` (`TableID`),
  ADD CONSTRAINT `reservations_ibfk_5` FOREIGN KEY (`adminID_fk2`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `reservations_ibfk_6` FOREIGN KEY (`ReservationID`) REFERENCES `payment` (`ReservationID_Fk`);

--
-- Constraints for table `setdinners`
--
ALTER TABLE `setdinners`
  ADD CONSTRAINT `setdinners_ibfk_1` FOREIGN KEY (`adminID_fk3`) REFERENCES `admin` (`adminID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
