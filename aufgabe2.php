<?php
/**
 * Created by PhpStorm.
 * User: jottd
 * Date: 13.05.2017
 * Time: 16:50
 */

require('aufgabe2_Ratings.php');

$url = 'musik-kneipe-eltmann.de';                               // Entity Variables
$rating = rand(1,10);
$ratings = new Ratings('localhost', 'ratings', 'root', '');

// add a Rating
$ratings->addRating($url, $rating, "super awesome comment. damn girl, make a decision!");

// get AvgRating
print_r($ratings->getAvgRating($url));

// get Rating
$ratings->getRating($url);




