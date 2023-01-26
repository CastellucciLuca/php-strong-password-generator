<?php
session_start();
include_once __DIR__ . '/functions.php';

$passwordCharacters = '';
$length = $_GET['passwordLenght'];

$Onlyletters = $_GET['letters'];
$Onlynumbers = $_GET['numbers'];
$Onlyspecials = $_GET['specials'];

//USER SELECTION
if ($Onlyletters == 'true') {
    $passwordCharacters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
}

if ($Onlynumbers == 'true') {
    $passwordCharacters .= '0123456789';
}

if ($Onlyspecials == 'true') {
    $passwordCharacters .= '|\!$%&/()=?^*+-=';
}
$repeatCharacters = $_GET['repeatingCharacters']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
</head>
<body>
    <header>
    <form action="./index.php" method="GET">
            <div class="characterLength">
                <label for="password-lenght">Insert password lenght</label>
                <input type="number" name="passwordLenght" id="password-lenght">
            </div>
            <div class="repeating-characters">
                <span>Doubles on letters?</span>
                <br>
                <input type="radio" id="yes-repeating-characters" name="repeatingCharacters" value="true">
                <label for="yes-repeating-characters">Yes</label>
                <br>
                <input type="radio" id="no-repeating-characters" name="repeatingCharacters" value="false">
                <label for="no-repeating-characters">No</label>
                <br>
            </div>
            <div class="choose-characters-type">
                <input type="checkbox" id="letters" name="letters" value="true">
                <label for="letters">Letters</label>
                <br>
                <input type="checkbox" id="numbers" name="numbers" value="true">
                <label for="numbers">Numbers</label>
                <br>
                <input type="checkbox" id="specials" name="specials" value="true">
                <label for="specials">Specials characters</label>
            </div>
            <button type="submit">Invia</button>
        </form>
    </header>
    <main>
        <?php
        $_SESSION['finalPassword'] = generatedPassword($length,$passwordCharacters,$repeatCharacters);
        //Redirect
        if (isset($length)) {
            header('Location: ./result.php');
        }
        ?> 
    </main>
</body>
</html>