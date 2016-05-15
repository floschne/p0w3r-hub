<?php
/*
 * Die Include-Datei muss eine return Anweisung enthalten mit folgenden
 * Werten:
 * - Bei normaler Ausführung
 *   Array('filename' => string, -- Dateiname vom Template
 *         'data' => Array())    -- Array mit Daten für das Template
 * - Bei einem Fehler
 *   string  -- Die Fehlermeldung die angezeigt werden soll.
 */	
$a = array();
$a['filename'] = 'start.tpl';
$a['data'] = array();

// Newsdaten irgendwie aus einer Datenbank holen
if (false) {
    // Falls ein Datenbankfehler auftrat, kann hier nur simuliert werden, deswegen if (false)
    return "Es trat ein Fehler in der Datenbank auf: ...";
}

$text = array();

// Array mit Newsbeiträgen füllen (normalerweise aus der Datenbank)
$text = array();
$text['title'] = 'Welcome to p0w3r-hub.de';
$text['date'] = '2016-04-26 00:00:00';
$text['content'] = 'This site will provide you a nice and modern Magic The Gathering­ Tool with multiple functions.';

$a['data']['text'] = $text;

return $a; // nicht Vergessen, sonst enthält $ret nur den Wert int(1)
?>