<?php
include_once __DIR__ . '/index.php';
function generatedPassword($length, $passwordCharacters, $repeatCharacters)
{
    $numberList = [];


    if (isset($length)) {

        $passwordString = '';
        for ($i = 0; $i < $length; $i++) {

            do {
                $randomNumber = rand(1, strlen($passwordCharacters));
            } while ((in_array($randomNumber, $numberList)) && ($repeatCharacters == 'false'));

            $numberList[] = $randomNumber;

            $passwordString .= $passwordCharacters[$randomNumber];
        }
        return $passwordString;
    }
}