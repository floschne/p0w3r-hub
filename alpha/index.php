<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'functions.php';
include_once 'variables.php';

$ret = 1; // speichert den rückgabewert von include, standardwert 1
// Laden der Include-Datei
/*
 * Die Include-Datei muss eine return Anweisung enthalten mit folgenden
 * Werten:
 * - Bei normaler Ausführung
 *   Array('filename' => string, -- Dateiname vom Template
 *         'data' => Array())    -- Array mit Daten für das Template
 * - Bei einem Fehler
 *   string  -- Die Fehlermeldung die angezeigt werden soll.
 */
if (isset($_GET['section'], $includeFiles[$_GET['section']])) {
    if (file_exists('includes/'.$includeFiles[$_GET['section']])) {
        $ret = include 'includes/'.$includeFiles[$_GET['section']]; 
    } else {
        $ret = "Include-Datei konnte nicht geladen werden: 'includes/".$includeFiles[$_GET['section']]."'";
    }
} else if(isset($_GET['section']) and !isset($includeFiles[$_GET['section']])) {
    $ret = '404';
} else {
    // load default page
    $ret = include 'includes/'.$includeFiles['start'];
}

// load html header
// Doctype, <html>, <head>, <meta>, <body> -> NO </html> or </body>
include 'templates/header.tpl';

// Load Menu
include 'templates/menu.tpl'; 

// Load the requested template file
if (is_array($ret) and isset($ret['filename'], $ret['data']) and is_string($ret['filename']) and is_array($ret['data'])) {
    // Valid include file
    if (file_exists($file = 'templates/'.$ret['filename'])) {
        $data = $ret['data']; //save returned data in $data variable that's accessible in the template files
        include $file;
    } else {
        $data['msg'] = 'template file "'.$file.'" could not me loaded';
        include 'templates/error.tpl';
    }
} else if (is_string($ret)) {
    if($ret == '404') {
        include 'templates/404.tpl';
    } else {
        // Error message from include file
        $data['msg'] = $ret;
        include 'templates/error.tpl';
    }
} else if ($ret === 1) {
    // no return in include file
    $data['msg'] = 'missing return statement in '.$file;
    include 'templates/error.tpl';
} else {
    // return value is not valid
    $data['msg'] = 'unvalid return value in '.$file.': '.$ret;
    include 'templates/error.tpl';
}

// loading footer
// </body> and </html> from header.tpl
include 'templates/footer.tpl'; 
?>