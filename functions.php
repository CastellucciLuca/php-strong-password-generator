<?php
$passwordCharacters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz\!£$%&/()=?^*+-=';
$length = $_GET['passwordLenght'];

if (isset($length)) {
    function generatedPassword($length, $passwordCharacters)
    {
        $passwordString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumber = rand(1, strlen($passwordCharacters));
            $passwordString .= $passwordCharacters[$randomNumber];
        }
        return $passwordString;
    }
}