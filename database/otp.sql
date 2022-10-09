-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jul 2021 pada 12.50
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `otp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_data`
--

CREATE TABLE IF NOT EXISTS `login_data` (
`login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_otp` int(6) NOT NULL,
  `last_activity` datetime NOT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `register_user`
--

CREATE TABLE IF NOT EXISTS `register_user` (
`register_user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_activation_code` varchar(250) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL,
  `user_otp` int(11) NOT NULL,
  `user_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
`id` int(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(7, 'Bambang Hadi Saputra', 'hadisaputra.bambang@gmail.com', '$2y$10$TgKoPQXBaclp7LQSLR79T.5CONcL03skh5BaM9h9X0WVl4qBImrrG', 0, 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
 ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
 ADD PRIMARY KEY (`register_user_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
MODIFY `register_user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
