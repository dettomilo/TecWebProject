<?php
/*
* Questa funzione formatta l'URL specificato come parametro in maniera tale da rimuovere
* "http://", "www" e "/". Esempi:
* 1) http://google.com/  --> google.com
* 2) www.google.com      --> google.com
* 3) google.com/         --> google.com
*/
function formatURL($url) {
  $url = trim($url, '/');
  if (!preg_match('#^http(s)?://#', $url)) {
    $url = 'http://' . $url;
  }
  $urlParts = parse_url($url);
  $domain = preg_replace('/^www\./', '', $urlParts['host']);
  return $domain;
}
?>
