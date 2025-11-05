<?php

//Eingabe
$password = readline("Bitte gebe dein Passwort ein: ");

//Passwort Vorgaben
    $minLengthStrong = strlen($password) >= 16;
    $capitalLetter = preg_match("/[A-Z]/", $password) === 1;
    $specialchar = preg_match("/[!\?\-\_\*\+\&\^\%]/", $password) === 1;
    $noWhitespace = preg_match("/\s/", $password) === 0;

//Random Passwort Vorgaben
function randomPassword(int $length = 16): string {
if ($length < 1) {
$length = 16;
}
$alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?-_*+&^#";
$alphabetLen = strlen($alphabet);
$password = '';
for ($i = 0; $i < $length; $i++) {

$n = rand(0, $alphabetLen - 1);
$password .= $alphabet[$n];
}
return $password;
}

if ($minLengthStrong && $capitalLetter && $specialchar && $noWhitespace) {
echo "Du hast bereits ein gutes Passwort. Glückwunsch!!!\n";
} else {
echo "Du hast ein eher schwaches Passwort - hier ist mein Vorschlag!\n";
$suggestion = randomPassword (16);
echo $suggestion . "\n" ;
}

//Eintrag speichern in .txt File
$hash = password_hash($password, PASSWORD_DEFAULT);
$filename = 'passwort_log.txt';
$logEntry = date('Y-m-d H:i:s') . " - Passwort: " . $hash . "\n";
file_put_contents($filename, $logEntry, FILE_APPEND);


//Quelle von W3Schools, Stackoverflow (nicht alles)
