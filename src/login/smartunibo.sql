-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 21, 2016 alle 22:25
-- Versione del server: 5.7.14
-- Versione PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartunibo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `nazioni`
--

CREATE TABLE `nazioni` (
  `IdNazione` int(6) UNSIGNED NOT NULL,
  `Nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `nazioni`
--

INSERT INTO `nazioni` (`IdNazione`, `Nome`) VALUES
(1, 'Italia'),
(2, 'Germania'),
(3, 'Francia'),
(4, 'Regno Unito');

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `Matricola` int(6) UNSIGNED NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Cognome` varchar(15) NOT NULL,
  `CF` char(16) NOT NULL,
  `Sesso` char(1) NOT NULL,
  `DataNascita` date NOT NULL,
  `ComuneNascita` varchar(30) NOT NULL,
  `NazioneNascita` int(6) UNSIGNED NOT NULL,
  `Cittadinanza` int(6) UNSIGNED NOT NULL,
  `EmailIstituzionale` varchar(30) NOT NULL,
  `Pw` char(128) NOT NULL,
  `Salt` char(128) NOT NULL,
  `EmailPrivata` varchar(30) NOT NULL,
  `Cellulare` varchar(15) DEFAULT NULL,
  `Nazione` int(6) UNSIGNED NOT NULL,
  `Provincia` char(2) NOT NULL,
  `Comune` varchar(30) NOT NULL,
  `Indirizzo` varchar(30) NOT NULL,
  `CAP` int(5) UNSIGNED NOT NULL,
  `Frazione` varchar(30) DEFAULT NULL,
  `TelefonoResidenza` varchar(15) DEFAULT NULL,
  `CodiceCorsoDiStudio` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`Matricola`, `Nome`, `Cognome`, `CF`, `Sesso`, `DataNascita`, `ComuneNascita`, `NazioneNascita`, `Cittadinanza`, `EmailIstituzionale`, `Pw`, `Salt`, `EmailPrivata`, `Cellulare`, `Nazione`, `Provincia`, `Comune`, `Indirizzo`, `CAP`, `Frazione`, `TelefonoResidenza`, `CodiceCorsoDiStudio`) VALUES
(123456, 'Mario', 'Rossi', 'RSSMRA95A01C573K', 'M', '1995-01-01', 'Cesena', 1, 1, 'mario.rossi@studio.unibo.it', '105b8591e887023e91b393535fb9446e98f7fa1db69da6f578247f6ed269cde1e68d68971dbb58a1d6edb537e5474a2464914ee2c49e10eb41ef9a4fa08deae7', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef', 'mario.rossi@gmail.com', NULL, 1, 'FC', 'Cesena', 'Via Sacchi 3', 47521, NULL, NULL, 8615),
(234567, 'Luigi', 'Verdi', 'VRDLGU95A01H294H', 'M', '1994-01-01', 'Rimini', 1, 1, 'luigi.verdi@studio.unibo.it', 'f21fced8b711044cf87ff9115f4ea81a143df25ebe18913b11b67e1bc5f64168e4b15fa926c1e92119a4736e97219728aa7645b6c05ae4748b675c0b7875eb46', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'luigi.verdi@gmail.com', NULL, 1, 'RN', 'Rimini', 'Via Pirandello 8', 47921, NULL, NULL, 8615);

-- --------------------------------------------------------

--
-- Struttura della tabella `tentativi_login`
--

CREATE TABLE `tentativi_login` (
  `Matricola` int(6) UNSIGNED NOT NULL,
  `Ora` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tentativi_login`
--

INSERT INTO `tentativi_login` (`Matricola`, `Ora`) VALUES
(123456, '1482352438'),
(123456, '1482352472'),
(123456, '1482352474'),
(123456, '1482352475'),
(123456, '1482358834'),
(234567, '1482358857'),
(234567, '1482358870'),
(234567, '1482358927');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `nazioni`
--
ALTER TABLE `nazioni`
  ADD PRIMARY KEY (`IdNazione`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`Matricola`),
  ADD UNIQUE KEY `CF` (`CF`),
  ADD UNIQUE KEY `EmaiIstituzionale` (`EmailIstituzionale`),
  ADD KEY `Nazione` (`Nazione`),
  ADD KEY `NazioneNascita` (`NazioneNascita`),
  ADD KEY `Cittadinanza` (`Cittadinanza`);

--
-- Indici per le tabelle `tentativi_login`
--
ALTER TABLE `tentativi_login`
  ADD PRIMARY KEY (`Matricola`,`Ora`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `nazioni`
--
ALTER TABLE `nazioni`
  MODIFY `IdNazione` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`Cittadinanza`) REFERENCES `nazioni` (`IdNazione`),
  ADD CONSTRAINT `studenti_ibfk_2` FOREIGN KEY (`Nazione`) REFERENCES `nazioni` (`IdNazione`),
  ADD CONSTRAINT `studenti_ibfk_3` FOREIGN KEY (`NazioneNascita`) REFERENCES `nazioni` (`IdNazione`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
