-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 18 Octobre 2013 à 14:48
-- Version du serveur: 5.0.96-community-log
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: 'affaire_UPdbDev'
--

-- --------------------------------------------------------

--
-- Structure de la table 'Contacts'
--

CREATE TABLE IF NOT EXISTS 'groups' (
  'groupID' int(9) NOT NULL,
  'groupName' text NOT NULL,
  'userIDs' text,
  'taskIDs' text,
  'last_sync_date' timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  ('groupID')
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;