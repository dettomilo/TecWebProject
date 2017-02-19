-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Feb 19, 2017 alle 12:36
-- Versione del server: 10.1.16-MariaDB
-- Versione PHP: 5.6.24

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
-- Struttura della tabella `aule`
--

CREATE TABLE `aule` (
  `Sede` int(4) UNSIGNED NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `aule`
--

INSERT INTO `aule` (`Sede`, `Nome`) VALUES
(1, 'Aula A'),
(1, 'Aula B'),
(1, 'Aula magna'),
(1, 'Lab. 2'),
(1, 'Lab. 3');

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi`
--

CREATE TABLE `corsi` (
  `Nome` varchar(100) NOT NULL,
  `Sede` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `corsi`
--

INSERT INTO `corsi` (`Nome`, `Sede`) VALUES
('Ingegneria e scienze informatiche', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi_anni`
--

CREATE TABLE `corsi_anni` (
  `NomeCorso` varchar(100) NOT NULL,
  `Sede` int(4) UNSIGNED NOT NULL,
  `Anno` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `corsi_anni`
--

INSERT INTO `corsi_anni` (`NomeCorso`, `Sede`, `Anno`) VALUES
('Ingegneria e scienze informatiche', 1, 1),
('Ingegneria e scienze informatiche', 1, 2),
('Ingegneria e scienze informatiche', 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti`
--

CREATE TABLE `docenti` (
  `IdDocente` int(4) UNSIGNED NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cognome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `docenti`
--

INSERT INTO `docenti` (`IdDocente`, `Nome`, `Cognome`) VALUES
(1, 'Paola', 'Salomoni'),
(2, 'Catia', 'Prandi'),
(3, 'Claudia', 'Cevenini'),
(4, 'Franco', 'Callegati'),
(5, 'Damiana', 'Lazzaro'),
(6, 'Stefano', 'Rizzi'),
(7, 'Aldo', 'Campi'),
(8, 'Giovanni', 'Delnevo');

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti_materie`
--

CREATE TABLE `docenti_materie` (
  `IdDocente` int(4) UNSIGNED NOT NULL,
  `NomeMateria` varchar(200) NOT NULL,
  `IdRuolo` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `docenti_materie`
--

INSERT INTO `docenti_materie` (`IdDocente`, `NomeMateria`, `IdRuolo`) VALUES
(1, 'Tecnologie Web', 1),
(2, 'Tecnologie Web', 2),
(3, 'Informatica e diritto', 1),
(4, 'Programmazione di reti', 1),
(5, 'Computer Graphics', 1),
(6, 'Ingegneria del software', 1),
(7, 'Programmazione di reti', 2),
(8, 'Tecnologie Web', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE `eventi` (
  `IdEvento` int(4) UNSIGNED NOT NULL,
  `Titolo` varchar(300) NOT NULL,
  `DataOraInizio` datetime NOT NULL,
  `DataOraFine` datetime NOT NULL,
  `GiornoIntero` tinyint(1) NOT NULL,
  `Url` varchar(300) DEFAULT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`IdEvento`, `Titolo`, `DataOraInizio`, `DataOraFine`, `GiornoIntero`, `Url`, `Tipo`) VALUES
(1, 'Maker Inside (and Outside)', '2016-12-21 14:00:00', '2016-12-21 19:00:00', 0, 'http://corsi.unibo.it/Magistrale/IngegneriaScienzeInformatiche/Eventi/2016/12/workshop-maker-inside-and-outside.aspx', 'Workshop'),
(2, 'CineSprite - PRIMA SERATA', '2017-02-22 18:00:00', '2017-02-22 21:00:00', 0, NULL, 'Incontro'),
(3, 'Linux Day', '2017-02-24 16:00:00', '2017-02-24 19:00:00', 0, NULL, 'Seminario');

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi_studenti`
--

CREATE TABLE `eventi_studenti` (
  `IdEvento` int(4) UNSIGNED NOT NULL,
  `Matricola` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `eventi_studenti`
--

INSERT INTO `eventi_studenti` (`IdEvento`, `Matricola`) VALUES
(1, 123456),
(1, 234567);

-- --------------------------------------------------------

--
-- Struttura della tabella `lezioni`
--

CREATE TABLE `lezioni` (
  `IdLezione` int(4) UNSIGNED NOT NULL,
  `NomeMateria` varchar(200) NOT NULL,
  `Aula` varchar(100) NOT NULL,
  `Sede` int(4) UNSIGNED NOT NULL,
  `Data` date NOT NULL,
  `OraInizio` time NOT NULL,
  `OraFine` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `lezioni`
--

INSERT INTO `lezioni` (`IdLezione`, `NomeMateria`, `Aula`, `Sede`, `Data`, `OraInizio`, `OraFine`) VALUES
(1, 'Programmazione di reti', 'Aula magna', 1, '2017-02-21', '09:00:00', '11:00:00'),
(2, 'Ingegneria del software', 'Aula magna', 1, '2017-02-21', '11:00:00', '13:00:00'),
(3, 'Tecnologie Web', 'Lab. 2', 1, '2017-02-21', '14:00:00', '16:00:00'),
(4, 'Programmazione di reti', 'Lab. 2', 1, '2017-02-21', '16:00:00', '18:00:00'),
(5, 'Computer Graphics', 'Lab. 3', 1, '2017-02-22', '09:00:00', '11:00:00'),
(6, 'Informatica e diritto', 'Aula A', 1, '2017-02-22', '11:00:00', '13:00:00'),
(7, 'Informatica e diritto', 'Aula A', 1, '2017-02-23', '09:00:00', '12:00:00'),
(8, 'Computer Graphics', 'Aula A', 1, '2017-02-23', '13:00:00', '15:00:00'),
(9, 'Tecnologie Web', 'Aula magna', 1, '2017-02-24', '09:00:00', '12:00:00'),
(10, 'Ingegneria del software', 'Aula magna', 1, '2017-02-24', '13:00:00', '16:00:00'),
(11, 'Computer Graphics', 'Lab. 3', 1, '2017-02-27', '09:00:00', '11:00:00'),
(12, 'Programmazione di reti', 'Aula magna', 1, '2017-02-27', '11:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `Nome` varchar(200) NOT NULL,
  `Cfu` int(2) UNSIGNED NOT NULL,
  `NomeCorso` varchar(100) NOT NULL,
  `Sede` int(4) UNSIGNED NOT NULL,
  `AnnoCorso` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`Nome`, `Cfu`, `NomeCorso`, `Sede`, `AnnoCorso`) VALUES
('Computer Graphics', 6, 'Ingegneria e scienze informatiche', 1, 3),
('Informatica e diritto', 6, 'Ingegneria e scienze informatiche', 1, 3),
('Ingegneria del software', 6, 'Ingegneria e scienze informatiche', 1, 3),
('Programmazione di reti', 6, 'Ingegneria e scienze informatiche', 1, 3),
('Tecnologie Web', 6, 'Ingegneria e scienze informatiche', 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `mense`
--

CREATE TABLE `mense` (
  `IdMensa` int(6) UNSIGNED NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Indirizzo` varchar(150) NOT NULL,
  `Latitudine` float NOT NULL,
  `Longitudine` float NOT NULL,
  `SitoWeb` varchar(200) DEFAULT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Valutazione` int(11) NOT NULL,
  `TipoServizio` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `mense`
--

INSERT INTO `mense` (`IdMensa`, `Nome`, `Indirizzo`, `Latitudine`, `Longitudine`, `SitoWeb`, `Telefono`, `Valutazione`, `TipoServizio`) VALUES
(1, 'Le Fricò Self Service', 'Piazzale Karl Marx, 47521 Cesena FC', 44.1444, 12.2485, 'http://www.camst.it/', '0547 20437', 30, 3),
(2, 'America Graffiti Diner Restaurant Cesena', 'Piazza Aldo Moro, 170, 47521 Cesena FC', 44.1438, 12.2486, 'http://www.americagraffiti.it/', '0547 612024', 85, 6),
(3, 'La Saraghina', 'Via Giovanni Bovio, 186, 47521 Cesena FC', 44.1433, 12.2469, NULL, '0547 612506', 70, 7),
(4, 'La Malaghiotta', 'Piazza Fabbri, 5, 47521 Cesena FC', 44.1384, 12.2435, NULL, '338 1794650', 80, 7),
(5, 'Maison Lulu', 'Piazza Fabbri, 5, 47521 Cesena FC', 44.1384, 12.2433, NULL, '0547 610456', 72, 9),
(6, 'Piotto', 'Piazza Fabbri, 3, 47521 Cesena FC', 44.1382, 12.2433, 'http://piotto.eu/', '0547 28692', 88, 4),
(7, 'Gelateria Mara & Meo', 'Piazza Fabbri, 3, 47521 Cesena FC', 44.1383, 12.2433, NULL, '0547 346212', 61, 8),
(8, 'Sei&60 La Gelateria', 'Via Mura Barriera Ponente, 61, 47521 Cesena FC', 44.1411, 12.2442, 'http://www.6e60lagelateria.com/', '331 6228800', 65, 8),
(9, 'DolceAmaro', 'Viale Gaspare Finali, 50, 47521 Cesena FC', 44.1408, 12.2453, 'http://www.dolceamarobar.it/soon/', '0547 27436', 78, 9),
(10, 'Burro e salvia', 'Foro Annonario, Piazza del Popolo, 47521 Cesena FC', 44.1364, 12.2426, NULL, '0547 263582', 84, 1),
(11, 'Bar Sombrero', 'Contrada Uberti, 52, 47521 Cesena FC ', 44.1409, 12.244, NULL, '0547 27199 ', 73, 9);

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
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `IdNotifica` int(6) UNSIGNED NOT NULL,
  `Titolo` varchar(200) NOT NULL,
  `Url` varchar(500) DEFAULT NULL,
  `Tipo` varchar(50) NOT NULL,
  `DataOra` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `notifiche`
--

INSERT INTO `notifiche` (`IdNotifica`, `Titolo`, `Url`, `Tipo`, `DataOra`) VALUES
(1, 'Scadenza seconda rata', NULL, 'Tassa', '2017-02-18 18:55:14'),
(2, 'Disponibile il bando Erasmus 2016/2017', NULL, 'Bando', '2016-12-21 00:00:00'),
(3, 'Scadenza prima rata', NULL, 'Tassa', '2016-10-18 00:00:00'),
(4, 'Disponibile il bando di concoroso per ricercatore a tempo determinato', NULL, 'Bando', '2016-10-10 00:00:00'),
(5, 'Bando TOLC-I', NULL, 'Bando', '2016-08-30 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `notizie`
--

CREATE TABLE `notizie` (
  `IdNotizia` int(6) UNSIGNED NOT NULL,
  `Tipo` int(6) UNSIGNED NOT NULL,
  `DataOra` datetime NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `Sommario` varchar(1000) DEFAULT NULL,
  `Testo` varchar(10000) NOT NULL,
  `Immagine` varchar(255) DEFAULT NULL,
  `IsCorso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `notizie`
--

INSERT INTO `notizie` (`IdNotizia`, `Tipo`, `DataOra`, `Titolo`, `Sommario`, `Testo`, `Immagine`, `IsCorso`) VALUES
(1, 1, '2017-01-31 00:00:00', 'Più fondi e più borse di studio per i dottorati Unibo', 'Aumenta di due milioni e mezzo lo stanziamento per finanziare il prossimo ciclo di dottorato (il 33esimo): l’obiettivo è di attivare circa 100 borse in più', 'Due milioni e mezzo di euro in più per i dottorati dell’Alma Mater. Lo ha sancito oggi il Consiglio di Amministrazione dell’Università di Bologna, portando lo stanziamento a favore del terzo ciclo di studi da 11 a circa 13,6 milioni di euro.\r\nL’obiettivo – in linea con il nuovo Piano Strategico di Ateneo – è di finanziare circa, anche grazie a finanziamenti esterni, 100 borse di dottorato in più rispetto allo scorso ciclo (il 32esimo), arrivando così a circa 480 borse attivate nel 33esimo ciclo.\r\n\r\nParte del nuovo finanziamento potrà inoltre essere dedicato all’avvio di nuovi corsi di dottorato che coinvolgano in particolare le sedi Unibo nel Multicampus della Romagna o che abbiano un’anima interdipartimentale.\r\n\r\nNovità anche per le modalità di stanziamento dei fondi ai singoli Dipartimenti, che saranno calcolati per il 50 per cento in base alla capacità dimensionale dei Dipartimenti di supportare i corsi di dottorato e per il restante 50 per cento utilizzando una serie di indicatori premiali, coerenti con quelli utilizzati dal MIUR per calcolare il Fondo di Finanziamento Ordinario.', 'http://localhost/smartunibo/src/home/news/images/UNIBO0001.jpg', 0),
(2, 5, '2016-12-19 00:00:00', 'Massimo Bottura sarà laureato ad honorem all''Università di Bologna', 'Lo chef e imprenditore dell’Osteria Francescana di Modena riceverà all''Alma Mater la laurea ad honorem in Direzione Aziendale.', 'Massimo Bottura – chef e imprenditore dell’Osteria Francescana di Modena, miglior ristorante del mondo nella lista World''s 50 Best Restaurants 2016 - riceverà la Laurea ad honorem in Direzione Aziendale, lunedì 6 febbraio, alle 18, nell''Aula Magna Santa Lucia. A consegnarla sarà il Rettore Francesco Ubertini, su proposta del Dipartimento di Scienze Aziendali.\r\n\r\nAd aprire la cerimonia sarà il Rettore Francesco Ubertini, dopo l’esecuzione musicale del Collegium Musicum Almae Matris. A pronunciare la Laudatio sarà Max Bergami, professore di Organizzazione Aziendale dell''Alma Mater e Dean della Bologna Business School, cui seguirà la lettura della disposizione dipartimentale di Carlo Boschetti, Direttore del Dipartimento di Scienze Aziendali. Infine la proclamazione dello chef Massimo Bottura, laureato ad honorem in Direzione Aziendale dell’Alma Mater, che chiuderà la cerimonia con una Lezione magistrale.\r\n\r\n“Il percorso di Massimo Bottura si colloca all’incrocio tra imprenditorialità, cultura e tecnica e rappresenta un esempio per la diffusione della cultura italiana e per lo sviluppo del Made in Italy a livello internazionale" - spiega il Rettore dell’Università di Bologna Francesco Ubertini.\r\n\r\n“Massimo Bottura rappresenta un caso esemplare di gestione di una piccola impresa familiare italiana, raggiungendo in pochi anni un successo senza precedenti e una notorietà a livello globale. - si legge nella motivazione - Dal punto di vista aziendale ha realizzato una deliberata strategia di crescita, volta allo sviluppo della qualità e alla visibilità internazionale, mediante visione, capacità imprenditoriale, creazione e gestione del team, innovazione di prodotto e raggiungimento di un livello di servizio molto elevato. L’opera di Bottura è un esempio di innovazione, mediante l’espressione di una creatività che affonda le proprie radici nella tradizione culturale territoriale, ispirandosi contemporaneamente a elementi quali l’arte contemporanea o la musica jazz. La creatività di Bottura si basa su una perfetta padronanza della tecnica, fondata sul desiderio di valorizzare il territorio in cui è nato, le sue tradizioni e i suoi prodotti. Questo connubio assume un’originalità esemplare mediante l’incessante contaminazione con elementi culturali di mondi e culture diverse, frutto delle sue passioni, dei suoi viaggi e del suo inesauribile desiderio di scoperta”.\r\n\r\nLa laurea Magistrale in Direzione Aziendale del Dipartimento di Scienze Aziendali di Bologna prevede un percorso in lingua italiana e uno in lingua inglese e rappresenta una delle punte di diamante della formazione manageriale dell’Ateneo di Bologna, dove i giovani si preparano a guidare le imprese italiane nel mondo.\r\n\r\nChi è Massimo Bottura\r\nNato a Modena il 30 settembre 1962, dopo la maturità, si iscrive alla Facoltà di Giurisprudenza dell’Università di Modena nel 1984, ma dopo 2 anni lascia gli studi, rinuncia a lavorare nell’azienda di famiglia nel settore dei prodotti petroliferi all’ingrosso e acquista la trattoria del Campazzo, a Nonantola. Nel 1995 rileva l’Osteria Francescana e in pochi anni attira l’attenzione della critica internazionale, scalando rapidamente tutte le classifiche, fino a conquistare le 3 stelle Michelin nel 2011 e raggiungere la vetta della World''s 50 Best Restaurants nel 2016. In occasione dell’Expo 2015 lancia il Refettorio Ambrosiano, un nuovo format dedicato alla sostenibilità e ai bisognosi, dalla cui esperienza nasce la Onlus Food for Soul con la quale ha lanciato diversi progetti analoghi di cui uno a Rio de Janeiro in occasione delle Olimpiadi.', 'http://localhost/smartunibo/src/home/news/images/UNIBO0002.jpg', 0),
(3, 3, '2016-12-21 00:00:00', 'Workshop “Maker Inside (and Outside)”  ', 'Aula A presso Ingegneria e Scienze Informatiche via Sacchi,3 Cesena', 'Mercoledì 21/12/2016 dalle 14.00 in Aula A (via Sacchi, 3)organizzato nell’ambito del corso di Programmazione di Sistemi Embedded ma rivolto a tutti gli studenti interessati agli argomenti trattati (tra cui Windows IoT Core, LabView, Wearable/Eyewear Computing, …)\r\n\r\nProgramma dettagliato e Locandina al seguente link: http://apice.unibo.it/xwiki/bin/view/Events/Miw16', NULL, 1),
(4, 3, '2017-01-30 00:00:00', 'Unijunior arriva anche al Campus di Ravenna ', 'Il ciclo di lezioni universitarie per ragazze e ragazzi tra gli 8 e i 14 anni arriva anche nella sede ravennate dell''Alma Mater', 'Finalmente anche a Ravenna parte Unijunior: una serie di lezioni tenute da professori universitari, aperte a ragazze e ragazzi di età compresa fra gli 8 e i 14 anni. Da sabato 4 febbraio i giovanissimi studenti affolleranno le aule del Campus ravennate dell''Università di Bologna con le loro curiosità e domande per sei appuntamenti, tutti il sabato pomeriggio, che si concluderanno il 22 aprile con la festa di Laurea in Unijunior.\r\n\r\nIl programma comprende svariati ambiti disciplinari: chimica, ingegneria, architettura, archeologia, scienze biologiche e ambientali, oceanografia, conservazione dei beni culturali, giurisprudenza. Tanti e vari gli argomenti delle lezioni in calendario: le fonti rinnovabili di energia e l''anidride carbonica, il disegno, la costruzione degli edifici, il mestiere dell''archeologo, i segreti e l''importanza dell''oceano, la flora e la fauna del mare, la lingua dell''Antico Testamento, la pittura fra arte e scienza, le regole del “cybermondo”.\r\n\r\nL''associazione Leo Scienza (promotrice ed organizzatrice del progetto Unijunior in collaborazione con il Campus di Ravenna dell''Alma Mater e Fondazione Flaminia) è certa che l''iniziativa riscuoterà lo stesso grande successo di partecipazione registrato nelle altre province emiliano-romagnole (Bologna, Modena e Reggio Emilia, Ferrara, Rimini, Forlì e Cesena). A una settimana dalla chiusura delle iscrizioni i partecipanti sono già 150.\r\n\r\nIl progetto Unijunior rappresenta un ponte fra territorio e Università: il mondo accademico si apre infatti alla cittadinanza raggiungendo le famiglie. Il fine è quello di contrastare la perdita di interesse verso la conoscenza e la ricerca attraverso una formula che presenta e rende l''Università un luogo accessibile a tutti ed in particolare alle giovani generazioni, “tempio del sapere” ma anche spazio di condivisione e confronto, dove tutte le domande sono preziose.\r\n\r\nIl progetto Unijunior vuole infine proporre una visione della conoscenza che sia da stimolo per i giovanissimi e guida nelle loro scelte future. Conoscenza intesa non come ricezione passiva e imposta ma come conquista attiva, mossa da curiosità, passione ed intraprendenza perché, come diceva Plutarco, “i giovani non sono vasi da riempire ma fiaccole da accendere”.\r\n\r\nUnijunior Ravenna terminerà con una grande festa finale di consegna dei diplomi alla presenza dei docenti universitari e degli scienziati di Leo Scienza, che intratterranno il pubblico (gli studenti e i loro genitori) con uno spettacolo teatrale-scientifico, in grado di combinare comicità, poesia e interazione con il pubblico. La festa finale si svolgerà sabato 22 aprile alle 15 e alle 16,30 al Palazzo dei Congressi di Ravenna.', 'http://localhost/smartunibo/src/home/news/images/UNIBO0003.jpg', 0),
(5, 3, '2017-02-02 00:00:00', 'Conoscere per crescere: apre le porte l’Università dei piccoli', 'Torna la quinta edizione di Unijunior al Campus di Rimini, per accogliere i ragazzi fra gli 8 e i 14 anni che potranno frequentare le lezioni tenute dai professori universitari', 'Dal 4 febbraio torna a Rimini il progetto didattico Unijunior, giunto ormai alla quinta edizione. Grazie a questo progetto, nelle aule del Campus di Rimini, i ragazzi fra gli 8 e i 14 anni potranno frequentare le lezioni tenute dai professori universitari. Argomenti “da grandi” saranno trattati in modo da suscitare la curiosità dei ragazzi e stimolare la loro fantasia: si passa dalla biologia al marketing, dall’economia all’informatica, allo sport. \r\n\r\nBasta dare un’occhiata al ricco programma per capire che anche quest’anno i professori del Campus non si sono fatti mancare una buona dose di creatività: “Comprami, sono il migliore! A che cosa serve la pubblicità”, “Yeeeeeah! Storie di celebrità rock, pop, dance”, “Noccioline di sport”, “Un’imprevedibile storia della moda: da Cenerentola allo Jedi” sono solo alcuni dei tanti titoli proposti quest’anno. \r\n\r\nE la risposta dei piccoli non si è fatta attendere! "Buona parte delle lezioni ha già fatto registrare il tutto esaurito." - racconta la Dr.ssa Raffaella Casadei, docente del Campus e referente Unijunior per la sede di Rimini - "Ci sono ancora alcune lezioni disponibili, ma il consiglio è di affrettarsi perché ogni appuntamento è aperto a un numero limitato di partecipanti". \r\n\r\nLe informazioni necessarie per l’iscrizione sono disponibili sul sito Unijunior: al momento dell’iscrizione si richiede soltanto il versamento di una quota associativa di 25 Euro, che darà diritto a scegliere sei lezioni da seguire durante l’anno accademico e a partecipare alla festa di fine corso, una vera e propria cerimonia di laurea, presieduta dai docenti Unijunior vestiti con la toga accademica, così da rendere ancora più solenne il momento in cui tutti i partecipanti saranno proclamati “dottori Unijunior”. Tutte le lezioni si svolgeranno presso la sede del Dipartimento di Scienze per la Qualità della Vita, Corso d’Augusto 237, a Rimini.', 'http://localhost/smartunibo/src/home/news/images/UNIBO0004.jpg', 0),
(6, 3, '2017-01-25 00:00:00', 'Open Day 20 Gennaio 2017', 'Con l''inizio del nuovo anno, tornano gli Open Day!', 'Mercoledì 25 Gennaio 2017 in aula A presso il corso di Ingegneria e Scienze Informatiche di Cesena si svolgerà un Open Day.', NULL, 1),
(7, 4, '2016-10-22 00:00:00', 'Linux Day 2016', 'Il Linux Day torna a Cesena!!!', 'Quest''anno è prevista una giornata davvero ricca:\r\nAlle 9:00 aprirà i lavori l''assessore all''innovazione e sviluppo del comune di Cesena Tommaso Dionigi\r\nAlle 9:15 cominciano gli interventi dei nostri relatori a partire da Sergio Gridelli con "La libertà non ha prezzo"\r\nAlle 10:15 troviamo Sonia Montegiove con il suo talk dal titolo "CommUNITY: fare rete per crescere insieme"\r\nAlle 11:15 la presentazione del progetto "Trashware" a cura di Alessandro Tappi\r\nDopo la pausa pranzo si ricomincia più carichi che mai con\r\nAlle 14:30 la parola passerà al prof. Alessandro Ricci che presenterà "Pensiero computazionale e coding"\r\nA seguire alle 15:30 Daniele Bellavista terrà il suo talk dal titolo "Bring your own Kali"\r\n\r\nLa partecipazione al Linux Day è ovviamente COMPLETAMENTE GRATUITA.\r\nPer poterci meglio organizzare vi chiediamo di registrarvi all''indirizzo: https://www.eventbrite.com/e/biglietti-linuxday-cesena-28618733402', NULL, 1),
(8, 4, '2016-10-15 00:00:00', 'ViaggioSprite 2016 - Roma, Maker Faire', 'Un''occasione imperdibile per tutti i "makers" di Ingegneria e scienze informatiche', '-> Iscrizioni in sede S.P.R.I.Te. (via Sacchi 3) <-\r\nAndata e ritorno in autobus e l''ingresso alla Maker Faire di Roma con soli 10 euro!\r\n\r\nInoltre alla Fiera di Roma sono disponibili mezzi per spostarsi autonomamente in centro (consultare su internet costi e orari).\r\n\r\nPartenza alle 5.00 dal Piazzale Karl Marx (piazzale autobus - stazione) e si riparte da Roma alle 20.00', NULL, 1),
(9, 4, '2016-06-01 00:00:00', 'GAME - design & development', NULL, 'Mercoledì 1 giugno (ore 14, aula B), Marco Agricola e Michele Postpischi terranno un seminario sul design ed implementazioni di giochi.\r\n\r\nIn particolare, racconteranno le loro esperienze che hanno riguardato l''implementazione software (spesso come unici programmatori) e la modellazione digitale del suono di diversi giochi e audiogame, sia per pc con unity e C# che per mobile.\r\n\r\nLa loro esperienza riguarda quindi non solo programmazione ma anche storyboard, stesura dialoghi, direzione grafica, musiche e doppiaggi)\r\n\r\nRiassumendo con loro parole, si sono occupati di: "giochi per bambini, accessibilità nei giochi, avventure grafiche, giochi strani con tantissima gente che si picchia."\r\n\r\nEnfasi particolare sarà posta sul gioco che stanno sviluppando ora: RIOT, "sicuramente il gioco più appariscente della serie":\r\ne http://store.steampowered.com/app/342310\r\n\r\nIscrizione gratuita, segui il link\r\nhttp://doodle.com/poll/i84ycpm9q4xtpahh\r\n\r\nPer chi fosse ancora curioso, ecco altri esempi di giochi che hanno sviluppato:\r\n- una demo fatta in un paio di settimane che ha vinto una Jam di Indie Vault\r\nhttps://lochiamavanotriniteam.itch.io/schiaffifagioli\r\n- la serie My Little Cook con la casa editrice di Gradozero\r\nhttp://www.mamamo.it/app/my-little-cook-hd\r\nhttps://www.youtube.com/watch?v=jc_tSaXdKSA\r\n- due app con Clementoni, Fantafattoria e Fantasea \r\nhttps://www.youtube.com/watch?v=lt1wqm8vcI4\r\n- due capitoli di un''avventura grafica tratta dalla saga di Nicolas Eymerich di Valerio Evangelisti\r\nhttps://www.youtube.com/watch?v=to3IphSaaE4&list=PLUVhVmFrDvfgy08b6rC0miYIYc0jqMr7p\r\n- Black Viper, un''avventura/hidden object pubblicata con Microids, in cui ho fatto praticamente tutto (programmazione, storyboard, stesura dialoghi, direzione grafica, musiche e doppiaggi)\r\nhttps://www.youtube.com/watch?v=-n7eSCvRJxg\r\n- diversi audiogame, tra cui un bell''esperimento, She Noire, la trasposizione di Black Viper giocabile solo attraverso l''audio.\r\nhttps://www.youtube.com/watch?v=6jeD9dyk0_Q', NULL, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ruoli`
--

CREATE TABLE `ruoli` (
  `IdRuolo` int(4) UNSIGNED NOT NULL,
  `Descrizione` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ruoli`
--

INSERT INTO `ruoli` (`IdRuolo`, `Descrizione`) VALUES
(1, 'Docente di teoria'),
(2, 'Docente di laboratorio');

-- --------------------------------------------------------

--
-- Struttura della tabella `sedi`
--

CREATE TABLE `sedi` (
  `IdSede` int(4) UNSIGNED NOT NULL,
  `Nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `sedi`
--

INSERT INTO `sedi` (`IdSede`, `Nome`) VALUES
(1, 'Cesena');

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
  `CodiceCorsoDiStudio` int(6) UNSIGNED DEFAULT NULL,
  `NomeCorso` varchar(100) NOT NULL,
  `Sede` int(4) UNSIGNED NOT NULL,
  `AnnoCorso` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`Matricola`, `Nome`, `Cognome`, `CF`, `Sesso`, `DataNascita`, `ComuneNascita`, `NazioneNascita`, `Cittadinanza`, `EmailIstituzionale`, `Pw`, `Salt`, `EmailPrivata`, `Cellulare`, `Nazione`, `Provincia`, `Comune`, `Indirizzo`, `CAP`, `Frazione`, `TelefonoResidenza`, `CodiceCorsoDiStudio`, `NomeCorso`, `Sede`, `AnnoCorso`) VALUES
(123456, 'Mario', 'Rossi', 'RSSMRA95A01C573K', 'M', '1995-01-01', 'Cesena', 1, 1, 'mario.rossi@studio.unibo.it', '105b8591e887023e91b393535fb9446e98f7fa1db69da6f578247f6ed269cde1e68d68971dbb58a1d6edb537e5474a2464914ee2c49e10eb41ef9a4fa08deae7', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef', 'mario.rossi@gmail.com', NULL, 1, 'FC', 'Cesena', 'Via Sacchi 3', 47521, NULL, NULL, 8615, 'Ingegneria e scienze informatiche', 1, 3),
(234567, 'Luigi', 'Verdi', 'VRDLGU95A01H294H', 'M', '1994-01-01', 'Rimini', 1, 1, 'luigi.verdi@studio.unibo.it', 'f21fced8b711044cf87ff9115f4ea81a143df25ebe18913b11b67e1bc5f64168e4b15fa926c1e92119a4736e97219728aa7645b6c05ae4748b675c0b7875eb46', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'luigi.verdi@gmail.com', NULL, 1, 'RN', 'Rimini', 'Via Pirandello 8', 47921, NULL, NULL, 8615, 'Ingegneria e scienze informatiche', 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `tentativi_login`
--

CREATE TABLE `tentativi_login` (
  `Matricola` int(6) UNSIGNED NOT NULL,
  `Ora` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tentativi_login`
--

INSERT INTO `tentativi_login` (`Matricola`, `Ora`) VALUES
(123456, '1486417867'),
(123456, '1487108196'),
(234567, '1482359198');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipi_eventi`
--

CREATE TABLE `tipi_eventi` (
  `TipoEvento` varchar(30) NOT NULL,
  `Colore` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tipi_eventi`
--

INSERT INTO `tipi_eventi` (`TipoEvento`, `Colore`) VALUES
('Incontro', '33cc33'),
('Seminario', 'ffcc00'),
('Workshop', '33ccff');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipi_notifiche`
--

CREATE TABLE `tipi_notifiche` (
  `Tipo` varchar(50) NOT NULL,
  `Icona` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tipi_notifiche`
--

INSERT INTO `tipi_notifiche` (`Tipo`, `Icona`) VALUES
('Bando', 'glyphicon-file'),
('Tassa', 'glyphicon-euro');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipi_notizie`
--

CREATE TABLE `tipi_notizie` (
  `IdTipo` int(6) UNSIGNED NOT NULL,
  `Tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tipi_notizie`
--

INSERT INTO `tipi_notizie` (`IdTipo`, `Tipo`) VALUES
(1, 'In Ateneo'),
(2, 'Innovazione e ricerca'),
(3, 'Incontri e iniziative'),
(4, 'Associazione studentesca'),
(5, 'Lauree ad honorem');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipi_servizi`
--

CREATE TABLE `tipi_servizi` (
  `IdTipoServizio` int(6) UNSIGNED NOT NULL,
  `Descrizione` varchar(30) NOT NULL,
  `Immagine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tipi_servizi`
--

INSERT INTO `tipi_servizi` (`IdTipoServizio`, `Descrizione`, `Immagine`) VALUES
(1, 'Ristorante', '/smartunibo/src/foodservice/images/RestaurantMapPointer.png'),
(2, 'Mensa', '/smartunibo/src/foodservice/images/CookhouseMapPointer.png'),
(3, 'Self service', '/smartunibo/src/foodservice/images/SelfServiceMapPointer.png'),
(4, 'Pizzeria', '/smartunibo/src/foodservice/images/PizzaMapPointer.png'),
(5, 'Paninoteca', '/smartunibo/src/foodservice/images/SandwitchMapPointer.png'),
(6, 'Fast food', '/smartunibo/src/foodservice/images/FastFoodMapPointer.png'),
(7, 'Piadineria', '/smartunibo/src/foodservice/images/SandwitchMapPointer.png'),
(8, 'Gelateria', '/smartunibo/src/foodservice/images/IceCreamMapPointer.png'),
(9, 'Bar caffè', '/smartunibo/src/foodservice/images/CoffeeMapPointer.png');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `aule`
--
ALTER TABLE `aule`
  ADD PRIMARY KEY (`Sede`,`Nome`),
  ADD KEY `Sede` (`Sede`);

--
-- Indici per le tabelle `corsi`
--
ALTER TABLE `corsi`
  ADD PRIMARY KEY (`Nome`,`Sede`),
  ADD KEY `Sede` (`Sede`);

--
-- Indici per le tabelle `corsi_anni`
--
ALTER TABLE `corsi_anni`
  ADD PRIMARY KEY (`NomeCorso`,`Sede`,`Anno`),
  ADD KEY `NomeCorso` (`NomeCorso`),
  ADD KEY `Sede` (`Sede`);

--
-- Indici per le tabelle `docenti`
--
ALTER TABLE `docenti`
  ADD PRIMARY KEY (`IdDocente`);

--
-- Indici per le tabelle `docenti_materie`
--
ALTER TABLE `docenti_materie`
  ADD PRIMARY KEY (`IdDocente`,`NomeMateria`,`IdRuolo`),
  ADD KEY `IdDocente` (`IdDocente`),
  ADD KEY `NomeMateria` (`NomeMateria`),
  ADD KEY `IdRuolo` (`IdRuolo`);

--
-- Indici per le tabelle `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`IdEvento`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indici per le tabelle `eventi_studenti`
--
ALTER TABLE `eventi_studenti`
  ADD PRIMARY KEY (`IdEvento`,`Matricola`),
  ADD KEY `IdEvento` (`IdEvento`),
  ADD KEY `Matricola` (`Matricola`);

--
-- Indici per le tabelle `lezioni`
--
ALTER TABLE `lezioni`
  ADD PRIMARY KEY (`IdLezione`),
  ADD KEY `NomeMateria` (`NomeMateria`),
  ADD KEY `Sede` (`Sede`),
  ADD KEY `Aula` (`Aula`),
  ADD KEY `lezioni_ibfk_2` (`Sede`,`Aula`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`Nome`),
  ADD KEY `NomeCorso` (`NomeCorso`),
  ADD KEY `Sede` (`Sede`),
  ADD KEY `Anno` (`AnnoCorso`),
  ADD KEY `NomeCorso_2` (`NomeCorso`,`Sede`,`AnnoCorso`);

--
-- Indici per le tabelle `mense`
--
ALTER TABLE `mense`
  ADD PRIMARY KEY (`IdMensa`),
  ADD KEY `TipoServizio` (`TipoServizio`);

--
-- Indici per le tabelle `nazioni`
--
ALTER TABLE `nazioni`
  ADD PRIMARY KEY (`IdNazione`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`IdNotifica`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indici per le tabelle `notizie`
--
ALTER TABLE `notizie`
  ADD PRIMARY KEY (`IdNotizia`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indici per le tabelle `ruoli`
--
ALTER TABLE `ruoli`
  ADD PRIMARY KEY (`IdRuolo`);

--
-- Indici per le tabelle `sedi`
--
ALTER TABLE `sedi`
  ADD PRIMARY KEY (`IdSede`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`Matricola`),
  ADD UNIQUE KEY `CF` (`CF`),
  ADD UNIQUE KEY `EmaiIstituzionale` (`EmailIstituzionale`),
  ADD KEY `Nazione` (`Nazione`),
  ADD KEY `NazioneNascita` (`NazioneNascita`),
  ADD KEY `Cittadinanza` (`Cittadinanza`),
  ADD KEY `NomeCorso` (`NomeCorso`),
  ADD KEY `Sede` (`Sede`),
  ADD KEY `Anno` (`AnnoCorso`),
  ADD KEY `NomeCorso_2` (`NomeCorso`,`Sede`,`AnnoCorso`);

--
-- Indici per le tabelle `tentativi_login`
--
ALTER TABLE `tentativi_login`
  ADD PRIMARY KEY (`Matricola`,`Ora`);

--
-- Indici per le tabelle `tipi_eventi`
--
ALTER TABLE `tipi_eventi`
  ADD PRIMARY KEY (`TipoEvento`);

--
-- Indici per le tabelle `tipi_notifiche`
--
ALTER TABLE `tipi_notifiche`
  ADD PRIMARY KEY (`Tipo`);

--
-- Indici per le tabelle `tipi_notizie`
--
ALTER TABLE `tipi_notizie`
  ADD PRIMARY KEY (`IdTipo`);

--
-- Indici per le tabelle `tipi_servizi`
--
ALTER TABLE `tipi_servizi`
  ADD PRIMARY KEY (`IdTipoServizio`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `docenti`
--
ALTER TABLE `docenti`
  MODIFY `IdDocente` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `eventi`
--
ALTER TABLE `eventi`
  MODIFY `IdEvento` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `lezioni`
--
ALTER TABLE `lezioni`
  MODIFY `IdLezione` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT per la tabella `mense`
--
ALTER TABLE `mense`
  MODIFY `IdMensa` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `nazioni`
--
ALTER TABLE `nazioni`
  MODIFY `IdNazione` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `IdNotifica` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `notizie`
--
ALTER TABLE `notizie`
  MODIFY `IdNotizia` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `ruoli`
--
ALTER TABLE `ruoli`
  MODIFY `IdRuolo` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `sedi`
--
ALTER TABLE `sedi`
  MODIFY `IdSede` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `tipi_notizie`
--
ALTER TABLE `tipi_notizie`
  MODIFY `IdTipo` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `tipi_servizi`
--
ALTER TABLE `tipi_servizi`
  MODIFY `IdTipoServizio` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `aule`
--
ALTER TABLE `aule`
  ADD CONSTRAINT `aule_ibfk_1` FOREIGN KEY (`Sede`) REFERENCES `sedi` (`IdSede`);

--
-- Limiti per la tabella `corsi`
--
ALTER TABLE `corsi`
  ADD CONSTRAINT `corsi_ibfk_1` FOREIGN KEY (`Sede`) REFERENCES `sedi` (`IdSede`);

--
-- Limiti per la tabella `corsi_anni`
--
ALTER TABLE `corsi_anni`
  ADD CONSTRAINT `corsi_anni_ibfk_1` FOREIGN KEY (`NomeCorso`,`Sede`) REFERENCES `corsi` (`Nome`, `Sede`);

--
-- Limiti per la tabella `docenti_materie`
--
ALTER TABLE `docenti_materie`
  ADD CONSTRAINT `docenti_materie_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `docenti` (`IdDocente`),
  ADD CONSTRAINT `docenti_materie_ibfk_2` FOREIGN KEY (`NomeMateria`) REFERENCES `materie` (`Nome`),
  ADD CONSTRAINT `docenti_materie_ibfk_3` FOREIGN KEY (`IdRuolo`) REFERENCES `ruoli` (`IdRuolo`);

--
-- Limiti per la tabella `eventi`
--
ALTER TABLE `eventi`
  ADD CONSTRAINT `eventi_ibfk_1` FOREIGN KEY (`Tipo`) REFERENCES `tipi_eventi` (`TipoEvento`);

--
-- Limiti per la tabella `eventi_studenti`
--
ALTER TABLE `eventi_studenti`
  ADD CONSTRAINT `eventi_studenti_ibfk_1` FOREIGN KEY (`IdEvento`) REFERENCES `eventi` (`IdEvento`),
  ADD CONSTRAINT `eventi_studenti_ibfk_2` FOREIGN KEY (`Matricola`) REFERENCES `studenti` (`Matricola`);

--
-- Limiti per la tabella `lezioni`
--
ALTER TABLE `lezioni`
  ADD CONSTRAINT `lezioni_ibfk_1` FOREIGN KEY (`NomeMateria`) REFERENCES `materie` (`Nome`),
  ADD CONSTRAINT `lezioni_ibfk_2` FOREIGN KEY (`Sede`,`Aula`) REFERENCES `aule` (`Sede`, `Nome`);

--
-- Limiti per la tabella `materie`
--
ALTER TABLE `materie`
  ADD CONSTRAINT `materie_ibfk_1` FOREIGN KEY (`NomeCorso`,`Sede`,`AnnoCorso`) REFERENCES `corsi_anni` (`NomeCorso`, `Sede`, `Anno`);

--
-- Limiti per la tabella `mense`
--
ALTER TABLE `mense`
  ADD CONSTRAINT `mense_ibfk_1` FOREIGN KEY (`TipoServizio`) REFERENCES `tipi_servizi` (`IdTipoServizio`);

--
-- Limiti per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  ADD CONSTRAINT `notifiche_ibfk_1` FOREIGN KEY (`Tipo`) REFERENCES `tipi_notifiche` (`Tipo`);

--
-- Limiti per la tabella `notizie`
--
ALTER TABLE `notizie`
  ADD CONSTRAINT `notizie_ibfk_1` FOREIGN KEY (`Tipo`) REFERENCES `tipi_notizie` (`IdTipo`);

--
-- Limiti per la tabella `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`Cittadinanza`) REFERENCES `nazioni` (`IdNazione`),
  ADD CONSTRAINT `studenti_ibfk_2` FOREIGN KEY (`Nazione`) REFERENCES `nazioni` (`IdNazione`),
  ADD CONSTRAINT `studenti_ibfk_3` FOREIGN KEY (`NazioneNascita`) REFERENCES `nazioni` (`IdNazione`),
  ADD CONSTRAINT `studenti_ibfk_4` FOREIGN KEY (`NomeCorso`,`Sede`,`AnnoCorso`) REFERENCES `corsi_anni` (`NomeCorso`, `Sede`, `Anno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
