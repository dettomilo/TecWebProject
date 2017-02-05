-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 05, 2017 alle 21:33
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
(1, 1, '2017-01-31 00:00:00', 'Più fondi e più borse di studio per i dottorati Unibo', 'Aumenta di due milioni e mezzo lo stanziamento per finanziare il prossimo ciclo di dottorato (il 33esimo): l’obiettivo è di attivare circa 100 borse in più', 'Due milioni e mezzo di euro in più per i dottorati dell’Alma Mater. Lo ha sancito oggi il Consiglio di Amministrazione dell’Università di Bologna, portando lo stanziamento a favore del terzo ciclo di studi da 11 a circa 13,6 milioni di euro. L’obiettivo – in linea con il nuovo Piano Strategico di Ateneo – è di finanziare circa, anche grazie a finanziamenti esterni, 100 borse di dottorato in più rispetto allo scorso ciclo (il 32esimo), arrivando così a circa 480 borse attivate nel 33esimo ciclo.\r\n\r\nParte del nuovo finanziamento potrà inoltre essere dedicato all’avvio di nuovi corsi di dottorato che coinvolgano in particolare le sedi Unibo nel Multicampus della Romagna o che abbiano un’anima interdipartimentale.\r\n\r\nNovità anche per le modalità di stanziamento dei fondi ai singoli Dipartimenti, che saranno calcolati per il 50 per cento in base alla capacità dimensionale dei Dipartimenti di supportare i corsi di dottorato e per il restante 50 per cento utilizzando una serie di indicatori premiali, coerenti con quelli utilizzati dal MIUR per calcolare il Fondo di Finanziamento Ordinario.', 'http://localhost/smartunibo/home/news/UNIBO0001.jpg', 0),
(2, 5, '2016-12-19 00:00:00', 'Massimo Bottura sarà laureato ad honorem all\'Università di Bologna', 'Lo chef e imprenditore dell’Osteria Francescana di Modena, miglior ristorante del mondo nella lista World\'s 50 Best Restaurants 2016, riceverà all\'Alma Mater la laurea ad honorem in Direzione Aziendale. Ingresso libero all\'evento fino a esaurimento dei posti disponibili', 'Massimo Bottura – chef e imprenditore dell’Osteria Francescana di Modena, miglior ristorante del mondo nella lista World\'s 50 Best Restaurants 2016 - riceverà la Laurea ad honorem in Direzione Aziendale, lunedì 6 febbraio, alle 18, nell\'Aula Magna Santa Lucia. A consegnarla sarà il Rettore Francesco Ubertini, su proposta del Dipartimento di Scienze Aziendali.\r\n\r\nAd aprire la cerimonia sarà il Rettore Francesco Ubertini, dopo l’esecuzione musicale del Collegium Musicum Almae Matris. A pronunciare la Laudatio sarà Max Bergami, professore di Organizzazione Aziendale dell\'Alma Mater e Dean della Bologna Business School, cui seguirà la lettura della disposizione dipartimentale di Carlo Boschetti, Direttore del Dipartimento di Scienze Aziendali. Infine la proclamazione dello chef Massimo Bottura, laureato ad honorem in Direzione Aziendale dell’Alma Mater, che chiuderà la cerimonia con una Lezione magistrale.\r\n\r\n“Il percorso di Massimo Bottura si colloca all’incrocio tra imprenditorialità, cultura e tecnica e rappresenta un esempio per la diffusione della cultura italiana e per lo sviluppo del Made in Italy a livello internazionale" - spiega il Rettore dell’Università di Bologna Francesco Ubertini.\r\n\r\n“Massimo Bottura rappresenta un caso esemplare di gestione di una piccola impresa familiare italiana, raggiungendo in pochi anni un successo senza precedenti e una notorietà a livello globale. - si legge nella motivazione - Dal punto di vista aziendale ha realizzato una deliberata strategia di crescita, volta allo sviluppo della qualità e alla visibilità internazionale, mediante visione, capacità imprenditoriale, creazione e gestione del team, innovazione di prodotto e raggiungimento di un livello di servizio molto elevato. L’opera di Bottura è un esempio di innovazione, mediante l’espressione di una creatività che affonda le proprie radici nella tradizione culturale territoriale, ispirandosi contemporaneamente a elementi quali l’arte contemporanea o la musica jazz. La creatività di Bottura si basa su una perfetta padronanza della tecnica, fondata sul desiderio di valorizzare il territorio in cui è nato, le sue tradizioni e i suoi prodotti. Questo connubio assume un’originalità esemplare mediante l’incessante contaminazione con elementi culturali di mondi e culture diverse, frutto delle sue passioni, dei suoi viaggi e del suo inesauribile desiderio di scoperta”.\r\n\r\nLa laurea Magistrale in Direzione Aziendale del Dipartimento di Scienze Aziendali di Bologna prevede un percorso in lingua italiana e uno in lingua inglese e rappresenta una delle punte di diamante della formazione manageriale dell’Ateneo di Bologna, dove i giovani si preparano a guidare le imprese italiane nel mondo.\r\n\r\nChi è Massimo Bottura\r\nNato a Modena il 30 settembre 1962, dopo la maturità, si iscrive alla Facoltà di Giurisprudenza dell’Università di Modena nel 1984, ma dopo 2 anni lascia gli studi, rinuncia a lavorare nell’azienda di famiglia nel settore dei prodotti petroliferi all’ingrosso e acquista la trattoria del Campazzo, a Nonantola. Nel 1995 rileva l’Osteria Francescana e in pochi anni attira l’attenzione della critica internazionale, scalando rapidamente tutte le classifiche, fino a conquistare le 3 stelle Michelin nel 2011 e raggiungere la vetta della World\'s 50 Best Restaurants nel 2016. In occasione dell’Expo 2015 lancia il Refettorio Ambrosiano, un nuovo format dedicato alla sostenibilità e ai bisognosi, dalla cui esperienza nasce la Onlus Food for Soul con la quale ha lanciato diversi progetti analoghi di cui uno a Rio de Janeiro in occasione delle Olimpiadi.', 'http://localhost/smartunibo/home/news/UNIBO0002.jpg', 0),
(3, 3, '2016-12-21 00:00:00', 'Workshop “Maker Inside (and Outside)”  ', 'Aula A presso Ingegneria e Scienze Informatiche via Sacchi,3 Cesena', 'Mercoledì 21/12/2016 dalle 14.00 in Aula A (via Sacchi, 3)organizzato nell’ambito del corso di Programmazione di Sistemi Embedded ma rivolto a tutti gli studenti interessati agli argomenti trattati (tra cui Windows IoT Core, LabView, Wearable/Eyewear Computing, …)\r\n\r\nProgramma dettagliato e Locandina al seguente link: http://apice.unibo.it/xwiki/bin/view/Events/Miw16', NULL, 1),
(4, 3, '2017-01-30 00:00:00', 'Unijunior arriva anche al Campus di Ravenna ', 'Il ciclo di lezioni universitarie per ragazze e ragazzi tra gli 8 e i 14 anni arriva anche nella sede ravennate dell\'Alma Mater', 'Finalmente anche a Ravenna parte Unijunior: una serie di lezioni tenute da professori universitari, aperte a ragazze e ragazzi di età compresa fra gli 8 e i 14 anni. Da sabato 4 febbraio i giovanissimi studenti affolleranno le aule del Campus ravennate dell\'Università di Bologna con le loro curiosità e domande per sei appuntamenti, tutti il sabato pomeriggio, che si concluderanno il 22 aprile con la festa di Laurea in Unijunior.\r\n\r\nIl programma comprende svariati ambiti disciplinari: chimica, ingegneria, architettura, archeologia, scienze biologiche e ambientali, oceanografia, conservazione dei beni culturali, giurisprudenza. Tanti e vari gli argomenti delle lezioni in calendario: le fonti rinnovabili di energia e l\'anidride carbonica, il disegno, la costruzione degli edifici, il mestiere dell\'archeologo, i segreti e l\'importanza dell\'oceano, la flora e la fauna del mare, la lingua dell\'Antico Testamento, la pittura fra arte e scienza, le regole del “cybermondo”.\r\n\r\nL\'associazione Leo Scienza (promotrice ed organizzatrice del progetto Unijunior in collaborazione con il Campus di Ravenna dell\'Alma Mater e Fondazione Flaminia) è certa che l\'iniziativa riscuoterà lo stesso grande successo di partecipazione registrato nelle altre province emiliano-romagnole (Bologna, Modena e Reggio Emilia, Ferrara, Rimini, Forlì e Cesena). A una settimana dalla chiusura delle iscrizioni i partecipanti sono già 150.\r\n\r\nIl progetto Unijunior rappresenta un ponte fra territorio e Università: il mondo accademico si apre infatti alla cittadinanza raggiungendo le famiglie. Il fine è quello di contrastare la perdita di interesse verso la conoscenza e la ricerca attraverso una formula che presenta e rende l\'Università un luogo accessibile a tutti ed in particolare alle giovani generazioni, “tempio del sapere” ma anche spazio di condivisione e confronto, dove tutte le domande sono preziose.\r\n\r\nIl progetto Unijunior vuole infine proporre una visione della conoscenza che sia da stimolo per i giovanissimi e guida nelle loro scelte future. Conoscenza intesa non come ricezione passiva e imposta ma come conquista attiva, mossa da curiosità, passione ed intraprendenza perché, come diceva Plutarco, “i giovani non sono vasi da riempire ma fiaccole da accendere”.\r\n\r\nUnijunior Ravenna terminerà con una grande festa finale di consegna dei diplomi alla presenza dei docenti universitari e degli scienziati di Leo Scienza, che intratterranno il pubblico (gli studenti e i loro genitori) con uno spettacolo teatrale-scientifico, in grado di combinare comicità, poesia e interazione con il pubblico. La festa finale si svolgerà sabato 22 aprile alle 15 e alle 16,30 al Palazzo dei Congressi di Ravenna.', 'http://localhost/smartunibo/home/news/UNIBO0003.jpg', 0),
(5, 3, '2017-02-02 00:00:00', 'Conoscere per crescere: apre le porte l’Università dei piccoli', 'Torna la quinta edizione di Unijunior al Campus di Rimini, per accogliere i ragazzi fra gli 8 e i 14 anni che potranno frequentare le lezioni tenute dai professori universitari', 'Dal 4 febbraio torna a Rimini il progetto didattico Unijunior, giunto ormai alla quinta edizione. Grazie a questo progetto, nelle aule del Campus di Rimini, i ragazzi fra gli 8 e i 14 anni potranno frequentare le lezioni tenute dai professori universitari. Argomenti “da grandi” saranno trattati in modo da suscitare la curiosità dei ragazzi e stimolare la loro fantasia: si passa dalla biologia al marketing, dall’economia all’informatica, allo sport. \r\n\r\nBasta dare un’occhiata al ricco programma per capire che anche quest’anno i professori del Campus non si sono fatti mancare una buona dose di creatività: “Comprami, sono il migliore! A che cosa serve la pubblicità”, “Yeeeeeah! Storie di celebrità rock, pop, dance”, “Noccioline di sport”, “Un’imprevedibile storia della moda: da Cenerentola allo Jedi” sono solo alcuni dei tanti titoli proposti quest’anno. \r\n\r\nE la risposta dei piccoli non si è fatta attendere! "Buona parte delle lezioni ha già fatto registrare il tutto esaurito." - racconta la Dr.ssa Raffaella Casadei, docente del Campus e referente Unijunior per la sede di Rimini - "Ci sono ancora alcune lezioni disponibili, ma il consiglio è di affrettarsi perché ogni appuntamento è aperto a un numero limitato di partecipanti". \r\n\r\nLe informazioni necessarie per l’iscrizione sono disponibili sul sito Unijunior: al momento dell’iscrizione si richiede soltanto il versamento di una quota associativa di 25 Euro, che darà diritto a scegliere sei lezioni da seguire durante l’anno accademico e a partecipare alla festa di fine corso, una vera e propria cerimonia di laurea, presieduta dai docenti Unijunior vestiti con la toga accademica, così da rendere ancora più solenne il momento in cui tutti i partecipanti saranno proclamati “dottori Unijunior”. Tutte le lezioni si svolgeranno presso la sede del Dipartimento di Scienze per la Qualità della Vita, Corso d’Augusto 237, a Rimini.', 'http://localhost/smartunibo/home/news/UNIBO0004.jpg', 0),
(6, 3, '2017-01-25 00:00:00', 'Open Day 20 Gennaio 2017', NULL, 'Mercoledì 25 Gennaio 2017 in aula A presso il corso di Ingegneria e Scienze Informatiche di Cesena si svolgerà un Open Day.', NULL, 1),
(7, 4, '2016-10-22 00:00:00', 'Linux Day 2016', 'Il Linux Day torna a Cesena!!', 'Quest\'anno è prevista una giornata davvero ricca:\r\nAlle 9:00 aprirà i lavori l\'assessore all\'innovazione e sviluppo del comune di Cesena Tommaso Dionigi\r\nAlle 9:15 cominciano gli interventi dei nostri relatori a partire da Sergio Gridelli con "La libertà non ha prezzo"\r\nAlle 10:15 troviamo Sonia Montegiove con il suo talk dal titolo "CommUNITY: fare rete per crescere insieme"\r\nAlle 11:15 la presentazione del progetto "Trashware" a cura di Alessandro Tappi\r\nDopo la pausa pranzo si ricomincia più carichi che mai con\r\nAlle 14:30 la parola passerà al prof. Alessandro Ricci che presenterà "Pensiero computazionale e coding"\r\nA seguire alle 15:30 Daniele Bellavista terrà il suo talk dal titolo "Bring your own Kali"\r\n\r\nLa partecipazione al Linux Day è ovviamente COMPLETAMENTE GRATUITA.\r\nPer poterci meglio organizzare vi chiediamo di registrarvi all\'indirizzo: https://www.eventbrite.com/e/biglietti-linuxday-cesena-28618733402', NULL, 1),
(8, 4, '2016-10-15 00:00:00', 'ViaggioSprite 2016 - Roma, Maker Faire', NULL, '-> Iscrizioni in sede S.P.R.I.Te. (via Sacchi 3) <-\r\nAndata e ritorno in autobus e l\'ingresso alla Maker Faire di Roma con soli 10 euro!\r\n\r\nInoltre alla Fiera di Roma sono disponibili mezzi per spostarsi autonomamente in centro (consultare su internet costi e orari).\r\n\r\nPartenza alle 5.00 dal Piazzale Karl Marx (piazzale autobus - stazione) e si riparte da Roma alle 20.00', NULL, 1),
(9, 4, '2016-06-01 00:00:00', 'GAME - design & development', NULL, 'Mercoledì 1 giugno (ore 14, aula B), Marco Agricola e Michele Postpischi terranno un seminario sul design ed implementazioni di giochi.\r\n\r\nIn particolare, racconteranno le loro esperienze che hanno riguardato l\'implementazione software (spesso come unici programmatori) e la modellazione digitale del suono di diversi giochi e audiogame, sia per pc con unity e C# che per mobile.\r\n\r\nLa loro esperienza riguarda quindi non solo programmazione ma anche storyboard, stesura dialoghi, direzione grafica, musiche e doppiaggi)\r\n\r\nRiassumendo con loro parole, si sono occupati di: "giochi per bambini, accessibilità nei giochi, avventure grafiche, giochi strani con tantissima gente che si picchia."\r\n\r\nEnfasi particolare sarà posta sul gioco che stanno sviluppando ora: RIOT, "sicuramente il gioco più appariscente della serie":\r\ne http://store.steampowered.com/app/342310\r\n\r\nIscrizione gratuita, segui il link\r\nhttp://doodle.com/poll/i84ycpm9q4xtpahh\r\n\r\nPer chi fosse ancora curioso, ecco altri esempi di giochi che hanno sviluppato:\r\n- una demo fatta in un paio di settimane che ha vinto una Jam di Indie Vault\r\nhttps://lochiamavanotriniteam.itch.io/schiaffifagioli\r\n- la serie My Little Cook con la casa editrice di Gradozero\r\nhttp://www.mamamo.it/app/my-little-cook-hd\r\nhttps://www.youtube.com/watch?v=jc_tSaXdKSA\r\n- due app con Clementoni, Fantafattoria e Fantasea \r\nhttps://www.youtube.com/watch?v=lt1wqm8vcI4\r\n- due capitoli di un\'avventura grafica tratta dalla saga di Nicolas Eymerich di Valerio Evangelisti\r\nhttps://www.youtube.com/watch?v=to3IphSaaE4&list=PLUVhVmFrDvfgy08b6rC0miYIYc0jqMr7p\r\n- Black Viper, un\'avventura/hidden object pubblicata con Microids, in cui ho fatto praticamente tutto (programmazione, storyboard, stesura dialoghi, direzione grafica, musiche e doppiaggi)\r\nhttps://www.youtube.com/watch?v=-n7eSCvRJxg\r\n- diversi audiogame, tra cui un bell\'esperimento, She Noire, la trasposizione di Black Viper giocabile solo attraverso l\'audio.\r\nhttps://www.youtube.com/watch?v=6jeD9dyk0_Q', NULL, 1);

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
(123456, '1486306649'),
(234567, '1482359198');

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

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `nazioni`
--
ALTER TABLE `nazioni`
  ADD PRIMARY KEY (`IdNazione`);

--
-- Indici per le tabelle `notizie`
--
ALTER TABLE `notizie`
  ADD PRIMARY KEY (`IdNotizia`),
  ADD KEY `Tipo` (`Tipo`);

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
-- Indici per le tabelle `tipi_notizie`
--
ALTER TABLE `tipi_notizie`
  ADD PRIMARY KEY (`IdTipo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `nazioni`
--
ALTER TABLE `nazioni`
  MODIFY `IdNazione` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `notizie`
--
ALTER TABLE `notizie`
  MODIFY `IdNotizia` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `tipi_notizie`
--
ALTER TABLE `tipi_notizie`
  MODIFY `IdTipo` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Limiti per le tabelle scaricate
--

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
  ADD CONSTRAINT `studenti_ibfk_3` FOREIGN KEY (`NazioneNascita`) REFERENCES `nazioni` (`IdNazione`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
