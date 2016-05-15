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

$news = array();

// Array mit Newsbeiträgen füllen (normalerweise aus der Datenbank)
$newsbeitrag = array();
$newsbeitrag['Titel'] = 'Neue Homepaaaaage';
$newsbeitrag['Datum'] = '2008-01-01 00:00:00';
$newsbeitrag['Inhalt'] = 'Pünktlich zum asdasd Neujahr starten wir mit einer neuen Homepage.';
$news[] = $newsbeitrag;

$a['data']['news'] = $news;

return $a; // nicht Vergessen, sonst enthält $ret nur den Wert int(1)
?>