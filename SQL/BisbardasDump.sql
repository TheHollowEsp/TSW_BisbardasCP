-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2015 at 07:20 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------
USE cakephp;
DROP TABLE IF EXISTS users,friendships,posts,likes;
--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
`id` int(10) unsigned NOT NULL,
  `user` int(10) unsigned DEFAULT NULL,
  `friend` int(10) unsigned DEFAULT NULL,
  `userStatus` varchar(10) DEFAULT 'accepted',
  `friendStatus` varchar(10) DEFAULT 'pending'
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`id`, `user`, `friend`, `userStatus`, `friendStatus`) VALUES
(14, 5, 4, 'accepted', 'pending'),
(13, 3, 4, 'accepted', 'pending'),
(12, 3, 5, 'accepted', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
`id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned DEFAULT NULL,
  `author` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `author`) VALUES
(3, 2, 3),
(2, 3, 3),
(4, 4, 3),
(5, 2, 5),
(6, 4, 5),
(7, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
`id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `author` int(10) unsigned DEFAULT NULL,
  `imgPath` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `likes` smallint(6) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `parent_id`, `title`, `body`, `author`, `imgPath`, `created`, `likes`) VALUES
(2, NULL, 'Nueva ciudad para el juego', 'Los participantes del torneo nacional van a disputar la final en una nueva ciudad creada a tal uso. Más información en la web de la diputación.', 3, 'city.jpg', '2015-07-03 18:49:58', 2),
(3, NULL, 'Muerto el creador de la web de Bisbardas', 'El programador conocido por el seudónimo de Saturnino Domínguez ha fenecido de una parada cardíaca tras luchar demasiado con las ingentes cantidades de datos que nuestros queridos usuarios han ido depositando en la base de datos. Descanse en paz.', 4, 'struggle.jpg', '2015-07-03 18:51:59', 1),
(4, NULL, 'Presentación de Eleonora Rigoberta, nueva campeona', 'Nos picó la curiosidad, y empezamos a investigar, pudiendo contactar con la propia jugadora, que nos contó toda su vida deportiva. Entre otras cosas (todo lo cual está ya reflejado en su ficha) nos contó que estuvo nada menos que diez temporadas en el equipo de la capital extremeña. Acceded a su ficha ya actualizada para conocer mejor...', 3, 'eleonora.jpg', '2015-07-03 18:53:29', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `registered` datetime DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registered`, `img`) VALUES
(5, 'johndoe', 'johndoe@hollow.es', '328938ecbdc58a17832286a9fc0a613549ff0ef433aa50451e99392d307d5cf6', '2015-07-03 19:13:40', 'asdasd.png'),
(3, 'hollow', 'hollow@hollow.es', '42d49b0cd5d2cce14526953acc4222685bec08d063404224ab3aac0f264b58fd', '2015-07-03 18:47:33', 'apache-8.jpg'),
(4, 'hrlopez', 'hrlopez@esei.uvigo.es', '111e734e7a58a41fe256be1303f46ff391069f21ac296429cea99c77ebf17d3c', '2015-07-03 19:13:17', 'iZ4irnj1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
 ADD PRIMARY KEY (`id`), ADD KEY `user` (`user`), ADD KEY `friend` (`friend`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`id`), ADD KEY `post_id` (`post_id`), ADD KEY `author` (`author`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `parent_id` (`parent_id`), ADD KEY `author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
