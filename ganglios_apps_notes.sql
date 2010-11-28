-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: 62.149.150.46
-- Generato il: 21 set, 2010 at 05:56 PM
-- Versione MySQL: 5.0.91
-- Versione PHP: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Sql133400_1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ganglios_apps_notes`
--

CREATE TABLE IF NOT EXISTS `ganglios_apps_notes` (
  `name` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ganglios_apps_notes`
--

INSERT INTO `ganglios_apps_notes` (`name`, `value`) VALUES('', 'Hello!\n\nWelcome to my Silly Notes. This is a public notepad written in a couple of hours while working ( or at least faking it :Ã¾ )\nThe usage is quite simple:\n\nType in the address with the note id\n\nhttp://ganglio.eu/notes/myfirstnote\n\nand start writing. The note is automatically saved.\n\nTo get back to the note just go to the address again.\n\nIf you have any ideas or suggestions, please feel free to drop me a note :Ã¾\nMy email address is:\n\nroberto.torella@gmail.com\n\n\nMany ciao,\nr-');
INSERT INTO `ganglios_apps_notes` (`name`, `value`) VALUES('bacini', 'Piccoli bacini di prova per il picuscolo MicioPno amore mio!\nHihihihi, sto scrivendo con la tua grafia (chuckle)\nAmo tuuuuuuu\n\nAltri baciniiii picuscoli picuscoli e sbaciucchiooooosi\n');
INSERT INTO `ganglios_apps_notes` (`name`, `value`) VALUES('amotu', 'Io amo tu che sei picuscola\nIl tuo pancino, le tue guancine mi fanno impazzire dalla voglia di sbaciucchiarle\nIl tuo essere miciuzza, in modo cosÃ¬ miciuzzosamente delizioso, cosÃ¬ picuscolarmente morbido\n\nSono un micioPno fortunato io ad avere incontrato tu\n\nAmo tu. Un sacchissimissimo amo tu io :*');
INSERT INTO `ganglios_apps_notes` (`name`, `value`) VALUES('mimmo', 'Mimmo marfuggi\n\n');
INSERT INTO `ganglios_apps_notes` (`name`, `value`) VALUES('XXX', 'il pesco al brodo!');
