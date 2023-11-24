<?php

$datoteka = fopen('tekst.txt', 'r+');

if ($datoteka) {
    $str_tekst = fread($datoteka, filesize('tekst.txt'));
}

fclose($datoteka);
    echo "<h1>$str_tekst</h1>";

$izrezani_tekst = explode(' ', $str_tekst);

$datoteka = fopen('tekst.txt', 'a');
    foreach ($izrezani_tekst as $rijec) {
        fwrite($datoteka, $rijec . "\n");
    }
    fclose($datoteka);

$prvoPojavljivanje = strpos($str_tekst, 'k');
$ukupnoPojavljivanja = substr_count($str_tekst, 'k');

    echo "<p>Prvi put se slovo k pojavljuje na $prvoPojavljivanje mjestu i ukupno se pojavljuje $ukupnoPojavljivanja puta.</p>";



?>