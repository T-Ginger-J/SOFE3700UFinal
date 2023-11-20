-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2023 at 10:22 PM
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
-- Database: `Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Airlines`
--

CREATE TABLE `Airlines` (
  `AirlineID` int(11) NOT NULL,
  `AirlineName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Airlines`
--

INSERT INTO `Airlines` (`AirlineID`, `AirlineName`) VALUES
(1, 'AirCanada'),
(2, 'American Airlines'),
(3, 'Porter'),
(4, 'Delta'),
(5, 'Emirates'),
(6, 'Westjet');

-- --------------------------------------------------------

--
-- Table structure for table `Airports`
--

CREATE TABLE `Airports` (
  `AirportID` int(11) NOT NULL,
  `AirportName` varchar(100) NOT NULL,
  `AirportAddress` varchar(250) NOT NULL,
  `IATACode` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Airports`
--

INSERT INTO `Airports` (`AirportID`, `AirportName`, `AirportAddress`, `IATACode`) VALUES
(1, 'Toronto Pearson International Airport', '6301 Silver Dart Dr, Mississauga, ON L5P 1B2', 'YYZ'),
(2, 'Billy Bishop Toronto City Airport', '2 Eireann Quay, Toronto, ON M5V 1A1', 'YTZ'),
(3, 'Paris Charles de Gaulle Airport', '95700 Roissy-en-France, France', 'CDG'),
(4, 'Berlin Brandenburg Airport', 'Melli-Beese-Ring 1, 12529 Schönefeld, Germany', 'BER'),
(5, 'Cairo International Airport', 'Cairo Governorate, Egypt', 'CAI'),
(6, 'Noi Bai International Airport', 'Phú Minh, Sóc Sơn, Hanoi, Vietnam', 'HAN');

-- --------------------------------------------------------

--
-- Table structure for table `AttractionBookings`
--

CREATE TABLE `AttractionBookings` (
  `AttractionID` int(11) NOT NULL,
  `ItineraryID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Seat` int(11) DEFAULT NULL,
  `Cost` int(11) NOT NULL,
  `Transport` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `AttractionBookings`
--

INSERT INTO `AttractionBookings` (`AttractionID`, `ItineraryID`, `Date`, `Seat`, `Cost`, `Transport`) VALUES
(1, 5, '2021-11-20 21:45:00', NULL, 55, 'TTC'),
(2, 1, '2023-11-21 17:00:00', NULL, 50, 'rental'),
(3, 4, '2023-12-02 16:00:00', NULL, 150, 'limo'),
(4, 2, '2025-04-22 13:00:00', NULL, 25, 'Rickshaw'),
(5, 6, '2024-01-21 19:00:00', NULL, 100, 'Camel'),
(6, 4, '2023-12-03 17:30:00', NULL, 150, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Attractions`
--

CREATE TABLE `Attractions` (
  `AttractionID` int(11) NOT NULL,
  `AttractionName` varchar(100) NOT NULL,
  `AttractionAddress` varchar(250) NOT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Attractions`
--

INSERT INTO `Attractions` (`AttractionID`, `AttractionName`, `AttractionAddress`, `StartTime`, `EndTime`) VALUES
(1, 'CN Tower', '290 Bremner Blvd, Toronto, ON M5V 3L9', '08:00:00', '17:00:00'),
(2, 'Eiffel Tower', 'Champ de Mars, 5 Av. Anatole France, 75007 Paris, France', '09:30:00', '22:45:00'),
(3, 'Dreh-Restaurant Sphere im Berliner Fernsehturm', 'Alexanderplatz, Panoramastraße 1A, 10178 Berlin, Germany', '10:00:00', '23:00:00'),
(4, 'Great Pyramid of Giza', 'Al Haram, Nazlet El-Semman, Al Giza Desert, Giza Governorate 3512201, Egypt', '08:00:00', '17:00:00'),
(5, 'Temple Of Literature', '58 P. Quốc Tử Giám, Văn Miếu, Đống Đa, Hà Nội, Vietnam', '08:00:00', '17:00:00'),
(6, 'Brandenburg Gate', 'Pariser Platz, 10117 Berlin, Germany', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Days`
--

CREATE TABLE `Days` (
  `Date` date NOT NULL,
  `Transport` varchar(100) DEFAULT NULL,
  `Accomodation` varchar(250) DEFAULT NULL,
  `ItineraryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Days`
--

INSERT INTO `Days` (`Date`, `Transport`, `Accomodation`, `ItineraryID`) VALUES
('2021-11-20', 'TTC', NULL, 5),
('2023-11-21', 'rental', '1', 1),
('2023-11-22', 'rental', '1', 1),
('2023-12-02', 'public transport', 'Hostel', 4),
('2024-01-21', NULL, 'Verinas House', 2),
('2025-04-26', NULL, '2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `FlightBookings`
--

CREATE TABLE `FlightBookings` (
  `FlightID` int(11) NOT NULL,
  `ItineraryID` int(11) NOT NULL,
  `Seat` varchar(10) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `FlightBookings`
--

INSERT INTO `FlightBookings` (`FlightID`, `ItineraryID`, `Seat`, `Cost`) VALUES
(1, 1, '22B', 300),
(2, 2, '12C', 1000),
(3, 3, '24D', 700),
(4, 4, '14B', 1200),
(5, 6, '32B', 500),
(6, 1, '30A', 400);

-- --------------------------------------------------------

--
-- Table structure for table `Flights`
--

CREATE TABLE `Flights` (
  `FlightID` int(11) NOT NULL,
  `AirlineID` int(11) NOT NULL,
  `FlightNum` varchar(100) NOT NULL,
  `DeparetureDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DepartFrom` int(11) NOT NULL,
  `ArriveAt` int(11) NOT NULL,
  `Length` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Flights`
--

INSERT INTO `Flights` (`FlightID`, `AirlineID`, `FlightNum`, `DeparetureDate`, `DepartFrom`, `ArriveAt`, `Length`) VALUES
(1, 1, 'AC 133', '2023-11-20 23:00:00', 1, 3, '10:15:00'),
(2, 2, 'AA 111', '2024-01-20 11:30:00', 1, 5, '21:20:00'),
(3, 3, 'PR 223', '2023-12-01 19:45:00', 2, 4, '14:40:00'),
(4, 4, 'DL 123', '2024-07-10 16:15:00', 4, 3, '01:50:00'),
(5, 6, 'WJ 007', '2025-11-20 13:00:00', 1, 6, '20:15:00'),
(6, 1, 'AC 113', '2023-12-01 06:10:00', 3, 1, '08:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `HotelBookings`
--

CREATE TABLE `HotelBookings` (
  `HotelID` int(11) NOT NULL,
  `ItineraryID` int(11) NOT NULL,
  `Room` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `HotelBookings`
--

INSERT INTO `HotelBookings` (`HotelID`, `ItineraryID`, `Room`, `Date`, `Cost`) VALUES
(1, 1, '120', '2023-11-21', 60),
(1, 1, '120', '2023-11-22', 60),
(2, 6, '201', '2025-04-26', 96),
(2, 6, '201', '2025-04-27', 96),
(2, 6, '201', '2025-04-28', 96),
(2, 6, '201', '2025-04-29', 96);

-- --------------------------------------------------------

--
-- Table structure for table `Hotels`
--

CREATE TABLE `Hotels` (
  `HotelID` int(11) NOT NULL,
  `HotelName` varchar(100) NOT NULL,
  `HotelAddress` varchar(250) NOT NULL,
  `StarRank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Hotels`
--

INSERT INTO `Hotels` (`HotelID`, `HotelName`, `HotelAddress`, `StarRank`) VALUES
(1, 'Best Western Opéra Faubourg', '49-51 Rue La Fayette, 75009 Paris, France', 4),
(2, 'Hanoi Hotel', '2RHC+4HG D8, P. Giảng Võ, Giảng Võ, Ba Đình Hà Nội 10000', 1),
(3, 'Hilton Berlin', 'Mohrenstraße 30, 10117 Berlin, Germany', 4),
(4, 'Grand Nile Tower', 'Abdulaziz Al Saud, Old Cairo, Cairo Governorate 4240304, Egypt', 5),
(5, 'Sheraton Centre Toronto Hotel', '123 Queen St W, Toronto, ON M5H 2M9', 4),
(6, 'Loft - Entertainment & Financial District', '20 John St, Toronto, ON M5V 0G5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `ItineraryID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserAddress` varchar(250) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNum` varchar(20) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `UserName`, `UserAddress`, `Email`, `PhoneNum`, `pwd`, `created_at`) VALUES
(1, 'Trent Jordan', '4000 Simcoe St N, Oshawa, ON, Canada, M1M1M1', 'Trent.Jordan@gmail.com', '416 999 9999', '', '2023-11-17 14:28:59'),
(2, 'Cam Edwards', '4001 Simcoe St N, Oshawa, ON, Canada, M1M1M1', 'Cam.Edwards@gmail.com', '416 999 9998', '', '2023-11-17 14:28:59'),
(3, 'Ashwin Prem', '4002 Simcoe St N, Oshawa, ON, Canada, M1M1M1', 'Ashwin.Prem@gmail.com', '416 999 9997', '', '2023-11-17 14:28:59'),
(4, 'Verina Bouls', '4003 Simcoe St N, Oshawa, ON, Canada, M1M1M1', 'Verina.Bouls@gmail.com', '416 999 9996', '', '2023-11-17 14:28:59'),
(5, 'George Washington', '4004 Simcoe St N, Oshawa, ON, Canada, M1M1M1', 'George.Washington@gmail.com', '416 999 9995', '', '2023-11-17 14:28:59'),
(6, 'Khalid Hafeez', '4005 Simcoe St N, Oshawa, ON, Canada, M1M1M1', 'Khalid.Hafeez@gmail.com', '416 999 9994', '', '2023-11-17 14:28:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Airlines`
--
ALTER TABLE `Airlines`
  ADD PRIMARY KEY (`AirlineID`);

--
-- Indexes for table `Airports`
--
ALTER TABLE `Airports`
  ADD PRIMARY KEY (`AirportID`);

--
-- Indexes for table `AttractionBookings`
--
ALTER TABLE `AttractionBookings`
  ADD PRIMARY KEY (`AttractionID`,`ItineraryID`);

--
-- Indexes for table `Attractions`
--
ALTER TABLE `Attractions`
  ADD PRIMARY KEY (`AttractionID`);

--
-- Indexes for table `Days`
--
ALTER TABLE `Days`
  ADD PRIMARY KEY (`Date`,`ItineraryID`);

--
-- Indexes for table `FlightBookings`
--
ALTER TABLE `FlightBookings`
  ADD PRIMARY KEY (`FlightID`,`ItineraryID`,`Seat`);

--
-- Indexes for table `Flights`
--
ALTER TABLE `Flights`
  ADD PRIMARY KEY (`FlightID`);

--
-- Indexes for table `HotelBookings`
--
ALTER TABLE `HotelBookings`
  ADD PRIMARY KEY (`HotelID`,`ItineraryID`,`Room`,`Date`);

--
-- Indexes for table `Hotels`
--
ALTER TABLE `Hotels`
  ADD PRIMARY KEY (`HotelID`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`ItineraryID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `ItineraryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
