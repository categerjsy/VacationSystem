-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 04 Ιουλ 2021 στις 09:21:18
-- Έκδοση διακομιστή: 10.5.3-MariaDB
-- Έκδοση PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `vacation_system_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `application`
--

CREATE TABLE `application` (
  `id_application` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reason` text NOT NULL,
  `vacation_end` date NOT NULL,
  `vacation_start` date NOT NULL,
  `date_sub` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `application`
--

INSERT INTO `application` (`id_application`, `status`, `reason`, `vacation_end`, `vacation_start`, `date_sub`) VALUES
(10, 'pending', '\r\n            Vacation for summer', '2021-07-18', '2021-07-16', '2021-07-01'),
(19, 'rejected', '\r\n            vacation for summer', '2021-07-20', '2021-07-15', '2021-07-02'),
(22, 'approved', 'Summer Vacations\r\n            ', '2021-09-10', '2021-08-15', '2021-07-03'),
(23, 'rejected', '\r\n            Help my parents', '2021-07-07', '2021-07-03', '2021-07-03'),
(24, 'approved', 'Family events\r\n            ', '2021-08-16', '2021-08-14', '2021-07-03'),
(25, 'approved', 'Vaccine\r\n            ', '2021-07-23', '2021-07-23', '2021-07-03'),
(28, 'approved', '\r\n            My sister has her wedding.', '2021-07-14', '2021-07-14', '2021-07-04');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `does`
--

CREATE TABLE `does` (
  `id_user` int(11) NOT NULL,
  `id_application` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `does`
--

INSERT INTO `does` (`id_user`, `id_application`) VALUES
(3, 10),
(3, 19),
(3, 24),
(3, 25),
(3, 28),
(5, 22),
(5, 23);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `password`, `email`, `type`) VALUES
(1, 'Katerina', 'Gerakianaki', 'test12345', 'katerinagerak99@gmail.com', 'admin'),
(3, 'Marianna', 'Gerakianaki', 'asd123', 'categerjsy@yahoo.com', 'employee'),
(4, 'Maria', 'Georgiadou', '123!@#', 'margeorg@gmail.com', 'employee'),
(5, 'Kostas', 'Gerakianakis', '1234q', 'gerakiank@gmail.com', 'employee'),
(6, 'Ismini', 'Sarokinidou', 'ismini', 'dit17024@uop.gr', 'employee');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_application`);

--
-- Ευρετήρια για πίνακα `does`
--
ALTER TABLE `does`
  ADD PRIMARY KEY (`id_user`,`id_application`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `application`
--
ALTER TABLE `application`
  MODIFY `id_application` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
