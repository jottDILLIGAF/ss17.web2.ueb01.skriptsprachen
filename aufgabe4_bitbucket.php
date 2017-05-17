<?php
/**
 * Created by PhpStorm.
 * User: Dan Haeberlein
 * Date: 16.05.2017
 * Time: 21:38
 */


header('Access-Control-Allow-Origin: *');	            # erlaubt Fremden Seiten den Zugriff auf dieses Skript
?>

<h4>Bewerte diese Seite!</h4>

<link rel="stylesheet" type="text/css" href="http://localhost/phpstorm/ueb01/css/rating.css">

<!-- Der Nachfolgende Block soll nur angezeigt werden, wenn der Parameter "rating" nicht gesetzt ist: -->
<div  id="rate">
    URL der Seite:
    <?php echo $_SERVER['HTTP_REFERER']?><br>
    <!-- Fügen Sie an dieser Stelle Ihr Formular ein! -->



</div>