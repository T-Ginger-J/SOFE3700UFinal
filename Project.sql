-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2023 at 10:04 PM
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
(1, 'Big Pyramid', 'Giza', '08:00:00', '17:00:00'),
(2, 'Medium Pyramid', 'Also in Giza', '09:30:00', '22:45:00'),
(3, 'Tiny Pyramid', 'Seen last in Giza', '10:00:00', '23:00:00'),
(4, 'Sand', 'Egypt', '08:00:00', '17:00:00'),
(5, 'Sphinx', 'Across those pyramids', '08:00:00', '17:00:00'),
(6, 'Camelback riding', 'On the sand dunes', NULL, NULL);

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
  `itineraryID` int(11) NOT NULL,
  `Seat` varchar(10) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Best View Pyramids Hotel', '13 Gamal Abd El-Nasir, Nazlet El-Semman, Al Haram, Giza Governorate', 4),
(3, 'Four Seasons Hotel Cairo at The First Residence', '35 Giza St, Oula, Giza District, Giza Governorate 12612, Egypt', 5),
(4, 'Grand Nile Tower', 'Abdulaziz Al Saud, Old Cairo, Cairo Governorate 4240304, Egypt', 5),
(5, 'Hilton Luxor Resort & Spa', 'Karnak, Luxor, Luxor Governorate 85954, Egypt', 3);

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `ItineraryID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
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
  ADD PRIMARY KEY (`FlightID`,`itineraryID`,`Seat`);

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
  MODIFY `ItineraryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
