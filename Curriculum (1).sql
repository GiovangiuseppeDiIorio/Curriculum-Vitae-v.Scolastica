-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Nov 03, 2021 alle 13:57
-- Versione del server: 10.3.29-MariaDB-0+deb10u1
-- Versione PHP: 7.3.29-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Curriculum`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Competenze`
--

CREATE TABLE IF NOT EXISTS `Competenze` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `L_ID` int(11) NOT NULL,
  `prima_Lingua` varchar(65) COLLATE utf8mb4_bin NOT NULL DEFAULT 'Italiano',
  `altre_Lingue` varchar(65) COLLATE utf8mb4_bin DEFAULT NULL,
  `capacita_Lettura` varchar(535) COLLATE utf8mb4_bin DEFAULT NULL,
  `capacita_Scrittura` varchar(535) COLLATE utf8mb4_bin DEFAULT NULL,
  `capacita_Orale` varchar(535) COLLATE utf8mb4_bin DEFAULT NULL,
  `competenzeRel` text COLLATE utf8mb4_bin DEFAULT NULL,
  `competenzeOrg` text COLLATE utf8mb4_bin DEFAULT NULL,
  `competenzeTec` text COLLATE utf8mb4_bin DEFAULT NULL,
  `competenzeArt` text COLLATE utf8mb4_bin DEFAULT NULL,
  `altreCompetenze` text COLLATE utf8mb4_bin DEFAULT NULL,
  `patente` varchar(65) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `Competenze`
--

INSERT INTO `Competenze` (`ID`, `L_ID`, `prima_Lingua`, `altre_Lingue`, `capacita_Lettura`, `capacita_Scrittura`, `capacita_Orale`, `competenzeRel`, `competenzeOrg`, `competenzeTec`, `competenzeArt`, `altreCompetenze`, `patente`) VALUES
(23, 32, 'Italiano', 'Inglese', 'Eccellente', 'Eccellente', 'Eccellente', 'Breve descrizione sulle competenze', 'Breve descrizione sulle competenze', 'Breve descrizione sulle competenze', 'Breve descrizione sulle competenze', 'Breve descrizione sulle competenze', 'B1');

-- --------------------------------------------------------

--
-- Struttura della tabella `Dati`
--

CREATE TABLE IF NOT EXISTS `Dati` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cognome` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `Nome` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `residenza` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `numero` int(128) NOT NULL,
  `email` varchar(535) COLLATE utf8mb4_bin NOT NULL,
  `nazionalita` varchar(65) COLLATE utf8mb4_bin NOT NULL DEFAULT 'Italia',
  `nascita` date NOT NULL,
  `Sesso` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `Dati`
--

INSERT INTO `Dati` (`ID`, `Cognome`, `Nome`, `residenza`, `numero`, `email`, `nazionalita`, `nascita`, `Sesso`) VALUES
(32, 'Cognome', 'Nome', 'Via di residenza', 123456789, 'email@email.it', 'Italia', '2003-01-07', 'maschio');

-- --------------------------------------------------------

--
-- Struttura della tabella `eLavorativa`
--

CREATE TABLE IF NOT EXISTS `eLavorativa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `e_ID` int(11) NOT NULL,
  `dataInizio` date NOT NULL,
  `dataFine` date NOT NULL,
  `nomeDatore` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `tipologiaAzienda` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `tipologiaImpiego` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `responsabilita` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `descrizione` text COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `eLavorativa`
--

INSERT INTO `eLavorativa` (`ID`, `e_ID`, `dataInizio`, `dataFine`, `nomeDatore`, `tipologiaAzienda`, `tipologiaImpiego`, `responsabilita`, `descrizione`) VALUES
(38, 32, '2021-09-09', '2021-10-12', 'Nome datore di lavoro', 'Nome azienda', 'Tipologia Impiego', 'Tipo di responsabilità', 'Breve descrizione sull\'esperienza di lavoro'),
(39, 32, '2021-10-08', '2021-10-10', 'Nome datore di lavoro2', 'Tipologia azienda2', 'Tipologia Impiego2', 'Tipologia responsabilità', 'Breve descrizione sull\'esperienza2');

-- --------------------------------------------------------

--
-- Struttura della tabella `Istruzione`
--

CREATE TABLE IF NOT EXISTS `Istruzione` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `i_ID` int(11) NOT NULL,
  `dateStartSchool` date NOT NULL,
  `dateEndSchool` date NOT NULL,
  `tipologia_Istruzione` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `principali_abilita` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `qualifica` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dump dei dati per la tabella `Istruzione`
--

INSERT INTO `Istruzione` (`ID`, `i_ID`, `dateStartSchool`, `dateEndSchool`, `tipologia_Istruzione`, `principali_abilita`, `qualifica`) VALUES
(20, 32, '2021-10-14', '2021-10-21', 'Scuola superiore di secondo grado', 'Liceo scientifico', 'Diploma'),
(21, 32, '2021-10-04', '2021-10-31', 'Corso online', 'Networking', 'Attestato di partecipazione'),
(22, 32, '2021-10-12', '2021-10-31', 'Formazione universitaria', 'Ingegneria informatica', 'Laurea triennale');

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenze`
--

CREATE TABLE IF NOT EXISTS `Utenze` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nickname` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  `Password` varchar(65) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
