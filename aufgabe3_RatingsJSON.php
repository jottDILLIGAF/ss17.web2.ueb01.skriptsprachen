<?php

/**
 * Created by PhpStorm.
 * User: jottd
 * Date: 16.05.2017
 * Time: 20:16
 */

require('aufgabe2_Ratings.php');            // benötigt - fatal error!
//include('aufgabe2_Ratings');              // optional - kein fatal error!


class RatingsJSON extends Ratings
{
    public function __construct($dbhost, $dbname, $dbuser, $dbpass)
    {
        parent::__construct($dbhost, $dbname, $dbuser, $dbpass);
    }

    public function addRating($url, $rating, $comment) {

        $comment = json_decode($comment);
        $insertStatement = $this->pdo->prepare("INSERT INTO ratings (url, rating, comment) VALUES (:url, :rating, :comment)");
        $insertStatement->bindParam(':url', $url);
        $insertStatement->bindParam(':rating', $rating);
        $insertStatement->bindParam(':comment', $comment);
        $insertStatement->execute();
        echo "<b>addRating:</b><br>$url added! check.<br><br>";
    }

    public function getRating($url) {

        $selectStatement = $this->pdo->prepare('SELECT * FROM ratings WHERE url = :url');
        $selectStatement->execute(['url' => $url]);
        $result = $selectStatement->fetch(PDO::FETCH_ASSOC);              // PDO::FETCH_ASSOC -- sonst wird alles doppelt übertragen!
        echo "<br><br><b>getRating: </b><br>";
        foreach($result as $entry) {
            echo "ID: ".$entry['ID'];
            echo " | url: ".$entry['url'];
            echo " | Rating: ".$entry['rating'];
            echo " | Comment: ".$entry['comment']."<br>";
        }
    }

    public function getAvgRating($url) {

        $selectStatement = $this->pdo->prepare('SELECT Avg(rating) FROM ratings WHERE url = :url');
        $selectStatement->execute(['url' => $url]);
        $result = $selectStatement->fetch(PDO::FETCH_ASSOC);              // PDO::FETCH_ASSOC -- sonst wird alles doppelt übertragen!
        echo "<b>getAvgRating for $url:</b><br>";
        return json_encode($result);
    }

}