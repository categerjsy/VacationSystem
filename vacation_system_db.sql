-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 01 Ιουλ 2021 στις 07:58:20
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
  `vocation_end` date NOT NULL,
  `vocation_start` date NOT NULL,
  `date_sub` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `does`
--

CREATE TABLE `does` (
  `id_user` int(11) NOT NULL,
  `id_application` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Katerina Maria', 'Gerakianaki', 'asd123', 'categerjsy@yahoo.gr', 'employee'),
(4, 'Maria', 'Georgiou', '123!@#', 'margeorg@gmail.com', 'employee');

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
  MODIFY `id_application` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
