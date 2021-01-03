<?php
require_once dirname(__FILE__) . '/../config.php';

$kwota = $_REQUEST ['kwota'];
$lata = $_REQUEST ['lata'];
$procent = $_REQUEST ['procent'];

if (!(isset($kwota) && isset($lata) && isset($procent))) {
    $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($kwota == "") {
    $messages [] = 'Nie podano kwoty pożyczki';
}
if ($lata == "") {
    $messages [] = 'Nie podano lat spłacania pożyczki';
}
if ($procent == "") {
    $messages [] = 'Nie podano procentu kredytu';
}

if (empty($messages)) {

    if (!is_numeric($kwota)) {
        $messages [] = 'Kwota nie jest liczbą całkowitą';
    }

    if (!is_numeric($lata)) {
        $messages [] = 'Podany okres czasu nie jest liczbą całkowitą';
    }
    if (!is_numeric($procent)) {
        $messages [] = 'Podane oprocentowanie nie jest liczbą całkowitą';
    }

}


if (empty ($messages)) {

    $kwota = floatval($kwota);
    $lata = floatval($lata);
    $procent = floatval($procent);

    $rata = $kwota / ($lata * 12);
    $rata_z_procentem = $rata + ($rata * ($procent / 100));
}

include 'credit_calc_view.php';