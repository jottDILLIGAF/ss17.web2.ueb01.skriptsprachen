<?php
/**
 * Created by PhpStorm.
 * User: jottd
 * Date: 16.05.2017
 * Time: 20:20
 */

require('aufgabe3_RatingsJSON.php');

$url = 'musik-kneipe-eltmann.de';                               // Entity Variables
$rating = rand(1,10);
$ratings = new Ratings('localhost', 'ratings', 'root', '');

// add a Rating
$ratings->addRating($url, $rating, json_encode("super awesome comment. damn girl, make a decision!"));

// get AvgRating
print_r($ratings->getAvgRating($url));

// get Rating
json_encode($ratings->getRating($url));