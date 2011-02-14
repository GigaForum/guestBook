-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2010 at 09:26 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guestBook`
--
CREATE DATABASE `guestBook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `new_forum`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `nf_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_datetime` datetime NOT NULL,
  `post_username` varchar(255) NOT NULL,
  `post_email` varchar(255) NOT NULL,
  `post_website` varchar(255) NOT NULL,
  `post_msg` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `nf_posts` (`post_id`, `post_datetime`, `post_username`, `post_email`, `post_website`, `post_msg`) VALUES
(6, '2010-04-30 09:58:08', 'Admin', 'admin@gigaforum.be', 'http://www.newforum.be', 'UBB Voorbeelden:\r\n\r\nBold: [b]Text[/b]\r\nUnderLine: [u]Text[/u]\r\nItalic: [i]Text[/i]\r\nCenter: [center]Text[/center]\r\nRight: [right]Text[/right]\r\nLeft: [left]Text[/left]\r\nLink: [url]http://www.google.be[/url]\r\nLinkExtended: [url=http://www.google.be]Google[/url]\r\nCode: [code]<?php echo "hallo" ?>[/code]\r\nAfbeelding: [img]http://t0.t0.free.fr/b0b0keyb.gif[/img]\r\nList:\r\n[list]\r\n[li]Eerste item\r\n[li]Tweede item\r\n[/list]\r\n[quote=lipsum]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.[/quote]\r\nList ordened:\r\n[olist]\r\n[li]Eerste item\r\n[li]Tweede item\r\n[/olist]');

-- --------------------------------------------------------

--
-- Table structure for table `smileys`
--

CREATE TABLE IF NOT EXISTS `nf_smileys` (
  `smiley_id` int(4) NOT NULL AUTO_INCREMENT,
  `smiley_trigger` varchar(20) NOT NULL,
  `smiley_name` varchar(100) NOT NULL,
  `smiley_alt` varchar(100) NOT NULL,
  `smiley_url` varchar(100) NOT NULL,
  PRIMARY KEY (`smiley_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `smileys`
--

INSERT INTO `nf_smileys` (`smiley_id`, `smiley_trigger`, `smiley_name`, `smiley_alt`, `smiley_url`) VALUES
(1, ';)', 'Wink', ';)', 'wink.gif'),
(2, ':s', 'Confused', ':s', 'confused.gif'),
(3, ':)', 'Smile', ':)', 'smile.gif'),
(4, ':P', 'Tongue', ':P', 'tongue.gif'),
(5, ':(', 'Frown', ':(', 'frown.gif'),
(6, ':cry:', 'Crying', 'Crying', 'cry.gif'),
(7, ':o', 'Eek', ':o', 'eek.gif'),
(8, ':?:', 'Question', '?', 'question.gif'),
(9, ':lol:', 'Laughing', 'lol', 'lol.gif'),
(10, ':->:', 'Arrow', '->', 'arrow.gif'),
(11, ':cool:', 'Cool', 'Cool', 'cool.gif'),
(12, ':idea:', 'Idea', 'Idea', 'idea.gif'),
(13, ':ninja:', 'Ninja', 'Ninja', 'ninja.gif'),
(14, ':puke:', 'Puke', 'Puke', 'puke.gif'),
(15, ':D', 'Biggrin', ':D', 'biggrin.gif'),
(16, ':''(', 'Crying', ':''(', 'tear.gif'),
(17, ':angry:', 'Angry', 'Angry', 'angry.gif'),
(18, ':evil:', 'Evil', 'Evil', 'evil.gif'),
(19, ':mad:', 'Mad', 'Mad', 'mad.gif'),
(20, ':rolleyes:', 'Rolleyes', 'Rolleyes', 'rolleyes.gif'),
(21, ':smoke:', 'Smoking', 'Smoking', 'smoke.gif'),
(22, ':paranoid:', 'Paranoid', 'Paranoid', 'paranoid.gif'),
(23, ':nod:', 'Nod', 'Nod', 'nod.gif'),
(24, ':thumbsdown:', 'Thumbsdown', 'Thumbsdown', 'thumbsdown.gif'),
(25, ':thumbsup:', 'Thumbsup', 'Thumbsup', 'thumbsup.gif'),
(26, ':wasted:', 'Wasted', 'Wasted', 'wasted.gif'),
(27, ':disgust.:', 'Disgust', 'Disgust', 'disgust.gif'),
(28, ':drool:', 'Drool', 'Drool', 'drool.gif'),
(29, ':finger:', 'Finger', 'Finger', 'finger.gif'),
(30, ':redface:', 'Redface', 'Redface', 'redface.gif'),
(31, ':retard:', 'Retard', 'Retard', 'retard.gif'),
(32, ':slywink:', 'Slywink', 'Slywink', 'slywink.gif'),
(33, ':smirk:', 'Smirk', 'Smirk', 'smirk.gif'),
(34, ':unibrow:', 'Unibrow', 'Unibrow', 'unibrow.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
