<?php
/**
 * Created by PhpStorm.
 * User: jott
 * Date: 13.05.2017
 * Time: 16:50
 * Hier ist eine neue Zeile
 */

if( !isset($_GET['name']) )                 // Wenn name = null dann schreibe keinen Namen, unterdrückt Notiz
    echo "<h1>Hello Anonymous!</h1>";
else {
    $name = htmlspecialchars($_GET['name']);            // Konvertierung eines String zur Ausgabe (Schutz vor Schadcode)
    echo "<h1>Hello $name!</h1>"; }

echo "<hr>";

?>




<form action="aufgabe1.php" method="get">               // Simples Formular das sich selbst erneut aufruft
        <p>Please enter your Name: <input type="text" name="name" /> </p>
        <input type="submit" value"send!" />
</form>