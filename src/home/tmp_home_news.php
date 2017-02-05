<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title>Smart Unibo - Home</title>
  </head>
  <body>
    <main>
      <?php
        //Includo il file esterno relativo la connessione al database.
        require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");

        //Includo il file esterno relativo le funzioni per l'ottenimento delle notizie.
        require("news/news_functions.php");

        //Stampo le 5 notizie di Ateneo più recenti.
        echo "<b>NOTIZIE ATENEO:</b><br>";
        $ateneoNews = getNews(0, 5, $mysqli);
        foreach ($ateneoNews as $n) {
          echo "Tipo = " .$n["Tipo"] ."<br>";
          echo "Data = " .$n["Data"] ."<br>";
          echo "Titolo = " .$n["Titolo"] ."<br>";
          if (!is_null($n["Sommario"])) {
            echo "Sommario = " .$n["Sommario"] ."<br>";
          }
          echo "Testo = " .$n["Testo"] ."<br>";
          if (!is_null($n["Immagine"])) {
            echo "<img src=" .$n["Immagine"] ." height=\"150\" width=\"200\"><br>";
          }
        }
        echo "<br>";

        //Stampo le 10 notizie legate al Corso più recenti.
        echo "<b>NOTIZIE CORSO:</b><br>";
        $corsoNews = getNews(1, 10, $mysqli);
        foreach ($corsoNews as $n) {
          echo "Tipo = " .$n["Tipo"] ."<br>";
          echo "Data = " .$n["Data"] ."<br>";
          echo "Titolo = " .$n["Titolo"] ."<br>";
          if (!is_null($n["Sommario"])) {
            echo "Sommario = " .$n["Sommario"] ."<br>";
          }
          echo "Testo = " .$n["Testo"] ."<br>";
          if (!is_null($n["Immagine"])) {
            echo "<img src=" .$n["Immagine"] ." height=\"150\" width=\"200\"><br>";
          }
        }
      ?>
    </main>
  </body>
</html>
